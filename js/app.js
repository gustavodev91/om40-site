
var _containerMenu = $('[data-container="menu"]');

console.log(_containerMenu);

$(window).scroll(function(){
  //if( $(this).scrollTop() > 73 ){
    _containerMenu.addClass('menu-fixo');
  //}else{
    //_containerMenu.removeClass('menu-fixo');
  //}
})

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    fileName = fileName.length > 20 ? fileName.substr(0,20)+'...' : fileName;
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });


