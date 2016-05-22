<?php

namespace petlid\RSSReader;

/**
 * Class for testing RSSReaderController
 *
 */
 class RSSReaderControllerTester extends \PHPUnit_Framework_TestCase {

     private $url = "http://www.historytoday.com/feed/rss.xml";
     private $el;

     public function setUp()
     {
         $this->el = new \petlid\RSSReader\RSSReaderController($this->url);
         $di = new \Anax\DI\CDIFactoryDefault();
         $this->el->setDI($di);
     }

     public function testConstructor()
     {
        $this->assertInstanceOf('\petlid\RSSReader\RSSReaderController', $this->el, 'Failed to instansiate class');
     }
 }
