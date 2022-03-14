<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($user, array $input)
    {
        $validator = Validator::make($input, [
            'current_password' => ['current_password'],
            'password' => $this->passwordRules(),
        ]);

        if ($validator->fails()) {
            $error = \Illuminate\Validation\ValidationException::withMessages(\Arr::flatten($validator->errors()->getMessages()));
            throw $error;
        }
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
