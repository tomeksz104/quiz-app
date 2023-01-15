<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'id';
    public $selectedPages = [];
    public $selectedCategories = [];
    public $activeBulkDelete = false;
    public $selectAll = false;

    protected $listeners = ['refresh' => 'render', 'delete'];

    public function render()
    {
        return view('livewire.admin.categories',[
            'categories' => Category::where('title', 'like', '%'.$this->search.'%')
                ->orderBy($this->orderBy, 'desc')
                ->with('image')
                ->paginate($this->perPage),
            'perPage' =>  $this->perPage,
        ])
           ->extends('layout/main')
            ->section('content');
    }

    public function deleteConfrim($ids = NULL) {
        if($this->selectedCategories || $ids) {
            $this->dispatchBrowserEvent('swal:delete', [
                'title' => 'Usuwanie rekordu',
                'text' => 'Usuwasz rekord/y z bazy danych. Nie będziesz w stanie tego cofnąć!',
                'type' => 'warning',
                'ids' => $ids ?? $this->selectedCategories,
            ]);
        }

    }

    public function delete($ids){
        foreach((array) $ids as $key => $categoryId) {
            $category = Category::find($categoryId);
            $category->quizzes()->detach();
            $category->image->delete();
            $category->delete();
        }

        $this->selectedPages = [];
        $this->activeBulkDelete = false;
        $this->selectAll = false;
        $this->selectedCategories = [];

        $this->emit('refresh');
    }

    public function addSelectedCategory($id)
    {
        if(!in_array($id, $this->selectedCategories)) {
            $this->selectedCategories[] = ''.$id.'';
        } else {
            $key = array_search($id, $this->selectedCategories);
            unset($this->selectedCategories[$key]);
        }
        $this->updatedSelectedCategories();
    }

    public function updatedSelectAll($value)
    {
        $categories = Category::where('title', 'like', '%'.$this->search.'%')
            ->orderBy($this->orderBy, 'desc')
            ->paginate($this->perPage)
            ->pluck('id')
            ->toArray();

        if($value)
        {
            $this->selectedPages[] = $this->page;
            foreach ($categories as $category) {
                if(!in_array($category,$this->selectedCategories)) {
                    $this->selectedCategories[] = ''.$category.'';
                }
            }
        }
        else
        {
            unset($this->selectedPages[array_search($this->page, $this->selectedPages)]);
            foreach ($categories as $category)
            {
                $key = array_search($category, $this->selectedCategories);
                unset($this->selectedCategories[$key]);
            }
        }
        $this->updatedSelectedCategories();
    }

    public function updatedSelectedCategories(): bool
    {
        if($this->selectedCategories) {
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
