<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @return userInstance
     */
    public function getModelInstance()
    {
        return new User();
    }

    /**
     * @param mixed $filterArray
     * 
     * @return $results
     */
    
    public function getAllUser($filterArray)
    {
        $query = $this->getModelInstance()->query();

        if (isset($filterArray['birth_year'])) {
            $query->whereYear('birthday', $filterArray['birth_year']);
        }
        if (isset($filterArray['birth_month'])) {
            $query->whereMonth('birthday', $filterArray['birth_month']);
        }

        $cachedBirthYear    =   Redis::get('birth_year');
        $cachedBirthMonth   =   Redis::get('birth_month');

        if ($cachedBirthYear != $filterArray['birth_year'] || $cachedBirthMonth != $filterArray['birth_month']) {
            Redis::flushDB();
        }
        if (!Redis::get('users')) {
            Redis::set('birth_year', $filterArray['birth_year'], 'EX', 60);
            Redis::set('birth_month', $filterArray['birth_month'], 'EX', 60);
            Redis::set('users', $query->get(), 'EX', 60);
            return $query->get();
        }
        $users      =   Redis::get('users');
        $results    =   json_decode($users, FALSE);

        return $results;
    }
}
