<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 12/11/14
 * Time: 23:03
 */

namespace CODE\Form\Elements;


class TextAreaTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('\CODE\Form\Elements\Interfaces\ElementInterface', new \CODE\Form\Elements\TextArea());
        $this->assertInstanceOf('\CODE\Form\Elements\TextArea', new \CODE\Form\Elements\TextArea());
    }

    public function testVerificaSettersEGetters()
    {
        $element = new \CODE\Form\Elements\TextArea();
        $element->setName('input')
            ->setValue('Meu input')
            ->setAttributes(['id'=>'test', 'class'=>'myClass'])
        ;

        $this->assertEquals('input', $element->getName());
        $this->assertEquals('Meu input', $element->getValue());
        $this->assertEquals(['id'=>'test', 'class'=>'myClass'], $element->getAttributes());
    }

    public function testVerificaMetodoCreate()
    {
        $element = new \CODE\Form\Elements\TextArea();
        $element->setName('login')
            ->setValue('meu login')
        ;

        $this->assertEquals('<textarea name="login">meu login</textarea>', $element->create());
    }

} 