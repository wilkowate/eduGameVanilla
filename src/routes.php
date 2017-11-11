<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
    
    $this->renderer->render ( $response, 'header.phtml', $args );
    $this->renderer->render ( $response, 'town.phtml', $args );
    return $this->renderer->render ( $response, 'footer.phtml', $args );
});
