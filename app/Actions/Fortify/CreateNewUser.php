<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Localities;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        $message = [
            'name.required' => 'Inserire un nome',
            'sur_name.required' => 'Inserire un cognome',
            'email.required' => 'Inserire una mail',
            'email.email' => 'L\ndirizzo email deve essere valido',
            'email.unique' => 'E\ gia\ associata un utenza a questa mail',
            'phone_number.required' => 'Inserire un recapito telefonico.',
            'birth.required' => 'Inserire la data di nasciata',
            'user_name.required' => 'Inserire uno username',
            'user_name.unique' => 'Questo nome username è già assocaito ad una ltro utente',
            'password.required' => 'Inserire una password',
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone_number' => ['required', 'string', 'max:255'],
            'birth' => ['required'],
            'user_name' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ], $message)->validate();


        $locality = Localities::where('cap', $input['cap'])->value('id');

        return User::create([
            'name' => $input['name'],
            'sur_name' => $input['sur_name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'birth' => $input['birth'],
            'user_name' => $input['user_name'],
            'address' => $input['address'],
            'password' => $input['password'],
            'id_locality' => $locality,
        ]);
    }
}
