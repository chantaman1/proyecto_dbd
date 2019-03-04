<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdministrationController extends Controller
{
    public function index()
    {
      return view('Administration/admMain0');
    }

}
