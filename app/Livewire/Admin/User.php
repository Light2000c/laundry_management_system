<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Exception;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class User extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    private $users;
    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $displayForm = false;

    public $search = "";

    // protected $rules = [
    //     'password' => 'required|string|min:8|confirmed',
    // ];



    public function mount()
    {
        // $this->load();
    }




    public function render()
    {
        $this->load();
        
        return view('livewire.admin.user', [
            "users" => $this->users,
        ]);
    }

    public function updatedSearch($value)
    {

        $this->load();
    }

    public function load()
    {
        if (!$this->search) {
            $this->users = ModelsUser::orderBy("created_at", "DESC")->paginate(10);
        } else {
            $this->users = ModelsUser::where("name", "LIKE", '%' . $this->search . '%')->orderBy("created_at", "DESC")->paginate(10);
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

            $this->load();
            $this->resetFields();
            return $this->showAlert("success", "New user has been successfully added.");
        } catch (Exception $e) {
            $this->showAlert("error", "Something went wrong, please try again");
        }

        $this->resetFields();
        return;
    }

    Public function resetFields(){
        $this->users = "";
        $this->name = "";
        $this->username = "";
        $this->email = "";
        $this->password = "";
        $this->password_confirmation = "";
        $this->displayForm = false;
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

        $this->load();
        $this->showAlert("success", "User has been successfully deleted.");
    }
}
