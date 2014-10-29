<?php

namespace CODE\Form\Interfaces;

use CODE\Form\Elements\AbstractElement;

interface FormInterface
{

    public function openTag();

    public function closeTag();

    public function add(AbstractElement $element);

    public function render();

    public function createField($name);

} 