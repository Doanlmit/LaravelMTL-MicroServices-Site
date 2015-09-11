<?php

namespace App\Repositories;

interface RepositoryBaseInterface
{
    public function find($id);
    public function getList();
}