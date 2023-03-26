<?php

class Paginas extends controller {
        
    public function index(){

        if (Sessao::estadologin()) :
            URL::redirecionar('posts');
        endif;

        $this->view('paginas/home');     
    }

    public function services(){
    
            $this->view('paginas/services');

    }
    
    public function about(){
    
        $this->view('paginas/about');

    }

    public function contact(){
        
        $this->view('paginas/contact');

    }

    public function sobre(){

        $dados = [
            'titulopagina' => 'Página Sobre nós'
            
        ];

        $this->view('paginas/sobre', $dados);

    } 

    
    public function error(){

        $dados = [
            'titulopagina' => 'Página Não encontrada erro 477'
            
        ];

        $this->view('paginas/error', $dados);

    } 


}