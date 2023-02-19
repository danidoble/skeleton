<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

use Danidoble\SkeletonConfig\Config\Blade;
use Danidoble\SkeletonConfig\Config\Database;
use Danidoble\SkeletonConfig\Config\Router;
use Danidoble\SkeletonConfig\Config\StaticVar;
use Danidoble\SkeletonConfig\Exceptions\NotFoundFileConfigException;

const BASE_PATH = __DIR__; // base path

include_once "vendor/autoload.php"; // composer

StaticVar::$BASE_PATH = BASE_PATH;

DisplayErrors(true, BASE_PATH, 'dark'); // errors

throw_if(!existEnvFile(), NotFoundFileConfigException::class, 'The configuration file was not found'); // if .env not exist

// configuration
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

DisplayErrors(env('APP_DEBUG', false), BASE_PATH, 'dark'); // errors

// database
Database::default();
Database::boot();

Blade::makeFactory(BASE_PATH); // blade views

// routes
Router::Router();
include_once "routes/web.php";
Router::dispatch();