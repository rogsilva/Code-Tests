<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('CODE\Form\Elements\Interfaces\ElementsInterface', new \CODE\Form\Elements\Email('Teste'));
        $this->assertInstanceOf('CODE\Form\Elements\AbstractElement', new \CODE\Form\Elements\Email('teste'));
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaRetornoExceptionMetodoAdd()
    {
        $element1 = new \CODE\Form\Elements\Text('Teste');
        $element2 = new \CODE\Form\Elements\Email('teste');

        $element2->add($element1);
    }

} 