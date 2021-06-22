<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel
{
    public function __construct(Customer $customer, User $user)
    {
        $this->customerModel = $customer;
        $this->userModel = $user;
    }
    public $customerModel;
    public $userModel;
}
