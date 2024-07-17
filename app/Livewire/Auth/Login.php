<?php

namespace App\Livewire\Auth;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $message;
    public $username;
    public $password;
    public $busy = false;

    public $rules = [
        "username" => "required",
        "password" => "required",
    ];

    public function render()
    {
        return view('livewire.auth.login')->layout("components.auth.app");
    }


    public function login()
    {

        $this->message = "";

        $validated  = $this->validate($this->rules);

        $this->busy = true;


        try {
            if (Auth::attempt($validated, true)) {
                $this->busy = false;

                $this->redirect("/admin/dashboard");
            }


            $this->busy = false;
            $this->addError("username", "Password doesn't match this username");
        } catch (Exception $e) {

            $this->busy = false;
            $this->message = "Something went wrong, please try again.";
        }
    }
}
