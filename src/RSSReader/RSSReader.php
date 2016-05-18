<?php

namespace Pezze\RSSReader;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class RSSReader implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


    private $RSSFeed;

/*
    public function __construct($RSSFeed = null)
    {
        //$this->RSSFeed = new \SimplePie\SimplePie($RSSFeed);
        Echo "So far so good";
        exit();
    }*/

    public function sayHi()
    {
        echo "Hi";
        exit();
    }

}
