<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class RadioTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('CODE\Form\Elements\Interfaces\ElementsInterface', new \CODE\Form\Elements\Radio('teste','Teste', 1));
        $this->assertInstanceOf('CODE\Form\Elements\AbstractElement', new \CODE\Form\Elements\Radio('teste','Teste', 1));
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaRetornoExceptionMetodoAdd()
    {
        $element1 = $this->getMockBuilder('\CODE\Form\Elements\Text')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $element2 = new \CODE\Form\Elements\Radio('teste','Teste', 1);

        $element2->add($element1);
    }

} 