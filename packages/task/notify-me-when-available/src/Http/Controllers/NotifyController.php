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
        $this->notifyRepositories->create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id
        ]);

        return redirect()->route('product.index');
    }
}
