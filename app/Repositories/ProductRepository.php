<?php
namespace App\Repositories;

use GuzzleHttp\Client;

class ProductRepository extends ApiRepositoryBase implements ProductRepositoryInterface
{
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, config('api.path.products') . 'products');
    }

}