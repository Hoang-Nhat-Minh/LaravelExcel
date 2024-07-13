<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $key = '';
    public $paginate = 5;
    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function updatingKey()
    {
        $this->resetPage();
    }

    public function render()
    {
        $title = "Quản lý thông tin";

        $users = User::where('name', 'like', '%' . $this->key . '%')
            ->orWhere('email', 'like', '%' . $this->key . '%')
            ->paginate($this->paginate);

        return view('livewire.home', compact('title', 'users'));
    }
}
