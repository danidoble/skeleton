<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

use App\Config\Blade;
use App\Config\Router;
use Spatie\Ignition\Ignition;

include_once "vendor/autoload.php";

Ignition::make()->register();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

Blade::makeFactory(__DIR__);
Router::Router();

include_once "routes/web.php";

Router::dispatch();