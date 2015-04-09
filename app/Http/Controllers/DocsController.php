<?php namespace App\Http\Controllers;

class DocsController extends Controller {

    public function index($version)
    {
        d($version);
    }

    public function show($version, $component)
    {
        d($version, $component);
    }
}