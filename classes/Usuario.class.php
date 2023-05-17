<?php

require_once('Banco.class.php');

class Usuario{
    public $id;
    public $nome;
    public $senha;
    public $email;

    public function Cadastrar(){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES(?,?,?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);
        $comando->execute(array($this->nome, $this->email, $hash));
        // Desconectar do banco:
        Banco::desconectar();
    }
    public function Logar(){

    }
}



?>