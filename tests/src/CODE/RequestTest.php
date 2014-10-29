<?php

namespace CODE;

class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaTipoDaInterface()
    {
        $this->assertInstanceOf('CODE\Request\Interfaces\RequestInterface', new \CODE\Request\Request());
    }

} 