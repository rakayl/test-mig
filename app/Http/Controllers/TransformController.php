<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransformService;

class TransformController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function process(Request $request, TransformService $service)
    {

        $request->validate([
            'transforms' => 'required|string',
            'text' => 'required|string'
        ]);

        $transforms = array_map('trim', explode(',', $request->transforms));

        $text = strtolower($request->text);

        $result = $service->transform($transforms, $text);

        return view('welcome', [
            'result' => $result,
            'text' => $text,
            'transforms' => $request->transforms
        ]);
    }
}