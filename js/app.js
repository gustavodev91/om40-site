

var _containerMenu = $('[data-container="menu"]');

var _divSuporte = $('[data-container="div-suporte"]');

_divSuporte.css("height",_containerMenu.height());


$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    fileName = fileName.length > 20 ? fileName.substr(0,20)+'...' : fileName;
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });