
<section class="wrapper">
    <div class="content">
        <div class="card col-md-8 mx-auto p-5">
            <div class="card-header">
               Faça o login
            </div>
            <div class="card-body">
            <?= Sessao::mensagem('usuario')?>
                <p class="card-text"><small>Digite o email e a senha</small></p>
                
                <form name="login" method="POST" action="<?=URL?>/usuarios/login" class="mt-4">
                    <div class="form-group">
                        <label for="email">Email: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" id="email" value="<?=$dados['email']?>" class="form-control <?=$dados['email_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?=$dados['email_erro']?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name="senha" id="senha" value="<?=$dados['senha']?>" class="form-control <?=$dados['senha_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?=$dados['senha_erro']?>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="login" class="btn-info btn-block">
                        </div>
                        <div class="col-md-6">
                            <a href="<?=URL?>/usuarios/cadastrar"> Não tem uma conta? faça o cadastro </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
