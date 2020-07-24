<?php
include(__DIR__.'/public/index.php');

$msgEnviada = false;

if (isset($_POST)) {        
    
    $erroPreenchimento = false;
    $erroEnvioEmail = false;

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $mensagem = $_POST['mensagem'];
    $file = null;

    
    if(empty($nome) || empty($email) || empty($tel) || empty($mensagem)){
        
        $msgForm .= 'Existe campos incorretos!';        
        $erroPreenchimento = true;        
        return 1;
    }   

    if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){  

        $file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));


        if($file_size > 25000000){
            echo 'Arquivo maior que 25MB';die;
            return 2;
        }
  
        $file = $_FILES['file'];
    }
    
    $msgForm = '<div class="col-md-12">';

    if (!sendMsg($nome, $email, $tel, $mensagem, $file)){            
        $msgForm .= 'Ocorreu um erro ao enviar o formulário!';            
        return 0;
    }else {
        $msgEnviada = true;
        $msgForm .= 'Sua mensagem foi enviada.';
        return 3;        
    }

    $msgForm .= '</div>';
}

return 10;