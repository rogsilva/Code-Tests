<?php


namespace CODE\Form\Elements;


class Text extends AbstractElement
{

    public function __construct($name, $value = null)
    {
        parent::__construct("text", $name, $value);

    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }

} 