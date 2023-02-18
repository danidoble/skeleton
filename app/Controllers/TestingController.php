<?php

namespace App\Controllers;

use App\Config\Blade;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestingController extends Controller
{
    /**
     * @Route('/')
     * @return Response
     */
    public function index(): Response
    {
        return view('test', ['name'=> 'danidoble','view_name'=>'Index']);
    }
    /**
     * @Route('/test')
     * @return Response
     */
    public function test(): Response
    {
        return view('test', ['name'=> 'danidoble','view_name'=>'Test']);
    }
}