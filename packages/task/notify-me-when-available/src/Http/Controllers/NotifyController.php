<?php

namespace Task\NotifyMeWhenAvailable\Http\Controllers;

use Illuminate\Routing\Controller;
use Task\NotifyMeWhenAvailable\Http\Requests\NotifyCreateRequest;
use Task\NotifyMeWhenAvailable\Repositories\NotifyRepositories;

class NotifyController extends Controller
{
    public function __construct(protected NotifyRepositories $notifyRepositories)
    {
        //
    }
    
    public function create(NotifyCreateRequest $request)
    {
        $products = $this->notifyRepositories->create([
            'product_id' => $request->product_id
        ]);

        return view('notify-me-when-available::product')->with('products', $products);
    }
}
