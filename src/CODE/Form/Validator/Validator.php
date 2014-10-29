<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 01/09/14
 * Time: 20:41
 */

namespace CODE\Form\Validator;

use CODE\Form\Elements\Interfaces\ElementsInterface;
use CODE\Form\Interfaces\ValidatorInterface;


class Validator implements ValidatorInterface
{

    private $rules = [];
    private $messages = [];

    public function validate()
    {
        if(count($this->rules) == 0)
            throw new \InvalidArgumentException('Nenhuma regra de validação foi recebida');

        foreach($this->rules as $arrayRules){
            $element = $arrayRules['element'];
            $rules = $arrayRules['rules'];

            foreach($rules as $rule){
                if(isset($rule['params']))
                    $this->$rule['rule']($element, $rule['params']);
                else
                    $this->$rule['rule']($element);
            }

        }
    }

    public function addRule(Array $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @return array
     */
    public function getMessages($openTag = '<li>', $closeTag = '</li>')
    {
        if(count($this->messages) == 0)
            return null;

        $listMessages = "";
        foreach($this->messages as $message){
            $listMessages.= $openTag . $message . $closeTag;
        }

        return $listMessages;
    }

    protected function is_required(ElementsInterface $target)
    {
        if($target->getValue() != '')
            return true;

        $this->messages[] = "O Campo {$target->getLabel()} é obrigatório!";
        return false;
    }

    protected function is_numeric(ElementsInterface $target)
    {
        if(is_numeric($target->getValue()))
            return true;

        $this->messages[] = "O Campo {$target->getLabel()} deve ser numérico!";
        return false;
    }

    protected function max_length(ElementsInterface $target, $params)
    {
        if(strlen($target->getValue()) <= $params['max'])
            return true;

        $this->messages[] = "O Campo {$target->getLabel()} deve ter no máximo {$params['max']} caracteres!";
        return false;
    }





} 