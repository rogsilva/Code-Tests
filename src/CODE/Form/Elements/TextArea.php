<?php


namespace CODE\Form\Elements;


class TextArea extends AbstractElement
{
    public function __construct($name, $value = null)
    {
        parent::__construct(null, $name, $value);

    }

    public function mount()
    {
        $tag = "";
        if($this->label != null)
            $tag.= "<label>$this->label</label>\n";

        $tag.= "<textarea name=\"{$this->name}\"";
        if(count($this->attributes) > 0){

            foreach($this->attributes as $prop => $value){

                $tag.= " {$prop}=\"{$value}\"";

            }

        }
        $tag.="> {$this->value} </textarea>\n";

        return $tag;
    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }
} 