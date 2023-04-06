<?php

namespace App\Http\Controllers\ImGPT;

use App\Http\Controllers\Controller;

use Inertia\Response;

class GptImageGenerationStore extends Controller
{
    public function __invoke(string $id = null): Response
    {
        return 1;
    }
}
