<section class="wrapper">
    <div class="content">
    <?= Sessao::mensagem('perfil')?>
        <div class="col-a">
        <div class="card col-md-8 mx-auto p-5 ">
                <div class="card-body">
                    <div class="card-header ">
                        
                        <h4>Nome - <?=$dados['nome']?></h4>
                    
                    </div> 
                    <div class="col-md-12 mx-auto p-4">
                        
                    <h4>Biografia - </h4><p class="card-text"><small> <?=$dados['biografia'] ?></small></p>

                    </div>
                </div>
        </div>

        </div>

        <div class="card col-md-8 mx-auto p-5 col-b">
            <div class="card-header">
              Dados Pessoais
            </div>
            <div class="card-body">
                <p class="card-text"><small>Verifique seus Dados</small></p>

                 <form name="editar" method="POST" action="<?=URL?>/usuarios/editar/<?= $dados['id']?>" class="mt-4">
                    <div class="form-group">
                        <label for="nome">Nome: <sup class="text-danger">*</sup></label>        
                        <input type="text" name="nome" id="nome" value="<?=$dados['nome'] ?>" class="form-control <?=$dados['nome_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['nome_erro']?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" id="email" value="<?=$dados['email'] ?>" class="form-control <?=$dados['email_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?=$dados['email_erro']?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name="senha" id="senha" value="<?=$dados['senha'] ?>" class="form-control <?=$dados['senha_erro'] ? 'is-invalid' : '' ?>">
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
                    
                    <div class="form-group">
                        <label for="Biografia">Biografia: <sup class="text-danger">*</sup></label>
                        <textarea name="biografia" id="biografia" class="form-control" rows="5"><?=$dados['biografia'] ?></textarea>
                        <div class="invalid-feedback">
                            <?=$dados['texto_erro']?>
                        </div>
                    </div>
                    </div> 
                        <div class="col-md-6">
                            <input type="submit" value="Actualizar" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
