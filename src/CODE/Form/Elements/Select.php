<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/08/14
 * Time: 23:36
 */

namespace CODE\Form\Elements;


class Select extends AbstractElement
{
    private $options;

    public function __construct($name, array $options)
    {
        parent::__construct(null, $name);
        $this->options = $options;

    }

    public function mount()
    {
        $tag = "";
        if($this->label != null)
            $tag.= "<label>$this->label</label>\n";

        $tag.= "<select name=\"{$this->name}\"";
        if(count($this->attributes) > 0){

            foreach($this->attributes as $prop => $value){

                $tag.= " {$prop}=\"{$value}\"";

            }

        }

        $options = "";
        if(count($this->options > 0)){
            foreach($this->options as $val => $cont){
                $options.="\t<option value=\"{$val}\">{$cont}</option>\n";
            }
        }

        $tag.=">\n {$options} </select>\n";

        return $tag;
    }

    public function add(AbstractElement $element){
        throw new \InvalidArgumentException('Não é possível adicionar elementos neste tipo de elemento!');
    }
} 