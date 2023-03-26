<?php

class Usuario {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checarEmail($email){
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e",$email);

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function armazenar($dados){
        $this->db->query("INSERT INTO usuarios(nome, email, senha) VALUES (:nome, :email, :senha)");

        $this->db->bind("nome",$dados['nome']);
        $this->db->bind("email",$dados['email']);
        $this->db->bind("senha",$dados['senha']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function checarLogin($email, $senha){

        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)):
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

    public function actualizar($dados){
        $this->db->query("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, biografia = :biografia WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);
        $this->db->bind("biografia", $dados['biografia']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM usuarios WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function checarEmailPorId($id){
        $this->db->query("SELECT email FROM usuarios WHERE id = :e");
        $this->db->bind(":e", $id);

            if($this->db->resultado()):
                return true;
            else:
                return false;
            endif;
        
    }

   
}


