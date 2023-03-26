<?php

class Helper {

    public static function resumirTexto($texto, $limite, $continue = null){

        $texto = strip_tags(trim($texto));
        $limite = (int) $limite;

        $array = explode(" ", $texto);
        $totalPalavras = count($array);

        $textoResumido = implode(" ", array_slice($array, 0, $limite));

        $continue = (empty($continue) ? '...' : ''.$continue);
        $resultado = (empty($continue) ? '...' : ''.$continue);
        $resultado = ($limite < $totalPalavras ? $textoResumido.$continue : $texto);
        
        return $resultado;

        echo '<hr>';
        var_dump($array, $totalPalavras);
        echo '<hr>';
    }


    public static function dataAtual() {
        $diaMes = date('d');
        $diaSemana = date('w');
        $mes = date('n') - 1;
        $ano = date('Y');
        
        $nomeSemana = ["Domingo", "Segunda-feira", "terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];

        $nomeMes = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];

        return $nomeSemana[$diaSemana].', '.$diaMes.' de '.$nomeMes[$mes].' de '.$ano;
        
    }


}
?>