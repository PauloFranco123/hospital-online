<?php

class Consulta {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function armazenar($dados){
        $this->db->query("INSERT INTO consulta(usuario_id, email_alternative, phone_alternative, especialidade, texto_alternative, data_evento) VALUES (:usuario_id, :email_alternative, :phone_alternative, :especialidade, :texto_alternative, :data_evento)");

        $this->db->bind("usuario_id",$dados['usuario_id']);
        $this->db->bind("email_alternative",$dados['email_alternative']);
        $this->db->bind("phone_alternative",$dados['phone_alternative']);
        $this->db->bind("especialidade",$dados['especialidade']);
        $this->db->bind("texto_alternative",$dados['texto_alternative']);
        $this->db->bind("data_evento",$dados['data_evento']);
        

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }
/*
    public function actualizar($dados){
        $this->db->query("UPDATE posts SET titulo= :titulo, texto = :texto WHERE id = :id");

        $this->db->bind("id",$dados['id']);
        $this->db->bind("titulo",$dados['titulo']);
        $this->db->bind("texto",$dados['texto']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function lerPostPorId($id){
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function destruir($id){
        $this->db->query("DELETE FROM posts WHERE id = :id");
        $this->db->bind("id", $id);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;

        

    public function lerConsulta(){
        $this->db->query("SELECT *,
        consulta.id as consultaId,
        consulta.criado_em as consultaDataCadastro,
        usuarios.id as usuarioId,
        usuarios.criado_em as usuarioDataCadastro
         FROM consulta
         INNER JOIN usuarios ON 
         consulta.usuario_id = usuarios.id
         ORDER BY consulta.id DESC
         ");
        return $this->db->resultados();
    }

    }*/
    

}
