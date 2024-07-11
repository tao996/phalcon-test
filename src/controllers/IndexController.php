<?php

class IndexController extends BaseController
{
    /**
     * http://localhost:8072
     * @return string
     */
    public function indexAction()
    {
        return '<h1>Hello Phalcon!</h1>';
    }

    /**
     * http://localhost:8072/index/test
     * @return string[]
     */
    public function testAction()
    {
        return [
            'name' => 'test'
        ];
    }
}