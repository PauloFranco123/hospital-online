  <?php
session_start();

    include './../app/pherro.php';
    include './../app/configuracao.php';
    include './../app/autoload.php';  
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NOME ?></title>
    <link href="<?=URL?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL?>/public/css/style.css">
  </head> 
  
<body class>   
   
   <?php 
        
        include '../app/views/header.php';
        $rotas = new Rota();
        include '../app/views/footer.php';
    ?>
    </p>
    
    <script src="<?=URL?>/public/js/jquery.funcoes.js"></script>
     <!--<script src="https://unpkg.com/scrollreveal">
    </script>-->   
    <script src="<?=URL?>/public/js/main.js">
    </script>
    
</body>
</html>