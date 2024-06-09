<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditUser extends Component
{

    public $user;
    public $name;
    public $email;
    public $username;
    public $password;
    public $current_password;
    public $password_confirmation;
    public $message;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
    }


    public function render()
    {
        return view('livewire.admin.edit-user');
    }


    public function updateUser(Request $request)
    {

        $message = null;

        if ($this->current_password !== null || $this->password !== null || $this->password_confirmation !== null) {
            $this->validate([
                "name" => 'required',
                "email" => $this->user->email == $this->email ? 'required' : 'required|unique:users,email',
                "username" => $this->user->username == $this->username ? 'required' : 'required|unique:users,username',
                "current_password" => 'required',
                "password" => 'required|confirmed',
            ]);

            $compare = Hash::check($this->current_password, $this->user->password);

            if (!$compare) {
                return $this->message = "Your current password is incorrect, please check and try again.";
            }

            $this->user->name = $this->name;
            $this->user->email = $this->email;
            $this->user->username = $this->username;
            $this->password = Hash::make($this->password);
            $this->user->save();
            $this->resetFields();
            return $this->showAlert("success", "user has been successfully updated.");
        } else {

            $this->validate([
                "name" => 'required',
                "email" => $this->user->email == $this->email ? 'required' : 'required|unique:users,email',
                "username" => $this->user->username == $this->username ? 'required' : 'required|unique:users,username',
            ]);

            $this->user->name = $this->name;
            $this->user->email = $this->email;
            $this->user->username = $this->username;
            $this->user->save();
            return $this->showAlert("success", "user has been successfully updated.");
        }

        return;
    }



    public function showAlert($icon, $title)
    {
        $this->dispatch(
            'message',
            icon: $icon,
            title: $title,
        );
    }


    public function resetFields(){
        $this->password = null;
        $this->current_password = null;
        $this->password_confirmation = null;
    }
}
