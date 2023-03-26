<?php

spl_autoload_register(function ($classe){

    $diretorios = [
        'libraries',
        'helpers'
    ];

    foreach($diretorios as $directorio):
        $arquivo = (__DIR__.DIRECTORY_SEPARATOR.$directorio.DIRECTORY_SEPARATOR.$classe.'.php');    
        if(file_exists($arquivo)):
            require_once ($arquivo);
        endif;
    endforeach;
});