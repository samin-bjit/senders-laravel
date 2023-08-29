<?php

namespace App\Helpers\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface PaginationHelperInterface
{

    /**
     * @param mixed $dataSet
     * @param mixed $perPage
     * @return void
     */
    public function paginate($dataSet, $perPage);
}
