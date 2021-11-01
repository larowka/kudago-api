<?php

namespace Larowka\KudaGo;

use GuzzleHttp\Client;
use Larowka\KudaGo\Methods\{
    Movies,
    MovieShowings,
    Places,
    Showings
};

/**
 * Entrypoint for API Wrapper
 *
 * @package Larowka\KudaGo
 */
class Api
{
    private const BASE_URI = 'https://kudago.com/public-api';
    private const API_VERSION = 'v1.4';

    private Client $client;

    public function __construct()
    {
        $this->client = $this->getClient();
    }

    public function movies(): Movies
    {
        return new Movies($this->client);
    }

    public function places(): Places
    {
        return new Places($this->client);
    }

    public function showings(): Showings
    {
        return new Showings($this->client);
    }

    public function movieShowings(int $movieId): MovieShowings
    {
        return new MovieShowings($this->client, $movieId);
    }

    private function getClient(): Client
    {
        $config = [
            'headers' => ['Accept' => 'application/json'],
            'base_uri' => self::BASE_URI . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR,
        ];
        return new Client($config);
    }
}
