<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class FieldsetTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('CODE\Form\Elements\Interfaces\ElementsInterface', new \CODE\Form\Elements\Fieldset('Teste', 'Teste'));
        $this->assertInstanceOf('CODE\Form\Elements\AbstractElement', new \CODE\Form\Elements\Fieldset('teste', 'Teste'));
    }



} 