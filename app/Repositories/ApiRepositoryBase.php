<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

abstract class ApiRepositoryBase implements RepositoryBaseInterface
{
    /**
     * @var string
     */
    private $basePath;
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     * @param string $basePath
     */
    public function __construct(Client $client, $basePath)
    {
        $this->client = $client;
        $this->basePath = $basePath;
    }

    /**
     * @param $id
     * @return mixed|null
     */
    public function find($id)
    {
        return $this->get($id);
    }

    /**
     * @return Collection
     */
    public function getList()
    {
        return new Collection($this->get(''));
    }

    /**
     * @param $path
     * @param array $options
     * @return mixed|null
     */
    protected function get($path, array $options = [])
    {
        return $this->call($path, $options);
    }

    protected function post($path, array $options = [])
    {
        return $this->call($path, $options, 'post');
    }

    private function call($path, $options = [], $method = 'get')
    {
        $response = $this->client->$method($this->basePath . '/' . $path, $this->parseOptions($options));
        if($response->getStatusCode() == 200)
            return json_decode($response->getBody()->__toString())->data;
        return $this->parseError($response);
    }

    /**
     * @param array $options
     * @return array
     */
    private function parseOptions(array $options)
    {
        return $options;
    }

    /**
     * @param ResponseInterface $response
     * @return null
     */
    private function parseError(ResponseInterface $response)
    {
        return null;
    }
}