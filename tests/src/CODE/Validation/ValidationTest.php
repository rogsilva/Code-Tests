<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 20/11/14
 * Time: 19:41
 */

namespace CODE\Validation;


class ValidationTest extends \PHPUnit_Framework_TestCase
{
    /*
     *
     * Testes Unitários
     *
     */
    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('\CODE\Validation\Interfaces\ValidationInterface', new \CODE\Validation\Validation());
        $this->assertInstanceOf('\CODE\Validation\Validation', new \CODE\Validation\Validation());
    }

    public function testVerificaMetodoRequired()
    {
        $validator = new \CODE\Validation\Validation();

        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getValue')
            ->willReturn('teste');
        $element2 = $this->getMock('\CODE\Form\Elements\Input');
        $element2->method('getValue')
            ->willReturn('');

        $this->assertTrue($validator->required($element));
        $this->assertFalse($validator->required($element2));
    }

    public function testVerificaMetodoIsNumeric()
    {
        $validator = new \CODE\Validation\Validation();

        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getValue')
            ->willReturn(10);
        $element2 = $this->getMock('\CODE\Form\Elements\Input');
        $element2->method('getValue')
            ->willReturn('adasd');


        $this->assertTrue($validator->is_numeric($element));
        $this->assertFalse($validator->is_numeric($element2));
    }

    public function testVerificaMetodoMaxLength()
    {
        $validator = new \CODE\Validation\Validation();

        $element = $this->getMock('\CODE\Form\Elements\Input');
        $element->method('getValue')
            ->willReturn('teste');
        $element2 = $this->getMock('\CODE\Form\Elements\Input');
        $element2->method('getValue')
            ->willReturn('testando');

        $this->assertTrue($validator->max_length($element, ['max'=> 5]));
        $this->assertFalse($validator->max_length($element2, ['max'=> 5]));
    }

} 