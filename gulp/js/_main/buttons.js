//
// $(".btn:not(.menu-icon)").each(function (index, el) {
//   // ? Glitch animation (require SVG, in footer #filter-glitch-fot-btns)
//   // var bt = document.querySelectorAll(".btn")[0];
//   var bt = el;
//   var turbVal = { val: 0.000001 };
//   var turb = $("#filter-glitch-fot-btns feTurbulence")[0];
//   var btTl = gsap.timeline({
//     paused: true,
//     onUpdate: function () {
//       turb.setAttribute("baseFrequency", "0.00001 " + turbVal.val); // Firefox bug is value is 0
//     },
//     onStart: function () {
//       bt.style.filter = "url(#filter-glitch-fot-btns)";
//     },
//     onComplete: function () {
//       bt.style.filter = "none";
//     }
//   });
//   btTl.to(turbVal, 0.2, { val: 0.06 });
//   btTl.to(turbVal, 0.2, { val: 0.000001 });
//   $(bt).on("click", function () {
//     btTl.restart();
//   });
// });

// $(".btn.style-1,.btn.style-2,.btn.style-3,.btn.style-4").each(function (index, el) {
//   $(el).append('<svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M34.235 26.824a.5.5 0 000-.707l-3.182-3.182a.5.5 0 10-.707.707l2.828 2.829-2.828 2.828a.5.5 0 10.707.707l3.182-3.182zm-9.883.147h9.53v-1h-9.53v1z" fill="currentColor"/><circle cx="21.175" cy="26.47" r="1.059" fill="currentColor"/><circle cx="27" cy="27" r="26.5" stroke="currentColor"/></svg>');
// });
