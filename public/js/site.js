(function () {
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

    // Fade-in on scroll
    var targets = document.querySelectorAll('.card, .steps li, .chain li, .unit-grid, .section-head');
    if (!('IntersectionObserver' in window)) { return; }
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: 0.12 });
    targets.forEach(function (el) { el.classList.add('reveal'); io.observe(el); });

    // Copy URL handler for QR / Barcode cards
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

    // ===== Corporate Video Profile Player =====
    var video = document.getElementById('main-profile-video');
    var overlay = document.getElementById('video-poster-overlay');
    var theater = document.getElementById('video-theater');
    var bigPlayBtn = document.getElementById('video-big-play-btn');
    var heroWatchBtn = document.getElementById('btn-hero-watch');
    var theaterBtn = document.getElementById('btn-theater-mode');
    var pipBtn = document.getElementById('btn-pip-mode');
    var chapterChips = document.querySelectorAll('.chapter-chip');

    function playProfileVideo() {
        if (!video) return;
        if (overlay) overlay.classList.add('is-hidden');
        if (theater) theater.classList.add('is-playing');
        video.play().catch(function () {});
    }

    if (overlay) {
        overlay.addEventListener('click', function () {
            playProfileVideo();
        });
    }
    if (bigPlayBtn) {
        bigPlayBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            playProfileVideo();
        });
    }
    if (heroWatchBtn) {
        heroWatchBtn.addEventListener('click', function () {
            setTimeout(function () {
                playProfileVideo();
            }, 350);
        });
    }

    if (video) {
        video.addEventListener('play', function () {
            if (overlay) overlay.classList.add('is-hidden');
            if (theater) theater.classList.add('is-playing');
        });
        video.addEventListener('ended', function () {
            if (overlay) overlay.classList.remove('is-hidden');
            if (theater) theater.classList.remove('is-playing');
        });

        function updateActiveChapter(currentTime) {
            var chips = Array.prototype.slice.call(chapterChips);
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
    }

    if (chapterChips.length && video) {
        chapterChips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                var sec = parseFloat(chip.getAttribute('data-time'));
                if (isNaN(sec)) return;
                video.currentTime = sec;
                playProfileVideo();
            });
        });
    }

    if (theaterBtn && theater) {
        theaterBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var isTheater = theater.classList.toggle('is-theater');
            var label = theaterBtn.querySelector('.tool-label');
            if (label) label.textContent = isTheater ? 'Standard' : 'Theater';
        });
    }

    if (pipBtn && video) {
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
})();
