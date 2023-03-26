<section>

    <div class="col-md-8 mx-auto p-5">
        <div class="card">
            <div class="card-header">
               Agendar Consulta
            </div>
            <div class="card-body bg-light">
    
                <p class="card-text"><small>Preencha o Formulário Abaixo</small></p>
                
                <form name="cadastrar" method="POST" action="<?=URL?>/usuarios/cadastrar" class="mt-4">
                    <div class="form-group">
                        <label for="titulo">Título: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" id="email" value="<?=$dados['email']?>"class="form-control <?=$dados['email_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?=$dados['email_erro']?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="texto">Texto: <sup class="text-danger">*</sup></label>
                        <textarea name="texto" id="texto"  class="form-control <?=$dados['texto_erro'] ? 'is-invalid' : '' ?>" rows="5">  <?=$dados["texto"] ? $dados["texto"] : ''?></textarea>
                        <div class="invalid-feedback">
                            <?=$dados['texto_erro']?>
                        </div>
                    </div>
                    
                    <input type="submit" value="cadastrar" class="btn btn-primary">
                </form>
            </div>
            
        </div>
    </div>
</section>
