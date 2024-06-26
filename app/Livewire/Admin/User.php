<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Exception;
use Livewire\Component;
use Illuminate\Http\Request;

class User extends Component
{

    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $displayForm = false;
    public $users;

    public $search = "";

    // protected $rules = [
    //     'password' => 'required|string|min:8|confirmed',
    // ];



    public function mount()
    {
        $this->refresh();
    }


    public function refresh()
    {
        $this->users = ModelsUser::orderBy("created_at", "DESC")->get();
    }


    public function render()
    {
        return view('livewire.admin.user');
    }

    public function updatedSearch($value){

        if(!$this->search){
            $this->users = ModelsUser::orderBy("created_at", "DESC")->get();
        }else{
            $this->users = ModelsUser::where("name", "LIKE", '%'.$this->search .'%')->orderBy("created_at", "DESC")->get();
        }
    }


    public function showForm()
    {
        $this->displayForm = true;
    }


    public function hideForm()
    {
        $this->displayForm = false;
    }


    public function createUser()
    {
        $user =   $this->validate([
            'name' => "required",
            'email' => "required|unique:users,email",
            'username' => "required|unique:users,username",
            'password' => "required|confirmed"
        ]);

        try {
            $new_user = ModelsUser::create($user);

            if (!$new_user) {
                return $this->showAlert("error", "Something went wrong, please try again");
            }

            $this->refresh();
            return $this->showAlert("success", "New user has been successfully added.");
        } catch (Exception $e) {
            $this->showAlert("error", "Something went wrong, please try again");
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


    public function deleteUser(ModelsUser $user)
    {

        $delete = $user->delete();

        if (!$delete) {
            $this->showAlert("error", "User was not successfully deleted");
        }

          $this->refresh();
        $this->showAlert("success", "User has been successfully deleted.");
    }
}
