<?php

require "../vendor/autoload.php";
require("../app/src/Mail.php");
// use app\src\Mail;

$email = new Mail();

$email->send();
