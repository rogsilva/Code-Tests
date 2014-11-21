<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 12/11/14
 * Time: 23:07
 */

namespace CODE\Form\Elements;

use \CODE\Form\Elements\Interfaces\ElementInterface;

class TextArea implements ElementInterface
{

    private $name;
    private $value;
    private $attributes = [];

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }



    public function create()
    {
        $tag = "<textarea";

        if($this->getName() != null)
            $tag.=" name=\"{$this->getName()}\"";

        if(count($this->getAttributes()) > 0){
            foreach($this->getAttributes() as $attr => $value){
                $tag.=" {$attr}=\"{$value}\"";
            }
        }

        $tag.=">";

        if($this->getValue() != null)
            $tag.="{$this->getValue()}";

        $tag.="</textarea>";

        return $tag;
    }
} 