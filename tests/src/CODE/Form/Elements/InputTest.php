<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 11/11/14
 * Time: 21:34
 */

namespace CODE\Form\Elements;


class InputTest extends \PHPUnit_Framework_TestCase
{

    /*
     *
     * Testes unitários
     *
     */
    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('\CODE\Form\Elements\Interfaces\ElementInterface', new \CODE\Form\Elements\Input());
        $this->assertInstanceOf('\CODE\Form\Elements\Input', new \CODE\Form\Elements\Input());
    }

    public function testVerificaSettersEGetters()
    {
        $element = new \CODE\Form\Elements\Input();
        $element->setType('text')
                ->setName('input')
                ->setValue('Meu input')
                ->setAttributes(['id'=>'test', 'class'=>'myClass'])
        ;

        $this->assertEquals('text', $element->getType());
        $this->assertEquals('input', $element->getName());
        $this->assertEquals('Meu input', $element->getValue());
        $this->assertEquals(['id'=>'test', 'class'=>'myClass'], $element->getAttributes());
    }

    public function testVerificaMetodoCreate()
    {
        $element = new \CODE\Form\Elements\Input();
        $element->setType('text')
            ->setName('login')
            ->setValue('meu login')
        ;

        $this->assertEquals('<input type="text" name="login" value="meu login">', $element->create());
    }
} 