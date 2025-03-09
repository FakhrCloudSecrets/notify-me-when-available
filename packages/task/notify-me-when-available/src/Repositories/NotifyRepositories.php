<?php

namespace Task\NotifyMeWhenAvailable\Repositories;

use Task\NotifyMeWhenAvailable\Models\Notify;

class NotifyRepositories 
{
    public function __construct(protected Notify $model)
    {
        //
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function getNotifiesByProductId($product_id)
    {
        return $this->model->where('product_id', $product_id)->get();
    }
}