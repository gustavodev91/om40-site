<?php

include(__DIR__.'/public/index.php');

$msgEnviada = false;


if (isset($_POST)) {

    $_POST['BTEnvia'] = false;
    $erroPreenchimento = false;
    $erroEnvioEmail = false;

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $mensagem = $_POST['mensagem'];
    $file = null;

    if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){  

        $errors= array();

        $file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

        // $extensions= array("jpeg","jpg","png","pdf","ppt","doc","docx");

        // if(in_array($file_ext,$extensions)=== false){
        //     $errors[]="Extensão não permitida";
        // }

        if($file_size > 25000000){
            $errors[]='Tamanho deve ser menor que 25 MB';
        }
  
        $file = $_FILES['file'];
    }
    
    $msgForm = '<div class="col-md-12">';

    if(empty($nome) || empty($email) || empty($tel) || empty($mensagem)){
        $msgForm .= 'Existe campos incorretos!';        
        $erroPreenchimento = true;
    }else{
        if (!sendMsg($nome, $email, $tel, $mensagem, $file)){            
            $msgForm .= 'Ocorreu um erro ao enviar o formulário!';            
        }else {
            $msgEnviada = true;
            $msgForm .= 'Sua mensagem foi enviada.';
        }        
    }

    $msgForm .= '</div>';
}

echo json_encode(array("msgEnviada"=>$msgEnviada, 'msgForm'=> $msgForm));
