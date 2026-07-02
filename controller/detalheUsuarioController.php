<?php

include_once('../model/usuarioDetalheModel.php');
include_once('../model/getAuxModel.php');

session_start();



if (isset($_POST['verPresente'])) {

    $nome =  trim($_POST['nomeUsuario'] ?? $_SESSION['nome']);
    $email = trim($_POST['email'] ?? $_SESSION['email']);

    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;

    

    $reserva = reservaPresente($nome,$email);

}


?>