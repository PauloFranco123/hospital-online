<section>

    <div class="col-md-8 mx-auto p-5">
        
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=URL?>/posts">posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastar</li>
            </ol>
        </div>
        <div class="card">
            <div class="card-header">
               Enviar Post
            </div>
            <div class="card-body bg-light">
    
                <p class="card-text"><small>Digite o Post</small></p>
                
                <form name="cadastrar" method="POST" action="<?=URL?>/posts/cadastrar" class="mt-4">
                    <div class="form-group">
                        <label for="titulo">Título: <sup class="text-danger">*</sup></label>
                        <input type="text" name="titulo" id="titulo" value="<?=$dados['titulo']?>"class="form-control <?=$dados['titulo_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?=$dados['titulo_erro']?>
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
