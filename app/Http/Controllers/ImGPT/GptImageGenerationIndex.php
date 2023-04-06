<?php

namespace App\Http\Controllers\ImGPT;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class GptImageGenerationIndex extends Controller
{
    public function __invoke(string $id = null): Response
    {
        return Inertia::render('ImageGPT/Index', [

        ]);
    }
}
