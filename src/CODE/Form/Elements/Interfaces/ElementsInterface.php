<?php

namespace CODE\Form\Elements\Interfaces;


interface ElementsInterface
{
    public function setAttributes(array $array);

    public function setLabel($label);

    public function getValue();

    public function getLabel();

}