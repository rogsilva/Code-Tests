<?php

namespace CODE\Form\Interfaces;
use \CODE\Form\Elements\Interfaces\ElementInterface;

interface FormInterface
{
        public function openTag();
        public function closeTag();
        public function render();
        public function add(ElementInterface $element);
}