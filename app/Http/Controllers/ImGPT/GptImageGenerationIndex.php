<?php

namespace App\Http\Controllers\ImGPT;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class GptImageGenerationIndex extends Controller
{
    public function __invoke(string $id = null): Response
    {
        return Inertia::render('ImageGPT/Index', [
            'img_chat' => fn () => $id ? Image::findOrFail($id) : null,
            'images' => Image::latest()->where('user_id', Auth::id())->get()
        ]);
    }
}
