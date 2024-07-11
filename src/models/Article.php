<?php

class Article extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->setSource('demo_article');
    }

    public $id = 0;
    public $user_id = 0;
    public $title = '';
}