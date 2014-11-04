<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 29/10/14
 * Time: 22:38
 */

namespace CODE;


class FormTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaTipoDaInterface()
    {
        $validator = $this->getMock('CODE\Form\Validator\Validator');

        $this->assertInstanceOf('CODE\Form\Interfaces\FormInterface', new \CODE\Form\Form($validator));
    }

} 