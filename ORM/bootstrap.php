<?php
	require_once  dirname(__FILE__, 3) . "/vendor/autoload.php";
	use Doctrine\ORM\Tools\Setup;
	use Doctrine\ORM\EntityManager;

	$paths = array("./src");
	$isDevMode = true;
	
	$dbParams = array (
	'driver' => 'pdo_mysql',
	'user' => 'diego',
	'password' => 'diego123',
	'dbname' => 'doctrine',
	'host' => 'localhost',
	);

	$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
	$entityManager = EntityManager::create($dbParams, $config);
