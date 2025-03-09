<?php

namespace Task\NotifyMeWhenAvailable\Repositories;

use Task\NotifyMeWhenAvailable\Models\Product;

class ProductRepositories 
{
    public function __construct(protected Product $model)
    {
        //
    }

    public function all()
    {
        return $this->model->get();
    }

    public function update($data)
    {
        return $this->model->where('id', $data['product_id'])->update([
            'price' => $data['price'],
            'quantity' => $data['quantity'],
        ]);
    }
}