<?php

namespace CODE\Form;

use CODE\Form\Elements\AbstractElement;
use CODE\Form\Interfaces\FormInterface;

use CODE\Form\Interfaces\ValidatorInterface;

class Form implements FormInterface
{
    private $attributes;
    private $elements = [];
    private $validator;

    public function __construct(ValidatorInterface $validator, $attributes = array())
    {
        $this->attributes = $attributes;
        $this->validator = $validator;
    }

    public function openTag()
    {
        $tag = "<form";

        if(count($this->attributes) > 0){

            foreach($this->attributes as $prop => $value){

                $tag.= " {$prop}=\"{$value}\"";

            }

        }
        $tag.=">\n";

        return $tag;
    }

    public function closeTag()
    {
        return "</form>\n";
    }

    public function add(AbstractElement $element)
    {
        $this->elements[$element->getName()] = $element;
    }

    public function render()
    {
        if(count($this->elements > 0)){
            $elementList = "";
            foreach($this->elements as $element){
                $elementList.= $element->mount();
            }
            return $elementList;
        }

        return false;
    }


    public function createField($name)
    {
        return $this->elements[$name]->mount();
    }


    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $elements
     */
    public function setElements(array $elements)
    {
        $this->elements = $elements;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getElements()
    {
        return $this->elements;
    }


    public function populate(Array $dados)
    {
        foreach( $this->elements as $element){
            //var_dump($element);
            if( method_exists( $element , 'getChilds' ) && count($element->getChilds() > 0)){
                foreach($element->getChilds() as $child){
                    if(array_key_exists($child->getName(), $dados))
                        $child->setValue($dados[$child->getName()]);
                }
            }else{
                if(array_key_exists($element->getName(), $dados))
                    $element->setValue($dados[$element->getName()]);
            }
        }
    }

    /**
     * @param \CODE\Form\Interfaces\ValidatorInterface $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return \CODE\Form\Interfaces\ValidatorInterface
     */
    public function getValidator()
    {
        return $this->validator;
    }


}