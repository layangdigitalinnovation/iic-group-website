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
})();
