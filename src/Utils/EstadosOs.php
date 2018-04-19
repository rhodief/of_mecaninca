<?php

namespace App\Utils;

class EstadosOs
{
    protected static $estados = [
        1 => 'AGUARDANDO INDICAÇÃO DE SERVIÇOS',
        2 => 'EM EXECUÇÃO',
        3 => 'FINALIZADO'
    ];

    public static function estados(){
        return self::$estados;
    }

    public static function setAguardando(){
        return 1;
    }

    public static function setEmExecucao(){
        return 2;
    }

    public static function setFinalizado(){
        return 3;
    }
}

