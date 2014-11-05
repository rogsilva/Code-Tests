<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 29/10/14
 * Time: 22:38
 */

namespace CODE;


class FormTest extends \PHPUnit_Framework_TestCase{

    private $validator;

    public function setUp(){
        $this->validator = new \CODE\Form\Validator\Validator();
    }

    public function tearDown(){
        $this->validator = null;
    }

    public function testVerificaTipoDaInterface()
    {
        $this->assertInstanceOf('CODE\Form\Interfaces\FormInterface', new \CODE\Form\Form($this->validator));
    }

} 