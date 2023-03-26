<section>
<div class="container"><small>    
<?= Helper::dataAtual()?></small></div>
    <div class="wrapper">
        <div class="content">
            <div class="container py-5">
                <?= Sessao::mensagem('perfil')?>
                
                <div class="card">
                    <div class=" card-header bg-primary text-white">
                        <header class="float-right text-white ">
                        <p>POSTAGENS</p>
                        </header>
                        <div class="float-right col-a">
                            <a href="<?=URL?>/posts/cadastrar" class="btn btn-light">
                            Escrever
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach ($dados['posts'] as $post): ?>
                            <div class="card my-5">
                                <div class="card-header">
                                    <?= $post->titulo ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?= Helper::resumirTexto($post->texto, 20) ?>
                                </p>
                                <a href="<?=URL.'/posts/ver/'.$post->postId ?>" class="btn btn-primary float-right">Ler mais...</a>
                            </div>
                            <div class="card-footer text-muted">
                                Escrito por: <?= $post->nome ?> em <?= Checa::databr($post->postDataCadastro) ?>
                            </div>
                        
                        
                        
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>