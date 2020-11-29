<?php

namespace App\Service;

use League\Glide\Signatures\Signature;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Urls\UrlBuilder;
use League\Glide\Urls\UrlBuilderFactory;

class ImageUrlGenerator
{
    /**
     * @var UrlBuilder
     */
    private $urlBuilder;

    /**
     * @var Signature
     */
    private $signature;

    public function __construct(string $key)
    {
        $this->urlBuilder = UrlBuilderFactory::create('/images/', $key);
        $this->signature = SignatureFactory::create($key);
    }

    public function getImageUrl($path, $with, $height)
    {
        return $this->urlBuilder->getUrl($path, ['w' => $with, 'h' => $height]);
    }


    public function valideSignature($path, array $parameters)
    {
        return $this->signature->validateRequest($path, $parameters);
    }
}
