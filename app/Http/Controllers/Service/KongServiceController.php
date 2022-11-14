<?php

namespace App\Http\Controllers\Service;

use DouglasDC3\Kong\Kong;
use Illuminate\Http\Request;
use DouglasDC3\Kong\Model\Consumer;
use App\Http\Controllers\Controller;
use DouglasDC3\Kong\Http\HttpClient;
use Illuminate\Support\Facades\Http;

class KongServiceController extends Controller
{
    public function index()
    {
        $kong =  Http::get('http://localhost:8001');
        return response()->json($kong, 200);
    }

    public function check_conncetion()
    {
        $kong = new Kong(new HttpClient('http://localhost:8001'));
        $consumer = new Consumer(['username' => 'muhamadzain.dev', 'custom_id' => 123]);
        $kong->consumers()->create($consumer)->acl()->create('admin');
        return response()->json(['success' => true, 'message' => 'user kong service created'], 200);
    }
}
