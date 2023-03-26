<section class="wrapper">
    <div class="content">
        <div class="card col-md-8 mx-auto p-5">
            <div class="card-header">
               Cadastre-se
            </div>
            <div class="card-body">
                <p class="card-text"><small>Preencha o formulário abaixo para fazer seu Cadastro</small></p>

                <form name="cadastrar" method="POST" action="<?=URL?>/usuarios/cadastrar" class="mt-4">
                    <div class="form-group">
                        <label for="nome">Nome: <sup class="text-danger">*</sup></label>        
                        <input type="text" name="nome" id="nome" value="<?=$dados['nome'] ? $dados['nome'] :'' ?>" class="form-control <?=$dados['nome_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['nome_erro']? $dados['nome_erro'] : ''?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" id="email" value="<?=$dados['email'] ? $dados['email'] : ''?>" class="form-control <?=$dados['email_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['email_erro'] ? $dados['email_erro'] : ''?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name="senha" id="senha" value="<?=$dados['senha'] ? $dados['senha'] : '' ?>" class="form-control <?=$dados['senha_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['senha_erro']?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirma_senha">Confirme a Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name="confirma_senha" id="confirma_senha"  value="<?=$dados['confirma_senha'] ? $dados['confirma_senha'] : '' ?>" class="form-control <?=$dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['confirma_senha_erro']?>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="cadastar" class="btn-info btn-block">
                        </div>
                        <div class="col-md-6">
                            <a href="<?=URL?>/usuarios/login"> Já tem uma conta? faça o login </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
