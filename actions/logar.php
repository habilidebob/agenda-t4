<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require_once('../classes/Usuario.class.php');
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_POST['senha'];

    $resultado = $u->Logar();

    print_r($resultado);
}else{
    echo "A página deve ser carregada por POST!";
}
?>