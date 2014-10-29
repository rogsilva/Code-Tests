<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/08/14
 * Time: 21:04
 */

namespace CODE\Form\Elements;


class Checkbox extends AbstractElement
{
    public function __construct($name, $title, $value)
    {
        parent::__construct('checkbox', $name, $value);
        $this->title = $title;

    }

    public function mount()
    {
        $tag = "";
        if($this->label != null)
            $tag.= "<label>$this->label</label>\n";

        $tag.= "<span>{$this->title} <input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\"";
        if(count($this->attributes) > 0){

            foreach($this->attributes as $prop => $value){

                $tag.= " {$prop}=\"{$value}\"";

            }

        }
        $tag.="></span>\n";

        return $tag;
    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }
} 