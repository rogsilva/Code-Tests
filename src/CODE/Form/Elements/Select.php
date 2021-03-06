<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 13/11/14
 * Time: 20:10
 */

namespace CODE\Form\Elements;

use \CODE\Form\Elements\Interfaces\ElementInterface;

class Select implements ElementInterface
{

    private $name;
    private $options = [];
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

    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }




    public function create()
    {
        $tag = "<select";

        if($this->getName() != null)
            $tag.=" name=\"{$this->getName()}\"";

        if(count($this->getAttributes()) > 0){
            foreach($this->getAttributes() as $attr => $value){
                $tag.=" {$attr}=\"{$value}\"";
            }
        }

        $tag.=">";

        foreach($this->getOptions() as $key => $value){
            $tag.="<option value=\"{$key}\">{$value}</option>";
        }

        $tag.="</select>";

        return $tag;
    }
} 