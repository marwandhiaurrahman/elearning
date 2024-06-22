<?php

namespace App\Livewire\User;

use Livewire\Component;

class ProfilIndex extends Component
{
    public $user;
    public $id, $name, $email, $phone, $username;
    public function save()
    {
        $user = auth()->user();
        $user->name = $this->name;
        $user->username = $this->username;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->save();
        flash('User updated successfully!', 'success');
    }
    public function resetForm()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->username = null;
    }
    public function mount()
    {
        $user = auth()->user();
        $this->user = $user;
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->username = $user->username;
    }
    public function placeholder()
    {
        return view('components.layouts.lazy_loading');
    }
    public function render()
    {

        return view('livewire.user.profil-index')
            ->title('Profil');
    }
}
