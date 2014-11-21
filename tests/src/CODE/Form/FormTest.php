<?php
/*
 * Esta classe deve extender uma interface chamada FormInterface
 * Deve depender de uma classe validator
 * Permitir adicionar campos ao formulário
 * Permitir renderizar os campos individualmente
 * Deve possuir o metodo render que gera o formulário com base nos campos adicionados
 *
 */

namespace CODE\Form;


class FormTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp()
    {
        $this->validator = new \CODE\Validation\Validation();
    }

    public function tearDown()
    {
        $this->validator = null;
    }


    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('\CODE\Form\Interfaces\FormInterface', new \CODE\Form\Form($this->validator));
        $this->assertInstanceOf('\CODE\Form\Form', new \CODE\Form\Form($this->validator));
    }


    public function testVerificaGettersESetters()
    {
        $form = new \CODE\Form\Form($this->validator);
        $form->setAction('envia.php')
                ->setMethod('post')
                ->setAttributes(['class'=>'teste', 'id'=>'teste'])
        ;

        $this->assertEquals('envia.php', $form->getAction());
        $this->assertEquals('post', $form->getMethod());
        $this->assertEquals(['class'=>'teste', 'id'=>'teste'], $form->getAttributes());
    }

    public function testVerificaOpenTagECloseTag()
    {
        $form = new \CODE\Form\Form($this->validator);
        $form->setAction('envia.php')
                ->setMethod('post')
        ;

        $this->assertEquals('<form action="envia.php" method="post">', $form->openTag());
        $this->assertEquals('</form>', $form->closeTag());

        $form2 = new \CODE\Form\Form($this->validator);

        $this->assertEquals('<form>', $form2->openTag());
        $this->assertEquals('</form>', $form2->closeTag());
    }

    public function testVerificaMetodoAdd()
    {
        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getName')
            ->willReturn('element1');

        $form = new \CODE\Form\Form($this->validator);
        $form->add($element);

        $this->assertInstanceOf('\CODE\Form\Elements\Interfaces\ElementInterface', $form->getElements()['element1']);
        $this->assertInstanceOf('\CODE\Form\Elements\Input', $form->getElements()['element1']);
    }

    public function testVerificaMetodoRender()
    {
        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getName')
            ->willReturn('element1');
        $element->method('create')
            ->willReturn('<input name="element1">');

        $form = new \CODE\Form\Form($this->validator);
        $form->setAction('send.php');
        $form->add($element);

        $expect = '<form action="send.php"><input name="element1"></form>';

        $this->assertEquals($expect, $form->render());
    }

    public function testVerificaMetodoRenderField()
    {
        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getName')
            ->willReturn('element1');
        $element->method('create')
            ->willReturn('<input name="element1">');

        $form = new \CODE\Form\Form($this->validator);
        $form->add($element);

        $this->assertEquals('<input name="element1">', $form->renderField('element1'));
    }

    /*
     *
     * Testes Funcionais
     *
     */

} 