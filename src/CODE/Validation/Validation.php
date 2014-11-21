<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 20/11/14
 * Time: 19:47
 */

namespace CODE\Validation;

use \CODE\Validation\Interfaces\ValidationInterface;
use \CODE\Form\Elements\Interfaces\ElementInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class Validation implements ValidationInterface
{

    private $messages = [];
    private $rules = [];
    private $is_valid = true;

    public function validate()
    {
        foreach($this->rules as $arrayRules){
            $element = $arrayRules['element'];
            $rules = $arrayRules['rules'];
            foreach($rules as $rule){
                if(isset($rule['params'])){
                    if($this->$rule['rule']($element, $rule['params']) == false)
                        $this->is_valid = false;
                }else{
                    if($this->$rule['rule']($element) == false)
                        $this->is_valid = false;
                }
            }
        }

        return $this->is_valid();
    }

    public function is_valid()
    {
        return $this->is_valid;
    }

    public function validation_messages($openTag = '<li>', $closeTag = '</li>')
    {
        if(count($this->messages) == 0)
            return null;

        $listMessages = "";
        foreach($this->messages as $message){
            $listMessages.= $openTag . $message . $closeTag;
        }

        return $listMessages;
    }

    public function required(ElementInterface $element)
    {
        if($element->getValue() != null)
            return true;

        $this->setMessages("O campo {$element->getName()} é obrigatório");
        return false;
    }

    public function is_numeric(ElementInterface $element)
    {
        if(is_numeric($element->getValue()))
            return true;

        $this->setMessages("O campo {$element->getName()} deve ser numérico");
        return false;
    }

    public function max_length(ElementInterface $element, array $params)
    {
        if(strlen($element->getValue()) <= $params['max'])
            return true;

        $this->setMessages("O campo {$element->getName()} não deve ultrapassar de {$params['max']} caracteres");
        return false;
    }

    public function setMessages($messages)
    {
        $this->messages[] = $messages;
    }

    public function getMessages()
    {
        return $this->messages;
    }


    public function setRules(array $rules)
    {

        $this->rules[] = $rules;

    }

    public function getRules()
    {
        return $this->rules;
    }


}