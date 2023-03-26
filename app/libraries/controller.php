<?php


class controller {

    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }


    public function view($view, $dados = []){
        $arquivo = ('../app/views/'.$view.'.php');
        if(file_exists($arquivo)):
            require_once $arquivo;
        else:
            die('O arquivo da view não encontrado');
        endif;
    }

    
}

 