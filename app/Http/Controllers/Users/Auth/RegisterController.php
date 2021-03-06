<?php

namespace App\Http\Controllers\Users\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        return view('user/auth/register');
    }

    protected $redirectTo = '/user/personal_info';

    public function __construct()
    {
        $this->middleware('guest:user');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:4'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'email'    => $data['email'],
            'password' => $data['password'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

}
