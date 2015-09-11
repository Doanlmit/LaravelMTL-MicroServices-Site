<?php
namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class OrderRepository extends ApiRepositoryBase implements OrderRepositoryInterface
{
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client, config('api.path.orders') . 'orders');
    }

    /**
     * @param $product
     * @return mixed|null
     */
    public function addToCart($product)
    {
        return $this->post('cart/add', [
            'form_params' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
            ]
        ]);
    }

    /**
     * @return mixed|null
     */
    public function getCart()
    {
        return $this->get('cart');
    }

}