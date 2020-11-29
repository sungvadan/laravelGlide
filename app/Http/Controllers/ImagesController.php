<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function index()
    {
        return Storage::download('/storage/racoon.png');
    }
}
