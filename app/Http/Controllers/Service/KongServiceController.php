<?php

namespace App\Http\Controllers\Service;

use DouglasDC3\Kong\Kong;
use Illuminate\Http\Request;
use DouglasDC3\Kong\Model\Consumer;
use App\Http\Controllers\Controller;
use DouglasDC3\Kong\Http\HttpClient;

class KongServiceController extends Controller
{
    public function index()
    {
        $kong = new Kong(new HttpClient('http://localhost:8001'));
        $consumer = new Consumer(['username' => 'muhamadzain.dev', 'custom_id' => 123]);
        $kong->consumers()->create($consumer)->acl()->create('admin');
        return response()->json(['success' => true, 'message' => 'user kong service created'], 200);
    }
}
