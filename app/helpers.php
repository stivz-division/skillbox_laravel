<?php

if (!function_exists('push_all')) {
    function push_all(?string $title = null, ?string $text = null)
    {
        $pushAll = app(\App\Services\PushAll::class);

        if (is_null($title) || is_null($text)) {
            return $pushAll;
        }

        return $pushAll->send($title, $text);
    }
}
