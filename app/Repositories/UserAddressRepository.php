<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\IUserAddress;
use App\UserAddress;

class UserAddressRepository implements IUserAddress
{
    protected $userAddress;

    public function __construct(UserAddress $userAddress)
    {
        $this->UserAddress = $userAddress;
    }

    public function criarOuAtualizar(string $street, string $number, string $neighborhood, string $city, string $state, string $userId)
    {
        $response = $this->UserAddress::updateOrCreate([
            'street_name' => $street,
            'street_number' => $number,
            'neighborhood' => $neighborhood,
            'city' => $city,
            'state' => $state,
            'user_id' => $userId
            ]);
        return $response;
    }

}