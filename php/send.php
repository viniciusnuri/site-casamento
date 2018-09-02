<?php
require_once((__DIR__).'/vendor/autoload.php');

function getDepositions(){
    $db = new DB;
    return $db->getAll('SELECT * FROM depositions');
}

if($_POST){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $db = new DB;
    $db->insert("INSERT INTO depositions (name, message) VALUES (?, ?)", [$name, $message]);
    set_flash("success", "Agradecemos pelo o seu carinho!", "success");
    redirect('/#depoimentos');
}
