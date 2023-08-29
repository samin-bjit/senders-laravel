<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Helpers\Interfaces\PaginationHelperInterface;

class PaginationHelper implements PaginationHelperInterface
{
    
    /**
     * @param mixed $dataSet
     * @param mixed $perPage
     * 
     * @return parination
     */
    public function paginate($dataSet, $perPage)
    {
        
        $items = array_reverse(array_sort($dataSet, function ($value) {
            return $value;
        }));

        $currentPage    =   LengthAwarePaginator::resolveCurrentPage();
        $currentItems   =   array_slice($items, $perPage * ($currentPage - 1), $perPage);
        $paginator      =   new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage, ['path' => 'users']);
        $results        =   $paginator->appends('filter', request('filter'));
        
        return  $results;
    }
}
