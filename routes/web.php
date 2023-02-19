<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

use Danidoble\SkeletonConfig\Config\Router;

Router::add('/', [\Danidoble\SkeletonConfig\Controllers\TestingController::class, 'index'], 'index', 'GET');
Router::add('/test', [\Danidoble\SkeletonConfig\Controllers\TestingController::class, 'test'], 'test', ['GET','POST']);
