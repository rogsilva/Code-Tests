<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaInterface()
    {
        $this->assertInstanceOf('CODE\Form\Interfaces\ValidatorInterface', new \CODE\Form\Validator\Validator());
    }


    public function testVerificaRetornoMetodoValidate()
    {

        $element = $this->getMockBuilder('\CODE\Form\Elements\Text')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $element->expects($this->any())
            ->method('getValue')
            ->willReturn('Lorem')
        ;



        $validator = new \CODE\Form\Validator\Validator();
        $validator->addRule(array(
            'element' => $element,
            'rules' => array(
                array(
                    'rule' => 'is_required'
                )
            )
        ));
        $this->assertTrue($validator->validate());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaRetornoExceptionMetodoValidate()
    {
        $validator = new \CODE\Form\Validator\Validator();
        $validator->validate();
    }

} 