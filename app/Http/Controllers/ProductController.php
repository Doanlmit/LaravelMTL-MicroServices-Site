<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ProductController extends Controller
{
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
    public function __construct(ViewFactory $view, ProductRepositoryInterface $productRepository)
    {
        $this->view = $view;
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return $this->view->make('product.index')->with('products', $this->productRepository->getList());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return $this->view->make('product.show')->with('product', $this->productRepository->find($id));
    }
}
