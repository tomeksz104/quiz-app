<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'id';
    public $selectedPages = [];
    public $selectedUsers = [];
    public $activeBulkDelete = false;
    public $selectAll = false;

    protected $listeners = ['refresh' => 'render', 'delete'];

    public function render()
    {
        return view('livewire.admin.users',[
            'users' => User::where('username', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orderBy($this->orderBy, 'desc')
                ->with('image')
                ->paginate($this->perPage),
            'perPage' =>  $this->perPage,
        ])
            ->extends('layout/main')
            ->section('content');
    }

    public function deleteConfrim($ids = NULL) {
        if($this->selectedUsers || $ids) {
            $this->dispatchBrowserEvent('swal:delete', [
                'title' => 'Usuwanie rekordu',
                'text' => 'Usuwasz rekord/y z bazy danych. Nie będziesz w stanie tego cofnąć!',
                'type' => 'warning',
                'ids' => $ids ?? $this->selectedUsers,
            ]);
        }
    }

    public function delete($ids){
        foreach((array) $ids as $key => $userId) {
            $user = User::find($userId);
            $user->delete();
        }

        $this->selectedPages = [];
        $this->activeBulkDelete = false;
        $this->selectAll = false;
        $this->selectedUsers = [];

        $this->emit('refresh');
    }

    public function addSelectedUser($id)
    {
        if(!in_array($id, $this->selectedUsers)) {
            $this->selectedUsers[] = ''.$id.'';
        } else {
            $key = array_search($id, $this->selectedUsers);
            unset($this->selectedUsers[$key]);
        }
        $this->updatedSelectedUsers();
    }

    public function updatedSelectAll($value)
    {
        $users = User::where('username', 'like', '%'.$this->search.'%')
            ->orderBy($this->orderBy, 'desc')
            ->paginate($this->perPage)
            ->pluck('id')
            ->toArray();

        if($value)
        {
            $this->selectedPages[] = $this->page;
            foreach ($users as $user) {
                if(!in_array($user,$this->selectedUsers)) {
                    $this->selectedUsers[] = ''.$user.'';
                }
            }
        }
        else
        {
            unset($this->selectedPages[array_search($this->page, $this->selectedPages)]);
            foreach ($users as $user)
            {
                $key = array_search($user, $this->selectedusers);
                unset($this->selectedusers[$key]);
            }
        }
        $this->updatedSelectedUsers();
    }

    public function updatedSelectedusers(): bool
    {
        if($this->selectedUsers) {
            $this->activeBulkDelete = true;
        } else {
            $this->activeBulkDelete = false;
        }
        return $this->activeBulkDelete;
    }

    public function updatedPage(): bool
    {
        if(in_array($this->page,$this->selectedPages)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
        return $this->selectAll;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
