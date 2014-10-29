<?php

namespace CODE\Form\Elements;

use CODE\Form\Elements\Interfaces\ElementsInterface;

abstract class AbstractElement implements ElementsInterface
{

    protected $attributes;
    protected $type;
    protected $name;
    protected $value;
    protected $label;


    public function __construct($type, $name, $value = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
    }


    public function mount()
    {
        $tag = "";
        if($this->label != null)
            $tag.= "<label>$this->label</label>\n";

        $tag.= "<input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\"";
        if(count($this->attributes) > 0){

            foreach($this->attributes as $prop => $value){

                $tag.= " {$prop}=\"{$value}\"";

            }

        }
        $tag.=">\n";
        return $tag;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param mixed $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }



    abstract public function add(AbstractElement $element);

} 