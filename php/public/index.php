<?php

require "php/vendor/autoload.php";
require "php/app/src/Mail.php";


function sendMsg($nome, $emailEnviado, $tel, $mensagem, $arquivo){

    $email = new Mail();
    
    $msg = buildMessage($nome, $emailEnviado, $tel, $mensagem);
    
    return $email->send($nome, $emailEnviado, $tel, $msg,$arquivo);

}

function buildMessage($nome, $emailEnviado, $tel, $mensagem){
    
    $cabecalho = '<b>Nome:</b> '.$nome;
    $cabecalho .= '<br><b>Email: </b>'.$emailEnviado;
    $cabecalho .= '<br><b>Telefone: </b>'.$tel;

    $cabecalho .= '<br><br><br>';

    return $cabecalho.$mensagem;
}



