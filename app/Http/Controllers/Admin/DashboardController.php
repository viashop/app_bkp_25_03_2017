<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Artesaos\SEOTools\Facades\SEOMeta;

class DashboardController extends Controller
{

    public function dashboard()
    {

        SEOMeta::setTitle('Admin');

        return view('admin.dashboard');
    }

}