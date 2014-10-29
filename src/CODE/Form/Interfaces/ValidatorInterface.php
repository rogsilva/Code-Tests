<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 02/09/14
 * Time: 22:20
 */

namespace CODE\Form\Interfaces;


interface ValidatorInterface {

    public function validate();
    public function addRule(Array $rule);
}