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
}