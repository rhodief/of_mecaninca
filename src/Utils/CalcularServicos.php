<?php
namespace App\Utils;

class CalcularServicos{
    
    private $servicos = [];
    private $pecas = [];
    private $valores = [];
    
    function __construct($servicos, $pecas = []){
        $this->servicos = $servicos;
        $this->pecas = $pecas;
    }

    function calcular(){
        $this->subtotalServicos();
        $this->subtotalPecas();
        $this->subtotal();
        $this->aplicarDesconto();
        return $this->valores;
    }

    private function subtotalServicos(){
        $subtotal = 0;
        foreach($this->servicos as $s){
            $horas = $s->horas;
            $quantidade = $s->_joinData->quantidade;
            $valor_hora = $s->setor->valor_hora;
            $subtotal += $horas * $valor_hora * $quantidade;
        }
        $this->valores['subtotal_servicos'] = $subtotal;
    }

    private function subtotalPecas(){
        $subtotal = 0;
        $this->valores['subtotal_pecas'] = $subtotal;
    }

    private function subtotal(){
        $servicos = $this->valores['subtotal_servicos'];
        $pecas = $this->valores['subtotal_pecas'];
        $subtotal = $pecas + $servicos;
        $this->valores['subtotal'] = $subtotal;
    }

    private function aplicarDesconto(){
        //De 200 a 1000 => 5%
        //Superior a 1000 => 10%;
        $subtotal = $this->valores['subtotal'];
        $this->valores['percentual_desconto'] = 0;
        
        if($subtotal >= 200 && $subtotal < 1000){
            $this->valores['percentual_desconto'] = 5;
        }else
        if($subtotal >= 1000){
            $this->valores['percentual_desconto'] = 10;
        }
        $this->valores['valor_desconto'] = $subtotal * $this->valores['percentual_desconto']/100;
        $this->valores['total'] = $subtotal * (100 - $this->valores['percentual_desconto'])/100;
    }

}