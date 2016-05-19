<?php

namespace petlid\RSSReader;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class RSSReaderController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


    private $RSSFeed;

    public function __construct($url = null)
    {
        $this->RSSFeed = new \SimplePie();

        $this->RSSFeed->set_feed_url($url);

        $this->RSSFeed->enable_cache(false);

		$this->RSSFeed->init();
		$this->RSSFeed->handle_content_type();
    }

    public function indexAction()
    {
        $rssPosts = $this->RSSFeed->get_items(0, 5);

        $this->views->addString("This is the index route of rssreader");

        $this->views->add('rssreader/feed', [
            'title' => 'Rss',
            'items' => $rssPosts
        ]);
    }


    public function setFeedUrl($url)
    {
        $this->RSSFeed->set_feed_url($url);
    }

    public function viewAction($noOfItems = 5)
    {
        $rssPosts = $this->RSSFeed->get_items(0, $noOfItems);

        $this->views->add('rssreader/feed', [
            'title' => 'Rss',
            'items' => $rssPosts
        ]);
    }

}
