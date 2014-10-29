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


    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaRetornoExceptionMetodoValidate()
    {
        $validator = new \CODE\Form\Validator\Validator();
        $validator->validate();
    }

} 