<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface extends RepositoryBaseInterface
{
    /**
     * @param $product
     * @return mixed|null
     */
    public function addToCart($product);

    /**
     * @return mixed|null
     */
    public function getCart();
}