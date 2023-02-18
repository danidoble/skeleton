<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace App\Config;

use App\Controllers\Controller;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    /**
     * @var RouteCollection
     */
    static RouteCollection $routes;
    /**
     * @var UrlMatcher
     */
    static UrlMatcher $matcher;
    /**
     * @var Request
     */
    static Request $request;
    /**
     * @var RequestContext
     */
    static RequestContext $context;

    /**
     * @return void
     */
    public static function Router(): void
    {
        try {
            // Add Route object(s) to RouteCollection object
            self::$routes = new RouteCollection();

            self::$request = Request::createFromGlobals();

            // Init RequestContext object
            self::$context = new RequestContext();
            self::$context->fromRequest(Request::createFromGlobals());

            // Init UrlMatcher object
            self::$matcher = new UrlMatcher(self::$routes, self::$context);
        } catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $path
     * @param array $controller
     * @param string $name
     * @param string|array $methods
     * @return void
     */
    public static function add(string $path, array $controller, string $name, string|array $methods = ['GET']): void
    {
        Router::$routes->add($name, new Route($path, ['_controller' => [$controller[0], $controller[1]]], [], [], '', [], $methods));
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function dispatch(): void
    {
        $matcher = new UrlMatcher(self::$routes, self::$context);
        $response = new Response('.', 200);
        try {
            $parameters = $matcher->match(self::$context->getPathInfo());
            foreach ($parameters as $name => $parameter) {
                self::$request->attributes->set($name, $parameter);
            }
            $resolver = new ControllerResolver();
            $controller = $resolver->getController(self::$request);
            foreach ($parameters as $name => $parameter) {
                self::$request->attributes->remove($name);
            }

            $response = call_user_func_array($controller, Router::$request->attributes->all());
        } catch (ResourceNotFoundException) {
            $response = (new Controller())->httpError(404);
        } catch (MethodNotAllowedException) {
            $response = (new Controller())->httpError(405);
        } catch (Exception $e) {
            if (!env('APP_DEBUG', false)) {
                $response = (new Controller())->httpError(500);
            } else {
                throw new Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
            }
        }
        $response->send();
    }
}