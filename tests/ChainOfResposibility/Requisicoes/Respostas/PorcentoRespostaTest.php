<?php

namespace DesignPatterns\Tests\ChainOfResposibility\Requisicoes\Respostas;

use DesignPatterns\ChainOfResponsibility\Requisicoes\Conta;
use DesignPatterns\ChainOfResponsibility\Requisicoes\Formato;
use DesignPatterns\ChainOfResponsibility\Requisicoes\Requisicao;
use DesignPatterns\ChainOfResponsibility\Requisicoes\RespostaInterface;
use DesignPatterns\ChainOfResponsibility\Requisicoes\Respostas\PorcentoResposta;
use PHPUnit\Framework\TestCase;

class PorcentoRespostaTest extends TestCase
{
    public function testRequisicaoBemSucedida()
    {
        $requisicao = new Requisicao(Formato::$PORCENTO);

        $conta = new Conta();
        $conta->titular = 'Fulano de tal';
        $conta->saldo = 100.50;

        $servico = new PorcentoResposta($this->createMock(RespostaInterface::class));
        $resposta = $servico->responde($requisicao, $conta);

        $string = 'Titular%Saldo' . PHP_EOL . 'Fulano de tal%100.5' . PHP_EOL;

        $this->assertEquals($string, $resposta);
    }
}