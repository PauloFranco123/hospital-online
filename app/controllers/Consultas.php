<?php

class consultas extends controller{

    public function __construct()
    {
        if (!Sessao::estadologin()) :
            URL::redirecionar('usuarios/login');
        endif;

        $this->consultaModel = $this->model('Consulta');
        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('Usuario');
        
    }
    public function index(){

        $this->view('consultas/cadastrar');
    }

    public function cadastrar(){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'usuario_id' => $_SESSION['usuario_id'],
                'email_alternative' => trim($formulario['email_alternative']),
                'phone_alternative' => trim($formulario['phone_alternative']),
                'especialidade' => trim($formulario['especialidade']),
                'texto_alternative' => trim($formulario['texto_alternative']),
                'data_evento' => trim($formulario['data_evento']),
                'email_erro' =>'',
                'telefone_erro' => '',
                'data_erro' => '',
                'especialidade_erro' => '',
            ];

                if(in_array("", $formulario)):

                    if(empty($formulario['email_alternative'])):
                        $dados['email_erro'] = 'Preencha o campo email';
                    endif;


                    if(empty($formulario['phone_alternative'])):
                        $dados['telefone_erro'] = 'Preencha o campo telefone';
                    endif;

                    if(empty($formulario['especialidade'])):
                        $dados['especialidade_erro'] = 'Preencha o campo especialidade';
                    endif;

                    if(empty($formulario['data_evento'])):
                        $dados['data_erro'] = 'Preencha o campo';
                    endif;

                else :
                                            
                    if(Checa::checarEmail($formulario['email_alternative'])):
                        $dados['email_erro'] = 'O e-mail informado é invalido';
                    
                    elseif($this->usuarioModel->checarEmail($formulario['email_alternative'])):
                        $dados['email_erro'] = 'O e-mail informado é invalido Cadastrado';
                   
                    else:
                        if($this->consultaModel->armazenar($dados)):
                        Sessao::mensagem('usuario','Sua consulta foi Agendada com sucesso');
                        else:
                            Sessao::mensagem('usuario','Sua consulta foi Agendada com sucesso','alert alert-danger');
                        endif;
                    endif;
                endif;
   
        else :
            $dados = [
                'email_alternative' =>'',
                'phone_alternative' =>'',
                'especialidade' => '',
                'texto_alternative' => '',
                'data_evento' => '',
                'email_erro' =>'',
                'telefone_erro' => '',
                'data_erro' => '',
            ];

        endif;


        $this->view('consultas/cadastrar', $dados);     
    }
}