<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 28/10/14
 * Time: 20:36
 */

namespace CODE;


class CheckboxTest extends \PHPUnit_Framework_TestCase
{

    private $aux;

    public function setUp(){
        $this->aux = new \CODE\Form\Elements\Text('teste');
    }

    public function tearDown(){
        $this->aux = null;
    }

    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('CODE\Form\Elements\Interfaces\ElementsInterface', new \CODE\Form\Elements\Checkbox('teste','Teste', 1));
        $this->assertInstanceOf('CODE\Form\Elements\AbstractElement', new \CODE\Form\Elements\Checkbox('teste','Teste', 1));
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaRetornoExceptionMetodoAdd()
    {
        $element2 = new \CODE\Form\Elements\Checkbox('teste','Teste', 1);
        $element2->add($this->aux);
    }


} 