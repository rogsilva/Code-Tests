<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/08/14
 * Time: 21:05
 */

namespace CODE\Form\Elements;


class Fieldset extends AbstractElement
{

    private $childs = [];
    private $legend;

    public function __construct($name, $legend)
    {
        parent::__construct(null , $name);
        $this->legend = $legend;
    }

    public function mount()
    {
        $tag = "<fieldset name=\"{$this->name}\">
                    <legend>{$this->legend}</legend>";
        if(count($this->childs) > 0){

            foreach($this->childs as $child){

                $tag.= $child->mount();

            }

        }
        $tag.="</fieldset>\n";

        return $tag;
    }

    public function add(AbstractElement $element){
        $this->childs[] = $element;
        return $this;
    }

    public function getChilds(){
        return $this->childs;
    }
} 