
<?php
var_dump($_FILES);
echo '<hr>';

if(isset($_FILES['arquivo'])):
    $diretorio = '../public/uploads/';
    $arquivonome = $_FILES['arquivo']['tmp_name'];
    $arquivo = $_FILES['arquivo']['name'];

    if(move_uploaded_file($arquivonome, $diretorio.$arquivo)):
    echo 'Arquivo Carregado com sucesso'; 
    else:
        echo 'Erro ao Carregar Arquivo';
    endif;

endif;


echo '<hr>';
?>

<form method="post" enctype="multipart/form-data">
    <input type= "file" name="arquivo">
    <input type="submit" value="Enviar">
</form>