<?php

namespace Task\NotifyMeWhenAvailable\Http\Controllers;

use Illuminate\Routing\Controller;
use Task\NotifyMeWhenAvailable\Repositories\ProductRepositories;

class ProductController extends Controller
{
    public function __construct(protected ProductRepositories $productRepositories)
    {
        //
    }
    
    public function index()
    {
        $products = $this->productRepositories->all();

        return view('notify-me-when-available::product')->with('products', $products);
    }
}
