<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 20/11/14
 * Time: 19:46
 */

namespace CODE\Validation\Interfaces;

use \CODE\Form\Elements\Interfaces\ElementInterface;

interface ValidationInterface
{
    public function validate();
    public function required(ElementInterface $element);
    public function is_numeric(ElementInterface $element);
    public function max_length(ElementInterface $element, array $params);
}