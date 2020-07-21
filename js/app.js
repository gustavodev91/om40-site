

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
         
    e.preventDefault();
    
    valida = validaFormulario(new FormData(this));

    if(valida.val == false){
      alert(valida.msg);
      return;
    }

    document.getElementById("BTEnvia").textContent = "Enviando..."; 

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
        retornoEmail(erro)          
      }
    })
  }));

  function retornoEmail(_return){
    document.getElementById("BTEnvia").textContent = "Enviar";
    alert(_return.status == '200' ? 'Email enviado' : 'Ocorreu um erro ao enviar seu contato')      
  }

  function validaFormulario(form){
    val = true;
    msg = ''
    if(form.get('file').size >= 25000000){
      val = false;
      msg = 'Arquivo deve ser menor que 25Mb';
    }      
    return {
      val, 
      msg
    }
  }
