<?php

if (!function_exists('image_url')) {
    function image_url($path, $with, $height) {
        return app(\App\Service\ImageUrlGenerator::class)->getImageUrl($path, $with, $height);
    }
}
