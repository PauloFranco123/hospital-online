<section>
    <div class="col-md-8 mx-auto p-5">
        <div class="container my-5">
            <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>/posts">Dados Pessoais</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$dados['usuario']->nome ?></li>
                    </ol>
                </div>
            <div class="card ">
                <div class="card col-md-8 mx-auto p-5 ">
                    <div class="card-body">
                        <div class="card-header ">
                            <h4>Nome - <?=$dados['usuario']->nome ?></h4>
                        </div> 

                        <div class="col-md-12 mx-auto p-4">
                            <h4>Biografia - </h4><p class="card-text"><small> <?=$dados['usuario']->biografia ?></small></p>
                        </div>
                            
                        <div class="card-footer text-muted">
                            <small>    
                            <h4>Email - </h4><p class="card-text"><small><?=$dados['usuario']->email ?></small></p>
                            </small>            
                        </div>
                    </div>

                </div>
                    <?php if($dados['usuario']->id == $_SESSION['usuario_id']): ?>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="<?= URL.'/usuarios/editar/'.$dados['usuario']->id?>" class="btn btn-sm btn-primary">Editar</a>  
                            </li>
                        </ul>
                    <?php endif?>
                </div>
            
            </div>
        </div>
    </div>

</section>



                        