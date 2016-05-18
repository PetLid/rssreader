<?php

/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential settings.
require __DIR__.'/config.php';


// Create services and inject into the app.
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('RSSReader', function() use ($di) {
    $reader = new Pezze\RSSReader();
    $reader->setDI($di);
    return $reader;
});

$app = new \Anax\Kernel\CAnax($di);



// Home route
$app->router->add('', function() use ($app) {

    echo "Yo!";
});


// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();

?>

<!doctype html>
<html lang="en">

<head>
<meta charset=utf8>
<title>Rssfeed example</title>
</head>

<body>
<p>Ey!</p>
</body>
</html>
