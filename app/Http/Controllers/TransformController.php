<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransformService;
use App\Models\Transform;
use App\Repositories\TransformRepository;

class TransformController extends Controller
{
    private $repository;
    public function __construct(TransformRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $history = $this->repository->getHistory();
        return view('welcome', [
            'history' => $history
        ]);
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
        $history = $this->repository->getHistory();
        return view('welcome', [
            'result' => $result,
            'text' => $text,
            'transforms' => $request->transforms,
            'history' => $history
        ]);

    }
}