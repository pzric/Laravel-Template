<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{
    use WithPagination;

    public $search, $user, $user_id, $username, $email, $password, $password_confirm, $rol;
    public $edit_user = 'hidden';

    protected $listeners = ['render', 'delete'];

    public function delete (User $user){
      if (auth()->user()->id == $user->id ) {
        $this->emit('alert','Invalid operation.','Record cannot be deleted.', 'warning');
      } else {
        $user->delete();
        $this->emit('alert','Deleted!','The record has been deleted.', 'success');
      }
    }

    public function edit(User $user){
      $this->edit_user = 'flex';
      $this->user_id = $user->id;
      $this->user = $user->user;
      $this->username = $user->username;
      $this->email = $user->email;
      $this->rol = $user->roles->pluck('id')->first();
    }

    protected function rules (){
      return [
        'user' => 'required',
        'username' => 'sometimes | unique:users,username,'.$this->user_id,
        'email' => 'required | email',
        'password' => 'nullable',
        'password_confirm' => 'nullable | same:password',
        'rol' => 'required',
      ];
    }

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

    public function update($user_id) {
      $this->validate();
      $user = User::find($user_id);
      $user->update([
        'user' => $this->user,
        'username' => $this->username,
        'password' =>  bcrypt($this->password),
        'email' => $this->email,
      ]);
      $user->roles()->sync($this->rol);
      $this->reset();
      $this->emitTo('show-users','render');
      $this->emit('alert','Edited user','The record was successfully edited.', 'success');
    }

    public function updatingSearch(){
      $this->resetPage();
    }

    public function render()
    {
        $users = User::with('roles')->where('user', 'like', '%' . $this->search . '%')->orderby('id', 'desc')->paginate(10);
        $all_roles = Role::pluck('name', 'id');
        return view('livewire.show-users', compact('users', 'all_roles'));
    }
}
