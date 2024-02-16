<?php

namespace Acer\MvcoopVer2\Controllers\Admin;

use Acer\MvcoopVer2\Commons\Controller;

class DashboardController extends Controller
{
    
    public function index()
    {
        
        return $this->renderViewAdmin('dashboard');
    }
}