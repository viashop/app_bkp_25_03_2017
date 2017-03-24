<?php

namespace App\Http\Controllers\Tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\User;

class PdfviewController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $data['user'] = $this->user->all();
        return PDF::loadView('tests.pdf.dompdf', $data)
            ->stream();
    }
}
