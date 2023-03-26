<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?=URL?>/paginas/home" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="<?=URL?>/paginas/services" class="nav-link px-2 text-white">services</a></li>
          <li><a href="<?=URL?>/paginas/about" class="nav-link px-2 text-white">sobre</a></li>
          <li><a href="<?=URL?>/paginas/contact" class="nav-link px-2 text-white">contact</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <?php if(isset($_SESSION['usuario_id'])) : ?>
                    <span class="navbar-text">
                    <p>Olá,  <?= $_SESSION['usuario_nome'] ?></p>
                    <a class="btn btn-outline-light btn-danger me-2  py-3 px-3" href="<?= URL ?>/usuarios/sair">Sair</a>
                    <a href="<?= URL.'/usuarios/index/'.$_SESSION['usuario_id']?>" class="btn btn-outline-light btn-sm btn-primary py-3 px-3 ">Perfil</a>
                    </span>
                
                <?php else : ?>
                    <span class="navbar-text">
                       
                    <div class="text-end">
                      <a href="<?=URL?>/usuarios/login">
                      <button type="button" class="btn btn-outline-light me-2">Login</button>
                      </a>
                      <a href="<?=URL?>/usuarios/cadastrar">
                      <button type="button" class="btn btn-warning">Sign-up</button>
                      </a>
                    </div> 
                   
                    </span>
        <?php endif; ?>

        
      </div>
    </div>
  </header>