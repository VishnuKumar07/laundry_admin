<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $allServices = Service::all();
        return view('services.index',compact('allServices'));
    }
}
