/* SAI Europe – Main JavaScript */
(function () {
  'use strict';

  // ── STICKY HEADER ──────────────────────────────────────────────────────────
  var header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 30) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }, { passive: true });
  }

  // ── MOBILE NAV TOGGLE ──────────────────────────────────────────────────────
  var toggle = document.getElementById('nav-toggle');
  var menuWrap = document.getElementById('primary-menu-wrap');

  if (toggle && menuWrap) {
    toggle.addEventListener('click', function () {
      var isOpen = menuWrap.classList.toggle('open');
      toggle.classList.toggle('active', isOpen);
      toggle.setAttribute('aria-expanded', String(isOpen));
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close menu when a link is clicked
    menuWrap.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        menuWrap.classList.remove('open');
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    // Close on outside click
    document.addEventListener('click', function (e) {
      if (!header.contains(e.target) && menuWrap.classList.contains('open')) {
        menuWrap.classList.remove('open');
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // ── SMOOTH SCROLL ──────────────────────────────────────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var targetId = this.getAttribute('href').slice(1);
      if (!targetId) return;
      var target = document.getElementById(targetId);
      if (!target) return;
      e.preventDefault();
      var navH = header ? header.offsetHeight : 80;
      var top = target.getBoundingClientRect().top + window.pageYOffset - navH - 20;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  });

  // Handle hash on page load
  if (window.location.hash) {
    var hashTarget = document.getElementById(window.location.hash.slice(1));
    if (hashTarget) {
      setTimeout(function () {
        var navH = header ? header.offsetHeight : 80;
        var top = hashTarget.getBoundingClientRect().top + window.pageYOffset - navH - 20;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }, 200);
    }
  }

  // ── SCROLL REVEAL ──────────────────────────────────────────────────────────
  function initReveal() {
    var elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

      elements.forEach(function (el) {
        observer.observe(el);
      });
    } else {
      // Fallback: show all
      elements.forEach(function (el) { el.classList.add('visible'); });
    }
  }

  initReveal();

  // ── CONTACT FORM ───────────────────────────────────────────────────────────
  var form = document.getElementById('sai-contact-form');
  var submitBtn = document.getElementById('form-submit');
  var formMessage = document.getElementById('form-message');

  if (form && typeof saiAjax !== 'undefined') {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // Basic validation
      var name    = form.querySelector('[name="name"]');
      var email   = form.querySelector('[name="email"]');
      var message = form.querySelector('[name="nachricht"]');

      if (!name.value.trim() || !email.value.trim() || !message.value.trim()) {
        showMessage('Bitte füllen Sie alle Pflichtfelder aus.', 'error');
        return;
      }

      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showMessage('Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'error');
        return;
      }

      submitBtn.disabled = true;
      submitBtn.textContent = 'Wird gesendet…';

      var data = new FormData(form);
      data.append('action', 'sai_contact');
      data.append('nonce', saiAjax.nonce);

      fetch(saiAjax.ajaxUrl, {
        method: 'POST',
        body: data,
        credentials: 'same-origin',
      })
        .then(function (res) { return res.json(); })
        .then(function (res) {
          if (res.success) {
            showMessage(res.data.message, 'success');
            form.reset();
          } else {
            showMessage(res.data.message || 'Ein Fehler ist aufgetreten.', 'error');
          }
        })
        .catch(function () {
          showMessage('Verbindungsfehler. Bitte versuchen Sie es erneut.', 'error');
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Nachricht senden';
        });
    });

    function showMessage(text, type) {
      if (!formMessage) return;
      formMessage.textContent = text;
      formMessage.style.display = 'block';
      formMessage.style.background = type === 'success'
        ? 'rgba(50,200,100,0.15)' : 'rgba(220,50,50,0.15)';
      formMessage.style.color = type === 'success' ? '#2db86a' : '#e05050';
      formMessage.style.border = '1px solid ' + (type === 'success' ? 'rgba(50,200,100,0.3)' : 'rgba(220,50,50,0.3)');
    }
  }

})();
