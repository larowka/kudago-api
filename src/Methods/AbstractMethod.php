<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;
use Larowka\KudaGo\CollectionFactory;

abstract class AbstractMethod
{
    protected string $base = '';
    protected string $resource;
    protected array $params = [];
    protected array $fields = [];

    private Client $client;

    abstract protected function config(): void;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->base = strtolower(substr(strrchr(get_class($this), '\\'), 1));
        $this->config();
    }

    public function get(): Collection
    {
        try {
            $data = $this->response()['results'];
        } catch (GuzzleException $e) {
            $data = [];
        }

        return CollectionFactory::make($data, $this->resource);
    }

    public function fields(array $fields = []): self
    {
        $this->params['fields'] = empty($fields) ?
            implode(',', array_keys($this->fields)) :
            static::arrayToString($fields);

        return $this;
    }

    /**
     * @param mixed $id
     */
    public function find($id)
    {
        $this->base .= DIRECTORY_SEPARATOR . $id;
        $this->params = array_intersect_key($this->params, array_flip(['fields', 'expand']));
    }

    public function dump(): string
    {
        return $this->base . '?' . http_build_query($this->params);
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    protected function response(): array
    {
        return static::decodeContent($this->client->get($this->base, ['query' => $this->params]));
    }

    protected static function arrayToString(array $arr): string
    {
        return implode(',', array_map('trim', $arr));
    }

    private static function decodeContent(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
