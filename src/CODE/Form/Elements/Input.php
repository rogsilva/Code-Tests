<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 11/11/14
 * Time: 21:45
 */

namespace CODE\Form\Elements;

use \CODE\Form\Elements\Interfaces\ElementInterface;

class Input implements ElementInterface
{

    private $type;
    private $name;
    private $value;
    private $attributes = [];


    public function setAttributes(array $attributes)
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

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
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
        $tag = "<input";

        if($this->getType() != null)
            $tag.=" type=\"{$this->getType()}\"";

        if($this->getName() != null)
            $tag.=" name=\"{$this->getName()}\"";

        if($this->getValue() != null)
            $tag.=" value=\"{$this->getValue()}\"";

        if(count($this->getAttributes()) > 0){
            foreach($this->getAttributes() as $attr => $value){
                $tag.=" {$attr}=\"{$value}\"";
            }
        }

        $tag.=">";

        return $tag;
    }
} 