<?php

namespace App\Http\Controllers\ImGPT;

use App\Http\Controllers\Controller;
use Inertia\Response;

class GptImageGenerationDelete extends Controller
{
    public function __invoke(string $id = null): Response
    {
        return 1;
    }
}
