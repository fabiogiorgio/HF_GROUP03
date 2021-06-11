<?php

/**
 * Class Home
 */
class Home extends Controller
{
    function execute()
    {
        $this->view('index', ['page' => 'home']);
    }
}