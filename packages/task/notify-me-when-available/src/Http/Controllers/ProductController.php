<?php

namespace Task\NotifyMeWhenAvailable\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Task\NotifyMeWhenAvailable\Http\Requests\ProductUpdateRequest;
use Task\NotifyMeWhenAvailable\Mail\NotifyUserMail;
use Task\NotifyMeWhenAvailable\Repositories\NotifyRepositories;
use Task\NotifyMeWhenAvailable\Repositories\ProductRepositories;
use Task\NotifyMeWhenAvailable\Repositories\UserRepositories;

class ProductController extends Controller
{
    public function __construct(
        protected UserRepositories $userRepositories,
        protected NotifyRepositories $notifyRepositories,
        protected ProductRepositories $productRepositories,
    ) {
        //
    }
    
    public function index()
    {
        $products = $this->productRepositories->all();

        return view('notify-me-when-available::product')->with('products', $products);
    }

    public function edit()
    {
        $products = $this->productRepositories->all();

        return view('notify-me-when-available::product_edit')->with('products', $products);
    }

    public function update(ProductUpdateRequest $request)
    {
        $this->productRepositories->update($request->validated());

        $notifies = $this->notifyRepositories->getNotifiesByProductId($request->product_id)->unique('user_id');
        $userIds = $notifies->pluck('user_id')->unique();

        $users = $this->userRepositories->getUsers($userIds);

        foreach ($users as $user) {
            Mail::to($user->email)->send(new NotifyUserMail($user));
        }

        return redirect()->route('product.edit');
    }
}
