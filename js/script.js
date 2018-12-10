$(".btn a").on("click", function() {

    var get_id = $(this).attr("data-item");
    var target = $("#"+get_id).offset().top;

    $("html, body").animate({scrollTop: target}, 9800);

});