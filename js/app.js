

var _containerMenu = $('[data-container="menu"]');
var _divSuporte = $('[data-container="div-suporte"]');
var _textoCompleto = $('[data-container="texto-completo"]');
var _iframeVideo = $('[data-container="iframe-video"]');

_divSuporte.css("height",_containerMenu.height());

_iframeVideo.css("margin-top",(_textoCompleto.height() - _iframeVideo.height())/2);

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    fileName = fileName.length > 20 ? fileName.substr(0,20)+'...' : fileName;
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });


  
    $("#form-contato").on('submit',(function(e) {
      document.getElementById("BTEnvia").textContent = "Enviando...";
      e.preventDefault();
      $.ajax({
        url:"../backend/form.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(result){
          result = JSON.parse(result);
          document.getElementById("BTEnvia").textContent = "Enviar";
          alert(result.msgEnviada ? 'Email enviado': 'O email não foi enviado');       
        },
        error: function(erro){
          document.getElementById("BTEnvia").textContent = "Enviar";
          alert('Ocorreu um erro ao enviar o email');       
        }
      })
    }));


  // function sendEmail() {

  //   var data = {}
  //   var form_data = new FormData();

  //   data.nome = document.getElementById("nome").value;
  //   data.email = document.getElementById("email").value;
  //   data.tel = document.getElementById("tel").value;
  //   data.mensagem = document.getElementById("mensagem").value;
    
  //   data.file = null;

  //   if($("#file").prop('files')[0]){
  //     data.file = new FormData($("#file"));
  //     // form_data.append("file",$("#file").prop('files')[0]);
  //     // data.file = form_data;
  //   }    
    
  //   console.log(data);

  //   $.ajax({
  //     url:"../backend/form.php", //the page containing php script
  //     type: "post", //request type,
  //     dataType: 'json',
  //     data: {registration: "success", data : data, BTEnvia: true},
  //     success:function(result){
  //       alert(result.msgEnviada ? 'Email enviado': 'O email não foi enviado');       
  //     },
  //     error: function(erro){
  //       alert('Ocorreu um erro ao enviar o email');       
  //     }
  //   });
  // }

