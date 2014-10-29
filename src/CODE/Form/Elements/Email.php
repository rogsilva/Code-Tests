<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/08/14
 * Time: 21:03
 */

namespace CODE\Form\Elements;


class Email extends AbstractElement
{
    public function __construct($name, $value = null)
    {
        parent::__construct("email", $name, $value);

    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }
} 