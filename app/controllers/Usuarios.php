<?php

class Usuarios extends controller 
{


    public function __construct(){

        if (!Sessao::estadologin()) :
            URL::redirecionar('usuarios/login');
        endif;

        $this->usuarioModel = $this->model('Usuario');
        $this->consultaModel = $this->model('Consulta');
    }
    public function index($id){
        $usuario = $this->usuarioModel->lerusuarioPorId($id);

        $dados = [
            'usuario' => $usuario
        ];

        $this->view('usuarios/index', $dados);     
    }
        
    public function cadastrar(){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];

                if(in_array("", $formulario)):

                    if(empty($formulario['nome'])):
                        $dados['nome_erro'] = 'Preencha o campo nome';
                    endif;

                    if(empty($formulario['email'])):
                        $dados['email_erro'] = 'Preencha o campo email';
                    endif;

                    if(empty($formulario['senha'])):
                        $dados['senha_erro'] = 'Preencha o campo senha';
                    endif;

                    if(empty($formulario['confirma_senha'])):
                        $dados['confirma_senha_erro'] = 'confirme a senha';
                    endif;
                else :
                    if(Checa::checarNome($formulario['nome'])):
                        $dados['nome_erro'] = 'Nome inválido';
                        
                    elseif(Checa::checarEmail($formulario['email'])):
                        $dados['email_erro'] = 'O e-mail informado é invalido';
                    
                    elseif($this->usuarioModel->checarEmail($formulario['email'])):
                        $dados['email_erro'] = 'O e-mail informado é invalido Cadastrado';
                        
                    elseif(strlen($formulario['senha']) < 6 ): 
                        $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracteres';
                    elseif($formulario['senha'] != $formulario['confirma_senha']):
                            $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                    else:
                        $dados['senha'] = $senhaSegura = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                        if($this->usuarioModel->armazenar($dados)):
                        Sessao::mensagem('usuario','cadastro Realizado com sucesso');
                        Url::redirecionar('usuarios/login');
                        else:
                            die('Erro ao cadastrar usuario no banco de dados');
                        endif;
                    endif;
                endif;
   
        else :
            $dados = [
                'nome' => '',
                'email' =>'',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' =>'',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

        endif;


        $this->view('usuarios/cadastrar', $dados);     
    }

    public function login(){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

                if(in_array("", $formulario)):


                    if(empty($formulario['email'])):
                        $dados['email_erro'] = 'Preencha o campo email';
                    endif;

                    if(empty($formulario['senha'])):
                        $dados['senha_erro'] = 'Preencha o campo senha';
                    endif;

                else :
                        
                    if(Checa::checarEmail($formulario['email'])):
                        $dados['email_erro'] = 'O e-mail informado é invalido';
                    
                    else :

                        $usuario = $this->usuarioModel->checarLogin($formulario['email'],$formulario['senha']);

                        if($usuario):
                            $this->criarSessaoUsuario($usuario);
                        else :
                            Sessao::mensagem('usuario','Usuario ou senha inválida','alert alert-danger');
                        endif; 

                    endif;
                endif;  
        else :
            $dados = [
                'email' =>'',
                'senha' => '',
                'email_erro' =>'',
                'senha_erro' => '',
            ];

        endif;


        $this->view('usuarios/login', $dados);     
    }
   
    public function editar($id){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'id' => $id,
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'biografia' => trim($formulario['biografia']),
                
            ];

                if(in_array("", $formulario)):
                    if(empty($formulario['nome'])):
                         $dados['nome_erro'] = 'Preencha o campo Nome';
                     endif;

                    if(empty($formulario['email'])):
                        $dados['email_erro'] = 'Preencha o campo Email';
                    endif;
                        
                     if(empty($formulario['senha'])):
                           $dados['senha_erro'] = 'Preencha o campo Senha';
                     endif;

                    if(empty($formulario['confirma_senha'])):
                            $dados['confirma_senha_erro'] = 'confirme a senha';
                    endif;

                    else :

                    if(Checa::checarNome($formulario['nome'])):
                            $dados['nome_erro'] = 'Nome inválido';
                                
                        elseif(Checa::checarEmail($formulario['email'])):
                            $dados['email_erro'] = 'O e-mail informado é invalido';

                        elseif(($this->usuarioModel->checarEmail($formulario['email'])) && ($_SESSION['usuario_email'] != $formulario['email'])):
                            $dados['email_erro'] = 'O e-mail informado é invalido Cadastrado';
                                
                        elseif(($this->usuarioModel->checarEmail($formulario['email'])) && ($_SESSION['usuario_email'] == $formulario['email'])):
                            $dados['email_erro'] = 'actual'; 
                                
                        elseif(strlen($formulario['senha']) < 6 ): 
                                $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracteres';
                        elseif($formulario['senha'] != $formulario['confirma_senha']):
                            $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                                
                        else :
                            $dados['senha'] = $senhaSegura = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                            if($this->usuarioModel->actualizar($dados)):
                                Sessao::mensagem('perfil', 'Dados actualizados com sucesso');
                                else:
                                    die('Erro ao actualizar o post');
                            endif;
                    endif;
                endif;
            
            else :

                $ver = $this->usuarioModel->lerUsuarioPorId($id);

                if($ver->id != $_SESSION['usuario_id']) :
                    Sessao::mensagem('perfil', 'Você não tem autorização pra Actualizar esses Dados', 'alert alert-danger');
                    URL::redirecionar('usuarios/index');
                endif;
                var_dump($id);

                $dados = [
                    'id' => $id,
                    'nome' => $ver->nome,
                    'email' => $ver->email,
                    'senha' => '',
                    'biografia' => $ver->biografia,
                    'confirma_senha' => '',
                    'nome_erro' => '',
                    'email_erro' => '',
                    'senha_erro' => '',
                    'confirma_senha_erro' => '',
                ];

            endif;

        $this->view('usuarios/editar', $dados);     
    }
/*
    public function actualizar($id){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                $dados = [
                    'id' => $id,
                    'nome' => trim($formulario['nome']),
                    'email' => trim($formulario['email']),
                    'senha' => trim($formulario['senha']),
                    'confirma_senha' => trim($formulario['confirma_senha']),
                    'biografia' => trim($formulario['biografia'])
                ];

                    if(in_array("", $formulario)):

                        if(empty($formulario['nome'])):
                            $dados['nome_erro'] = 'Preencha o campo Nome';
                        endif;

                        if(empty($formulario['email'])):
                            $dados['email_erro'] = 'Preencha o campo Email';
                        endif;
                        
                        if(empty($formulario['senha'])):
                            $dados['senha_erro'] = 'Preencha o campo Senha';
                        endif;

                        if(empty($formulario['confirma_senha'])):
                            $dados['confirma_senha_erro'] = 'confirme a senha';
                        endif;

                        else :
                            if(Checa::checarNome($formulario['nome'])):
                                $dados['nome_erro'] = 'Nome inválido';
                                
                            elseif(Checa::checarEmail($formulario['email'])):
                                $dados['email_erro'] = 'O e-mail informado é invalido';
                            
                            elseif($this->usuarioModel->checarEmail($formulario['email'])):
                                $dados['email_erro'] = 'O e-mail informado é invalido Cadastrado';
                                
                            elseif(strlen($formulario['senha']) < 6 ): 
                                $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracteres';
                            elseif($formulario['senha'] != $formulario['confirma_senha']):
                                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                        

                            else :

                                $dados['senha'] = $senhaSegura = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                                if($this->usuarioModel->actualizardados($dados)):
                                    Sessao::mensagem('usuario','Dados actualizados com sucesso');
                                    Url::redirecionar('usuarios/perfil');
                                    else:
                                        die('Erro ao actualizar Dados');
                                endif;
                            endif;

                    endif;
                
            else :

                $atualiza = $this->usuarioModel->lerusuarioPorId($id);

                if($atualiza->id != $_SESSION['usuario_id']) :
                    Sessao::mensagem('post', 'Você não tem autorização pra editar esse post', 'alert alert-danger');
                    URL::redirecionar('perfil');
                endif;

                $dados = [
                'id' => $atualiza->id,
                'nome' => $atualiza->nome,
                'email' => $atualiza->email,
                'senha' => $atualiza->biografia,
                'biografia' => $atualiza->biografia,
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'confirma_senha_erro' => '',
            ];
        endif;

        var_dump($formulario);

        $this->view('usuarios/perfil', $dados);     
    }
 
public function marcar_consulta(){
        
    $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($formulario)):
        $dados = [
            'usuario_id' =>($_SESSION['usuario_id']),
            'email' => trim($formulario['email_alternative']),
            'telefone' => trim($formulario['phone_alternative']),
            'especialidade' => trim($formulario['especialidade']),
            'texto' => trim($formulario['texto_alternative']),
            'data_evento' => trim($formulario['data_evento']),
        ];

            if(in_array("", $formulario)):

                if(empty($formulario['telefone'])):
                    $dados['telefone_erro'] = 'Preencha o campo telefone';
                endif;

                if(empty($formulario['especialidade'])):
                    $dados['especialidade_erro'] = 'Preencha o campo especialidade';
                endif;

                if(empty($formulario['data_evento'])):
                    $dados['data_erro'] = 'Preencha o campo senha';
                endif;

            else :
                                        
                elseif(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                
                elseif($this->usuarioModel->checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido Cadastrado';
               
                else:
                    if($this->consultaModel->armazenar($dados)):
                    Sessao::mensagem('Consulta','cadastro Realizado com sucesso');
                    Url::redirecionar('usuarios/index');
                    else:
                        die('Erro ao cadastrar usuario no banco de dados');
                    endif;
                endif;
            endif;

    else :
        $dados = [
            'email' =>'',
            'telefone' =>'',
            'especialidade' => '',
            'texto' => '',
            'data_evento' => '',
            'email_erro' =>'',
            'telefone_erro' => '',
            'data_erro' => '',
        ];

    endif;


    $this->view('usuarios/index', $dados);     
}*/
        private function criarSessaoUsuario($usuario){
            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['usuario_nome'] = $usuario->nome;
            $_SESSION['usuario_email'] = $usuario->email;

            Url::redirecionar('posts');
        }


        public function sair(){
            unset($_SESSION['usuario_id']);
            unset($_SESSION['usuario_nome']);
            unset($_SESSION['usuario_email']);

            session_destroy();

            Url::redirecionar('usuarios/login');

        }

}

?>