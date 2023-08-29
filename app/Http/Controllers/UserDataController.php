<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Interfaces\PaginationHelperInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserDataController extends Controller
{
    /** @var \App\Repositories\Interfaces\UserRepositoryInterface $userRepository */
    protected $userRepository;

    /** @var \App\Helpers\Interfaces\PaginationHelperInterface $paginationHelper */
    protected $paginationHelper;

    public function __construct(UserRepositoryInterface $userRepository, PaginationHelperInterface $paginationHelper)
    {
        $this->userRepository   =   $userRepository;
        $this->paginationHelper =   $paginationHelper;
    }

    /**
     * @param Request $request
     * 
     * @return view
     */
    public function index(Request $request)
    {
        $birthYear      =   $request->get('birth_year');
        $birthMonth     =   $request->get('birth_month');

        $filterArray = [
            'birth_year'    =>  $birthYear,
            'birth_month'   =>  $birthMonth,
        ];
        $userData = $this->userRepository->getAllUser($filterArray);

        return view('user.index', [
            'userData'      =>  $this->paginationHelper->paginate($userData, 20),
            'birth_year'    =>  $birthYear,
            'birth_month'   =>  $birthMonth,
        ]);
    }
}
