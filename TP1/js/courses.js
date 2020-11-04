
/* MODAL DOS CURSOS */
$(document).ready(function () {
    $("select").change(function () {
      $("select option:selected").each(function () {
        if ($(this).attr("value") == "soft") {
          $(".box").hide();
          $(".soft").show();
        }
        if ($(this).attr("value") == "web") {
          $(".box").hide();
          $(".web").show();
        }
        if ($(this).attr("value") == "ml") {
          $(".box").hide();
          $(".ml").show();
        }
        if ($(this).attr("value") == "all") {
          $(".box").hide();
          $(".all").show();
          AOS.init();
        }
      });
    }).change();
  });