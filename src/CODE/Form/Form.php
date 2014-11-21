<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 10/11/14
 * Time: 21:53
 */

namespace CODE\Form;

use \CODE\Form\Interfaces\FormInterface;
use \CODE\Form\Elements\Interfaces\ElementInterface;
use CODE\Validation\Interfaces\ValidationInterface;

class Form implements FormInterface
{
        private $action;
        private $method;
        private $attributes = [];

        private $elements = [];
        private $validator;

        public function __construct(ValidationInterface $validator)
        {
            $this->setValidator($validator);
        }

        public function setAction($action)
        {
            $this->action = $action;
            return $this;
        }

        public function getAction()
        {
            return $this->action;
        }

        public function setAttributes(array $attributes)
        {
            $this->attributes = $attributes;
            return $this;
        }

        public function getAttributes()
        {
            return $this->attributes;
        }

        public function setMethod($method)
        {
            $this->method = $method;
            return $this;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function getElements()
        {
            return $this->elements;
        }

        public function setValidator(ValidationInterface $validator)
        {
            $this->validator = $validator;
        }

        public function getValidator()
        {
            return $this->validator;
        }



        public function openTag()
        {
            $tag = "<form";

            if($this->getAction() != null)
                $tag.=" action=\"{$this->getAction()}\"";

            if($this->getMethod() != null)
                $tag.=" method=\"{$this->getMethod()}\"";

            if(count($this->getAttributes()) > 0){
                foreach($this->getAttributes() as $attr => $value){
                    $tag.=" {$attr}=\"{$value}\"";
                }
            }

            $tag.=">";

            return $tag;
        }

        public function closeTag()
        {
            return '</form>';
        }

        public function add(ElementInterface $element)
        {
            $this->elements[$element->getName()] = $element;
            return $this;
        }

        public function render()
        {
            $html = $this->openTag();

            foreach($this->getElements() as $element){
                $html.= $element->create();
            }

            $html.= $this->closeTag();

            return $html;
        }

        public function renderField($key)
        {
            return $this->elements[$key]->create();
        }

        public function populate(Array $dados)
        {
            foreach( $this->elements as $element){
                    if(array_key_exists($element->getName(), $dados))
                        $element->setValue($dados[$element->getName()]);
            }
        }
} 