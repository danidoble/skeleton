<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

use App\Config\Router;
use App\Controllers;

Router::add('/', [Controllers\TestingController::class, 'index'], 'index', 'GET');
Router::add('/test', [Controllers\TestingController::class, 'test'], 'test', ['GET','POST']);
