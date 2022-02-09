<?php

namespace App\Actions\Fortify;

use App\Models\Advertisers;
use App\Models\Publishers;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if ($input['profile'] == 1){
            /** administration */
            return User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'profile' => 1,
                'account_id' => 0,
                'role' => 0,
                'status' => 1,
                'password' => Hash::make($input['password']),
            ]);
        }elseif ($input['profile'] == 2){
            /** advertiser */
            $advertiser = Advertisers::create([
                 'name' => $input['username'],
                 'status' => 1,
            ]);
            return User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'profile' => 2,
                'account_id' => $advertiser->id,
                'role' => 0,
                'status' => 1,
                'password' => Hash::make($input['password']),
            ]);
        }elseif ($input['profile'] == 3){
            /** publisher */
            $publisher = Publishers::create([
                'name' => $input['username'],
                'status' => 1,
            ]);
            return User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'profile' => 3,
                'account_id' => $publisher->id,
                'role' => 0,
                'status' => 1,
                'password' => Hash::make($input['password']),
            ]);
        }

    }
}
