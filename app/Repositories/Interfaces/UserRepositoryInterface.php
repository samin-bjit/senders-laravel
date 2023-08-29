<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * @return getModelInstance
     */

    public function getModelInstance();
    /**
     * @param array $dataArray
     * @return getAllUser
     */
    public function getAllUser(array $dataArray);
}
