jQuery(document).ready(function ($) {
  $(window).on("load", function () {
    $(".edit-post-layout__metaboxes .postbox-container .postbox").each(function () {
      if (!$(this).hasClass("closed")) $(this).addClass("closed");
      // $(this).removeClass("closed");
    });
  });
});
