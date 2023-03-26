<!--<section>
<div class="col-md-8 mx-auto p-5">
<div class="container my-5">
     <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=URL?>/posts">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$dados['post']->titulo ?></li>
            </ol>
        </div>
    <div class="card ">
        <div class=" card-header ">
            <?=$dados['post']->titulo ?>
        </div>
        <div class="card-body">
            
                <p class="card-text"><?=$dados['post']->texto ?></p>
               
            </div>
                            
            <div class="card-footer text-muted">
                <small>    
                    Escrito por:<?= $dados['usuario']->nome?> em <?= Checa::databr($dados['post']->criado_em)?>
                </small>            
            </div>
            <?php if($dados['post']->usuario_id == $_SESSION['usuario_id']): ?>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="<?= URL.'/posts/editar/'.$dados['post']->id?>" class="btn btn-sm btn-primary">Editar</a>  
                    </li>
                    <li class="list-inline-item">
                        <form action="<?= URL.'/posts/deletar/'. $dados['post']->id?>" method="POST">
                            <input type="submit" class="btn btn-sm btn-danger" value="deletar">
                        </form> 
                    </li>
                </ul>
            <?php endif?>
        </div>
      
    </div>
</div>
            </div>

</section>
-->
                        