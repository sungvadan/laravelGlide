<?php

namespace App\Http\Controllers;

use App\Service\ImageUrlGenerator;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class ImagesController extends Controller
{
    public function index(Request $request, Filesystem $filesystem, string $path, ImageUrlGenerator $imageUrlGenerator)
    {
        $imageUrlGenerator->valideSignature($path, $request->all());
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->path('public'),
            'cache' => $filesystem->path('public') ,
            'cache_path_prefix' => '.cache',
            'base_url' => '',
        ]);

        return $server->getImageResponse($path, $request->all());
    }
}
