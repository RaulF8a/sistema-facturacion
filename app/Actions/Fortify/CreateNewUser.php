<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'rfc'=> ['required', 'string', 'min:13'],
            'csd'=> ['required', 'string'],
            'regimen'=> ['required', 'string'],
            'domicilio'=> ['required', 'string'],
            'telefono'=> ['required', 'string', 'min:10'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [
            'password.confirmed' => 'Las credenciales no son correctas',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'rfc' => $input['rfc'],
            'csd' => $input['csd'],
            'regimen' => $input['regimen'],
            'domicilio' => $input['domicilio'],
            'telefono' => $input['telefono'],
        ]);
    }
}
