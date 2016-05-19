<?php

/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential settings.
require __DIR__.'/config_with_app.php';


// Create services and inject into the app.
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('RssController', function() use ($di) {
    $controller = new \petlid\RSSReader\RSSReaderController("http://www.historytoday.com/feed/rss.xml");
    $controller->setDI($di);
    return $controller;
});


// Standard route
$app->router->add('', function() use ($app) {

    $app->dispatcher->forward([
        'controller' => 'RSS',
        'action'     => 'view',
    ]);
});


// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();

?>
