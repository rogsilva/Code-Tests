<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 13/11/14
 * Time: 19:57
 */

namespace CODE\Form\Elements;


class SelectTest extends \PHPUnit_Framework_TestCase
{
    /*
     *
     * Testes unitários
     *
     */
    public function testVerificaTipoDaClasse()
    {
        $this->assertInstanceOf('\CODE\Form\Elements\Interfaces\ElementInterface', new Select());
        $this->assertInstanceOf('\CODE\Form\Elements\Select', new Select());
    }

    public function testVerificaSettersEGetters()
    {
        $element = new Select();
        $element->setName('input')
            ->setOptions(['option 1'. 'option 2'])
            ->setAttributes(['id'=>'test', 'class'=>'myClass'])
        ;

        $this->assertEquals('input', $element->getName());
        $this->assertEquals(['option 1'. 'option 2'], $element->getOptions());
        $this->assertEquals(['id'=>'test', 'class'=>'myClass'], $element->getAttributes());
    }

    public function testVerificaMetodoCreate()
    {
        $element = new Select();
        $element->setName('select')
            ->setOptions([ '1' => 'option 1', '2' => 'option 2'])
        ;

        $select = '<select name="select"><option value="1">option 1</option><option value="2">option 2</option></select>';
        $this->assertEquals($select, $element->create());
    }
} 