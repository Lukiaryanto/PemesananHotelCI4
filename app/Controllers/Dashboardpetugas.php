<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
    public function index()
    {
        // tambahkan pemanggilan view dashboard admin
return view('Dashboard');
    }  
}
