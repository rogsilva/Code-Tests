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

    private $aux;

    public function setUp(){
        $this->aux = new \CODE\Form\Elements\Text('teste', 'teste');
    }

    public function tearDown(){
        $this->aux = null;
    }

    public function testVerificaTipoDaInterface()
    {
        $this->assertInstanceOf('CODE\Form\Interfaces\ValidatorInterface', new \CODE\Form\Validator\Validator());
    }


    public function testVerificaRetornoMetodoValidate()
    {

        $validator = new \CODE\Form\Validator\Validator();
        $validator->addRule(array(
            'element' => $this->aux,
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