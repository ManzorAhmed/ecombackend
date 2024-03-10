<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function all($title);
    public function create($title);

}

