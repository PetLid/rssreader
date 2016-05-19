# rssreader

## Introduction
A small SimplePie wrapper-class designed for usage with the Anax/MVC framework, generates HTML for an RSS-feed.

By Petrus Lidholm | pelle@lidholm.se

## Installation
Since rssreader is designed for Anax/MVC framework and is dependant on it, it is required that you get the framework before following the steps below.
Anax/MVC is located at https://github.com/mosbth/Anax-MVC.git.

(**rssreader** also uses SimplePie however this is included in the package)

### Download
You can either download this repo as a .zip-file or you can use composer to get the package through packagist
by adding the following line in the composer.json located in the root:

`"require": { "petlid/rssreader": "dev-master" }`.

### Setup
To use **rssreader** you'll have to set it up as a controller in Anax/MVC,

```
$di->set('RssController', function() use ($di) {
    $controller = new \petlid\RSSReader\RSSReaderController(:url);
    $controller->setDI($di);
    return $controller;
});
```
**Important** replace `:url` with the url (in quotation marks) of the RSS-feed you'd like to display.

To view the RSS-feed you can add the route to the viewAction of RSSReaderController directly in the url like this:
`/rss/view/:noOfItems`,


or you can add a route to the viewAction like this:
```
$app->router->add('rss', function() use ($app) {
    $app->dispatcher->forward([
        'controller' => 'RSS',
        'action'     => 'view',
        'params'     => [
            'noOfItems' => :noOfItems
        ],
    ]);
});
```
the name of the added route is irrelevant.

**Notice** `:noOfItems` is the number of rss-articles you want in your feed. It is optional (and defaults to 5).

Lastly, copy the contents of `petlid\rssreader\view` into `Anax-MVC\app\view`.

### Optional
You can choose to get some basic styling of the RSS-feed by copying the catalog `petlid\rssreader\css` into `Anax-MVC\webroot` and
adding the stylesheet in the front controller from which you call the controller, `$app->theme->addStylesheet('css/rss.css');`