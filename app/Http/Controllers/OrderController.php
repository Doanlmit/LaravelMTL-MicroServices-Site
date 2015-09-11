<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Contracts\View\Factory as ViewFactory;

class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ViewFactory view factory
     */
    protected $view;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ViewFactory $view,
                                OrderRepositoryInterface $orderRepository,
                                ProductRepositoryInterface $productRepository)
    {
        $this->view = $view;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function viewCart()
    {
        return view('cart.index')->with('items', $this->orderRepository->getCart());
    }

    public function addToCart($id)
    {
        $product = $this->productRepository->find($id);

        $cartItem = $this->orderRepository->addToCart($product);

        Session::flash('cart-status', $cartItem->name . ' was added to cart');

        return redirect()->back();
    }
}
