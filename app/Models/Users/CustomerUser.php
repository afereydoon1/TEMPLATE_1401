<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CustomerUser extends User
{
    use HasFactory;
    protected $fillable = ['full_name','email','password'];
}
