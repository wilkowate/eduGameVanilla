<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
    
    $this->renderer->render ( $response, 'header.phtml', $args );
    $this->renderer->render ( $response, 'town.phtml', $args );
    return $this->renderer->render ( $response, 'footer.phtml', $args );
});

	$app->add(function ($req, $res, $next) {
		$response = $next($req, $res);
		return $response
		->withHeader('Access-Control-Allow-Origin', '*')
		->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	});

	$app->get('/world', function (Request $request, Response $response, array $args) {
		// Sample log message
		$this->logger->info("Slim-Skeleton '/' route");
	
		// Render index view
		//return $this->renderer->render($response, 'index.phtml', $args);
	
		$this->renderer->render ( $response, 'header.phtml', $args );
		$this->renderer->render ( $response, 'world.phtml', $args );
		return $this->renderer->render ( $response, 'footer.phtml', $args );
	});

$app->get('/json', function (Request $request, Response $response, array $args) {
	$response->withHeader('Content-Type', 'application/json');
		
	$response->withHeader('Access-Control-Allow-Origin', '*');
	//$response->withHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
	//$response->withHeader('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
		
	$response->write(json_encode(
		array(
			"type"=>"FeatureCollection",
			"crs"=> array(
				"type"=>  "name",
				"properties" => array(
				"name"=> "EPSG:3857"
				)
			),
			"features"=> array(
		
			array(
				"type" => "Feature",
				"properties"=> array("name" => "asdasd","id" => "412"),
				"geometry" => array(
					"type"=> "Polygon",    
					"coordinates" => [[[-5e6, -1e6], [-4e6, 1e6], [-3e6, -1e6]]]
				)
			)	, array(
				"type" => "Feature",
				"properties"=> array("name" => "asdasd","id" => "123"),
				"geometry" => array("type"=> "LineString",    "coordinates" => [[4e6, -2e6], [8e6, 2e6]])
				)
			)
		)
	));
});

$app->get('/tree', function (Request $request, Response $response, array $args) {
	return $this->renderer->render ( $response, 'tree.phtml', $args );
});
	
$app->get('/n[{name}]', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/' route");
	$this->renderer->render ( $response, 'header.phtml', $args );
	$this->renderer->render ( $response, 'town.phtml', $args );
	return $this->renderer->render ( $response, 'footer.phtml', $args );
});