<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class HiddenTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('CODE\Form\Elements\Interfaces\ElementsInterface', new \CODE\Form\Elements\Hidden('teste'));
        $this->assertInstanceOf('CODE\Form\Elements\AbstractElement', new \CODE\Form\Elements\Hidden('teste'));
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
        $element2 = new \CODE\Form\Elements\Hidden('teste');

        $element2->add($element1);
    }

} 