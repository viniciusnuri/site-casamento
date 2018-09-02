<?php

function set_flash($key, $message, $type = 'danger'){
    if(!isset($_SESSION['flash'][$key])){
        $_SESSION['flash'][$key] = "<span class='alert alert-{$type}'>{$message}</span>";
    }
}

function get_flash($key){
    if(isset($_SESSION['flash'][$key])){
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message ?: "";
    }
}

function redirect($page = '/'){
    header("Location: {$page}");
    die();
}