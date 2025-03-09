<?php

namespace Task\NotifyMeWhenAvailable\Repositories;

use App\Models\User;

class UserRepositories 
{
    public function __construct(protected User $model)
    {
        //
    }

    public function getUsers($ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }
}