<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller 
 */
class HomeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $home = 'Welcome to Babylon Project';

        $this->set(compact('home'));
    }
}
