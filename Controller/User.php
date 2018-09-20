<?php 

//criar um usuario generico

class User{
    
    private $idUser;
    private $nome;
    private $email;
    private $senha;

    public function getIduser(){
        return $this->$idUser;
    }

    public function setIduser($value){
        $this->idUser = $value;
    }

    public function getNome(){
        return $this->$nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }

    public function getEmail(){
        return $this->$email;
    }

    public function setEmail($value){
        $this->email = $value;
    }

    public function getSenha(){
        return $this->$senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }
} 



?>