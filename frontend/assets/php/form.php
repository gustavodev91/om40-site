<?php

include('php/public/index.php');



if (isset($_POST['BTEnvia'])) {
    $erroPreenchimento = false;   
    $erroEnvioEmail = false;
 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel']; 
    $mensagem = $_POST['mensagem'];

    $msgForm = '<div class="col-md-12">';

    if(empty($nome) || empty($email) || empty($tel) || empty($mensagem)){
        $msgForm .= 'Existe campos incorretos!';        
        $erroPreenchimento = true;
    }else{
        if (!sendMsg($nome, $email, $tel, $mensagem)){        
            $msgForm .= 'Ocorreu um erro ao enviar o formulário!';            
        }else {
            $msgForm .= 'Sua mensagem foi enviada.';
        }        
    }

    $msgForm .= '</div>';
    
}
