$.fn.extend({
  followCursor: function (options) {
    var defaults = {
      className: "cursor",
      scaleOnHover: 3,
      chColor: "#fff",
      defColor: "#000"
    };
    var options = $.extend(defaults, options);
    return this.each(function () {
      var o = options,
        flw = false,
        t = $(this);
      var c = $('<div class="' + o.className + '"></div>');
      t.append(c);
      $(window).on("mousemove", function (e) {
        const x = e.clientX;
        const y = e.clientY;
        if (!flw) {
          gsap.set(c, { x, y });
          gsap.to(c, { opacity: 1, duration: 0.45, ease: "Sine.easeOut" });
          flw = true;
        }
        gsap.to(c, { x, y, ease: "Sine.easeOut ", duration: 0.45 });
      });
      $(window).on("mouseout", function (e) {
        if (e.toElement === null) {
          gsap.to(c, { opacity: 0, duration: 0.45 });
          flw = false;
        }
      });
      if (o.hoverElems) {
        $.each(o.hoverElems, function () {
          $(String(this)).on("mouseenter mousemove", function () {
            gsap.to(c, { scale: o.scaleOnHover, duration: 0.45 });
          });
          $(String(this)).on("mouseleave", function () {
            gsap.to(c, { scale: 1, duration: 0.45 });
          });
        });
      }
      if (o.chColorOnHover) {
        $.each(o.chColorOnHover, function () {
          $(String(this)).on("mouseenter mousemove", function () {
            gsap.to(c, { backgroundColor: o.chColor, duration: 0.45 });
          });
          $(String(this)).on("mouseleave", function () {
            gsap.to(c, { backgroundColor: o.defColor, duration: 0.45 });
          });
        });
      }
    });
    // END followCursor
  }
});

// Init
$(".assets").followCursor({
  scaleOnHover: 1.68,
  // defColor: "#FEE900",
  // chColor: "#fff",
  // chColorOnHover: [".image", "img", ".archive-view .btn"],
  hoverElems: [".btn", "a", 'img']
});
