(function () {
    'use strict';

    // ===== Navigation Toggle =====
    var toggle = document.querySelector('[data-nav-toggle]');
    var nav = document.querySelector('[data-nav]');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var open = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        nav.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                nav.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // ===== Fade-in on Scroll =====
    var targets = document.querySelectorAll('.card, .steps li, .chain li, .unit-grid, .section-head');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('in');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        targets.forEach(function (el) {
            el.classList.add('reveal');
            io.observe(el);
        });
    }

    // ===== Copy URL Handler (QR / Share Buttons) =====
    document.querySelectorAll('.btn-copy-link').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var url = btn.getAttribute('data-url');
            if (!url) return;

            function showCopied() {
                var oldText = btn.textContent;
                btn.textContent = 'Link Copied ✓';
                btn.style.borderColor = 'var(--gold)';
                setTimeout(function () {
                    btn.textContent = oldText;
                    btn.style.borderColor = '';
                }, 2000);
            }

            function fallbackCopy() {
                var input = document.createElement('input');
                input.value = url;
                document.body.appendChild(input);
                input.select();
                try {
                    document.execCommand('copy');
                    showCopied();
                } catch (e) {}
                document.body.removeChild(input);
            }

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(showCopied, fallbackCopy);
            } else {
                fallbackCopy();
            }
        });
    });

    // ===== Video Edition Switcher Pills =====
    var switchPillCorporate = document.getElementById('pill-switch-corporate');
    var switchPillIndonesia = document.getElementById('pill-switch-indonesia');

    function setActiveSwitchPill(target) {
        if (!switchPillCorporate || !switchPillIndonesia) return;
        if (target === 'indonesia') {
            switchPillCorporate.classList.remove('is-active');
            switchPillCorporate.setAttribute('aria-selected', 'false');
            switchPillIndonesia.classList.add('is-active');
            switchPillIndonesia.setAttribute('aria-selected', 'true');
        } else {
            switchPillCorporate.classList.add('is-active');
            switchPillCorporate.setAttribute('aria-selected', 'true');
            switchPillIndonesia.classList.remove('is-active');
            switchPillIndonesia.setAttribute('aria-selected', 'false');
        }
    }

    if (switchPillCorporate) {
        switchPillCorporate.addEventListener('click', function () {
            setActiveSwitchPill('corporate');
        });
    }
    if (switchPillIndonesia) {
        switchPillIndonesia.addEventListener('click', function () {
            setActiveSwitchPill('indonesia');
        });
    }

    // ===== Generic Video Player Initializer =====
    function initVideoPlayer(config) {
        var video = document.getElementById(config.videoId);
        if (!video) return null;

        var overlay = document.getElementById(config.overlayId);
        var theater = document.getElementById(config.theaterId);
        var bigPlayBtn = document.getElementById(config.bigPlayBtnId);
        var heroWatchBtn = document.getElementById(config.heroWatchBtnId);
        var theaterBtn = document.getElementById(config.theaterBtnId);
        var pipBtn = document.getElementById(config.pipBtnId);
        var chapterChips = document.querySelectorAll(config.chapterSelector);

        function play() {
            if (typeof config.onBeforePlay === 'function') {
                config.onBeforePlay();
            }
            if (overlay) overlay.classList.add('is-hidden');
            if (theater) theater.classList.add('is-playing');
            video.play().catch(function () {});
        }

        function pause() {
            video.pause();
        }

        if (overlay) {
            overlay.addEventListener('click', function () {
                play();
            });
        }

        if (bigPlayBtn) {
            bigPlayBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                play();
            });
        }

        if (heroWatchBtn) {
            heroWatchBtn.addEventListener('click', function () {
                setTimeout(function () {
                    play();
                }, 350);
            });
        }

        video.addEventListener('play', function () {
            if (typeof config.onBeforePlay === 'function') {
                config.onBeforePlay();
            }
            if (overlay) overlay.classList.add('is-hidden');
            if (theater) theater.classList.add('is-playing');
        });

        video.addEventListener('ended', function () {
            if (overlay) overlay.classList.remove('is-hidden');
            if (theater) theater.classList.remove('is-playing');
        });

        if (chapterChips.length > 0) {
            var chips = Array.prototype.slice.call(chapterChips);

            function updateActiveChapter(currentTime) {
                var activeIdx = -1;
                for (var i = 0; i < chips.length; i++) {
                    var t = parseFloat(chips[i].getAttribute('data-time'));
                    var nextT = (i < chips.length - 1) ? parseFloat(chips[i + 1].getAttribute('data-time')) : Infinity;
                    if (currentTime >= t && currentTime < nextT) {
                        activeIdx = i;
                        break;
                    }
                }
                chips.forEach(function (c, idx) {
                    if (idx === activeIdx) {
                        c.classList.add('is-active');
                    } else {
                        c.classList.remove('is-active');
                    }
                });
            }

            var throttleTimer = null;
            video.addEventListener('timeupdate', function () {
                if (throttleTimer) return;
                throttleTimer = setTimeout(function () {
                    throttleTimer = null;
                    updateActiveChapter(video.currentTime);
                }, 250);
            });

            chips.forEach(function (chip) {
                chip.addEventListener('click', function () {
                    var sec = parseFloat(chip.getAttribute('data-time'));
                    if (!isNaN(sec)) {
                        video.currentTime = sec;
                        play();
                    }
                });
            });
        }

        if (theaterBtn && theater) {
            theaterBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                var isTheater = theater.classList.toggle('is-theater');
                var label = theaterBtn.querySelector('.tool-label');
                if (label) {
                    label.textContent = isTheater ? 'Standard' : 'Theater';
                }
            });
        }

        if (pipBtn) {
            if (!document.pictureInPictureEnabled) {
                pipBtn.style.display = 'none';
            } else {
                pipBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (document.pictureInPictureElement) {
                        document.exitPictureInPicture().catch(function () {});
                    } else {
                        video.requestPictureInPicture().catch(function () {});
                    }
                });
            }
        }

        return {
            video: video,
            play: play,
            pause: pause
        };
    }

    // ===== Initialize Player 1 (Corporate Profile) & Player 2 (Indonesia 2026) =====
    var player1 = null;
    var player2 = null;

    player1 = initVideoPlayer({
        videoId: 'main-profile-video',
        overlayId: 'video-poster-overlay',
        theaterId: 'video-theater',
        bigPlayBtnId: 'video-big-play-btn',
        heroWatchBtnId: 'btn-hero-watch',
        theaterBtnId: 'btn-theater-mode',
        pipBtnId: 'btn-pip-mode',
        chapterSelector: '.chapter-chip:not(.chapter-chip-indonesia)',
        onBeforePlay: function () {
            if (player2 && player2.video && !player2.video.paused) {
                player2.pause();
            }
            setActiveSwitchPill('corporate');
        }
    });

    player2 = initVideoPlayer({
        videoId: 'indonesia-profile-video',
        overlayId: 'indonesia-poster-overlay',
        theaterId: 'video-theater-indonesia',
        bigPlayBtnId: 'indonesia-big-play-btn',
        heroWatchBtnId: null,
        theaterBtnId: 'btn-indonesia-theater-mode',
        pipBtnId: 'btn-indonesia-pip-mode',
        chapterSelector: '.chapter-chip-indonesia',
        onBeforePlay: function () {
            if (player1 && player1.video && !player1.video.paused) {
                player1.pause();
            }
            setActiveSwitchPill('indonesia');
        }
    });
})();
