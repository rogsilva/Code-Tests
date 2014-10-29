<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/08/14
 * Time: 22:31
 */

namespace CODE\Form\Elements;


class Password extends AbstractElement
{
    public function __construct($name, $value = null)
    {
        parent::__construct("password", $name, $value);

    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }
} 