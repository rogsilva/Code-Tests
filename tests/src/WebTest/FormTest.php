<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 25/11/14
 * Time: 20:12
 */

namespace WebTest;


class FormTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('localhost:8000');
    }

    public function testVerificaTitle()
    {
        $this->url('localhost:8000');
        $this->assertEquals('Tests', $this->title());
    }

    public function testVerificaValoresDosCamposDoFormulario()
    {
        $this->url('/');

        $campoNome = $this->byName('nome');
        $this->assertEquals('', $campoNome->value());

        $campoValor = $this->byName('valor');
        $this->assertEquals(12.99, $campoValor->value());

        $campoDescricao = $this->byName('descricao');
        $this->assertEquals('Lorem Ipsum ...', $campoDescricao->value());
    }
} 