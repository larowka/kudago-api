<?php

namespace Larowka\KudaGo\Tests;

use GuzzleHttp\Psr7\Response;

class ResponseFactory
{
    private static string $dir = __DIR__ . '/_json/';

    public static function get(string $method, int $status = 200): Response
    {
        $body = self::json($method, false);
        return self::factory($body, $status);
    }

    public static function json(string $file, bool $decode = true)
    {
        $path = static::$dir . $file . '.json';
        $data = '';

        if (file_exists($path)) {
            $data = file_get_contents($path);
        }

        if ($decode) {
            return static::decode($data);
        }

        return $data;
    }

    private static function decode(string $json): array
    {
        return json_decode($json, true);
    }

    private static function factory(string $body, int $status = 200): Response
    {
        return new Response($status, ['Accept' => 'application/json'], $body);
    }
}
