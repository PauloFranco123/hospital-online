<?php

class Posts extends Controller{

    public function __construct()
    {
        if (!Sessao::estadologin()) :
            URL::redirecionar('usuarios/login');
        endif;

        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('usuario');
    }

    public function index(){

        $dados = [
            'posts' => $this->postModel->lerPosts()
        ];


        $this->view('posts/index', $dados);
    }

    public function cadastrar(){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'usuario_id' =>($_SESSION['usuario_id']),
            ];

                if(in_array("", $formulario)):

                    if(empty($formulario['titulo'])):
                        $dados['titulo_erro'] = 'Preencha o campo titulo';
                    endif;

                    if(empty($formulario['texto'])):
                        $dados['texto_erro'] = 'Preencha o campo texto';
                    endif;

                else :

                    if($this->postModel->armazenar($dados)):
                        Sessao::mensagem('usuario','Postagem Realizado com sucesso');
                        Url::redirecionar('posts');
                        else:
                            die('Erro ao Enviar Post no banco de dados');
                        endif;

                endif;

        else :
            $dados = [
                'titulo' => '',
                'texto' =>'',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];

        endif;


        $this->view('posts/cadastrar', $dados);     
    }

    public function editar($id){
        
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'id' => $id,
                'titulo' => trim($formulario['titulo']),'texto' => trim($formulario['texto']),
            ];

                if(in_array("", $formulario)):

                    if(empty($formulario['titulo'])):
                        $dados['titulo_erro'] = 'Preencha o campo titulo';
                    endif;

                    if(empty($formulario['texto'])):
                        $dados['texto_erro'] = 'Preencha o campo texto';
                    endif;

                else :

                    if($this->postModel->actualizar($dados)):
                        Sessao::mensagem('post','Post actualizado com sucesso');
                        Url::redirecionar('posts');
                        else:
                            die('Erro ao actualizar o post');
                        endif;

                endif;
            
        else :

            $post = $this->postModel->lerPostPorId($id);

            if($post->usuario_id != $_SESSION['usuario_id']) :
                Sessao::mensagem('post', 'Você não tem autorização pra editar esse post', 'alert alert-danger');
                URL::redirecionar('posts');
            endif;

            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];

        endif;

        var_dump($formulario);

        $this->view('posts/editar', $dados);     
    }


        public function ver($id){
            $post = $this->postModel->lerPostPorId($id);

            if($post == null){

                Url::redirecionar('paginas/error');
            }
            $usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);

            $dados = [
                'post' => $post,
                'usuario' => $usuario
            ];

            $this->view('posts/ver', $dados);
        }

        public function deletar($id){

            if (!$this->checarAutorizacao($id)) :

                $id = filter_var($id, FILTER_VALIDATE_INT);
                $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

                if($id && $metodo == 'POST' ):
                    if($this->postModel->destruir($id)) :
                        Sessao::mensagem('post', 'Post deletado com Sucesso');
                        URL::redirecionar('posts');
                    endif;
                else:
                    Sessao::mensagem('post','Não tem autorização para deletar este Post', 'alert alert-danger');
                    URL::redirecionar('posts');
                endif;
    
            
            else :
                Sessao::mensagem('post','Não tem autorização para deletar este Post', 'alert alert-danger');
                URL::redirecionar('posts');
            endif;
        }


        private function checarAutorizacao($id){

            $post = $this->postModel->lerPostPorId($id);
            if($post->usuario_id != $_SESSION['usuario_id']) :
                return true;
            else:
                return false;
            endif;
        }
    
}