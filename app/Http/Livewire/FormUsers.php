<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;


class FormUsers extends Component
{
  public $form_user = 'hidden';

  public $user, $username, $email, $password, $password_confirm, $rol;

  protected $rules = [
    'user' => 'required',
    'username' => 'required | unique:App\Models\User,username',
    'email' => 'required | email',
    'password' => 'required',
    'password_confirm' => 'required | same:password',
    'rol' => 'required',
  ];

  protected $messages = [
    'user.required' => 'The user cannot be empty.',
    'username.required' => 'The user name cannot be empty.',
    'username.unique' => 'The user name field has already been taken.',
    'email.required' => 'The email cannot be empty.',
    'email.email' => 'The email format is invalid.',
    'password.required' => 'The password cannot be empty.',
    'password_confirm.required' => 'The password confirm cannot be empty.',
    'rol.required' => 'The rol cannot be empty.',
    'password_confirm.same' => 'The password confirm and password fields must match.',

  ];

  public function save(){
    $this->validate();
    $user = User::create([
      'user' => $this->user,
      'username' => $this->username,
      'password' =>  bcrypt($this->password),
      'email' => $this->email,
      'state' => '1',
    ]);
    $user->roles()->sync($this->rol);
    $this->reset();
    $this->emitTo('show-users','render');
    $this->emit('alert','Added user','The record was created successfully.', 'success');
  }

  public function render(){
    $roles = Role::pluck('name', 'id');
    return view('livewire.form-users', compact('roles'));
  }
}
