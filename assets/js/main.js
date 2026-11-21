/* BotNira — small progressive enhancements. The site works without JS. */
(function () {
  "use strict";

  // ---- Mobile menu --------------------------------------------------------
  var toggle = document.querySelector(".nav-toggle");
  var menu = document.getElementById("mobile-menu");
  if (toggle && menu) {
    var setOpen = function (open) {
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
      menu.hidden = !open;
      document.body.classList.toggle("menu-open", open);
    };
    toggle.addEventListener("click", function () {
      setOpen(toggle.getAttribute("aria-expanded") !== "true");
    });
    menu.addEventListener("click", function (e) {
      if (e.target.closest("a")) setOpen(false);
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") setOpen(false);
    });
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 1280) setOpen(false);
    });
  }

  // ---- AJAX forms (contact) — falls back to a normal POST without JS -------
  document.querySelectorAll("form[data-ajax-form]").forEach(function (form) {
    var ok = form.querySelector(".form-ok");
    var err = form.querySelector(".form-err");
    var btn = form.querySelector('button[type="submit"]');
    form.addEventListener("submit", function (e) {
      if (!window.fetch || !window.FormData) return;
      e.preventDefault();
      if (ok) ok.hidden = true;
      if (err) err.hidden = true;
      var label = btn ? btn.textContent : "";
      if (btn) { btn.disabled = true; btn.textContent = "Sending…"; }
      fetch(form.action, {
        method: "POST",
        body: new FormData(form),
        headers: { Accept: "application/json" }
      })
        .then(function (r) { return r.json().catch(function () { return { ok: false }; }); })
        .then(function (data) {
          if (data && data.ok) {
            form.reset();
            if (ok) { ok.hidden = false; ok.scrollIntoView({ block: "nearest", behavior: "smooth" }); }
            if (window.fbq) window.fbq("track", "Lead");
            if (window.gtag) window.gtag("event", "generate_lead");
          } else if (err) {
            err.textContent = (data && data.error) || "Could not send your message — please email us instead.";
            err.hidden = false;
          }
        })
        .catch(function () {
          if (err) { err.textContent = "Network error — please try again or email us."; err.hidden = false; }
        })
        .finally(function () {
          if (btn) { btn.disabled = false; btn.textContent = label; }
        });
    });
  });

  // ---- Referral earnings calculator --------------------------------------
  var calc = document.querySelector("[data-calc]");
  if (calc) {
    var fmt = function (n) {
      try {
        return new Intl.NumberFormat("en-US", { style: "currency", currency: "USD", maximumFractionDigits: 0 }).format(n);
      } catch (_) { return "$" + Math.round(n); }
    };
    var rate = parseFloat(calc.getAttribute("data-rate")) || 0.15;
    var signups = calc.querySelector('[name="signups"]');
    var plan = calc.querySelector('[name="plan"]');
    var out = function (key, val) {
      calc.querySelectorAll('[data-out="' + key + '"]').forEach(function (el) { el.textContent = val; });
    };
    var update = function () {
      var s = Number(signups.value), p = Number(plan.value);
      var monthly = s * p * rate;
      out("signups", s);
      out("plan", "$" + p + "/mo");
      out("monthly", fmt(monthly));
      out("yearly", fmt(monthly * 12));
      out("per-mo", fmt(p * rate));
      out("per-yr", fmt(p * rate * 12));
      out("two-yr", fmt(monthly * 24));
    };
    signups.addEventListener("input", update);
    plan.addEventListener("input", update);
    update();
  }

  // ---- Copy buttons -------------------------------------------------------
  document.querySelectorAll("[data-copy]").forEach(function (b) {
    b.addEventListener("click", function () {
      var text = b.getAttribute("data-copy");
      if (navigator.clipboard) navigator.clipboard.writeText(text);
      var old = b.innerHTML;
      b.textContent = "Copied";
      setTimeout(function () { b.innerHTML = old; }, 1400);
    });
  });
})();
