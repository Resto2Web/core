<?php

namespace Resto2web\Core\Auth\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Auth\RegistersUsers;
use Hash;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Users\Models\User;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use SEOTools;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['name'],
            'last_name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'points' => []
        ]);
    }

    public function showRegistrationForm()
    {
        $this->seo()->setTitle('Créer un compte');
        $this->seo()->setDescription('Créez un compte Huy au plaisir pour profiter dès maintenant de pleins d\'avantages et commencez à récolter des points!');

    }
}
