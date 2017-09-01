<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function profiles()
    {
 
        return response()->download(public_path('downloads/profiles_upload.xlsx'));

    }
}
