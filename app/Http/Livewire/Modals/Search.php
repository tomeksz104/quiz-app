<?php

namespace App\Http\Livewire\Modals;

use App\Models\Quiz;
use LivewireUI\Modal\ModalComponent;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search as SearchableSearch;
use function view;

class Search extends ModalComponent
{
    public string $search = '';

    public $searchResults;

    public function render()
    {
        return view('livewire.Modals.search');
    }

    public function updatedSearch() {
        $this->searchResults = (new SearchableSearch())
        ->registerModel(Quiz::class, function(ModelSearchAspect $modelSearchAspect) {
            $modelSearchAspect
               ->addSearchableAttribute('title')
               ->with('image', 'user');
            })
        ->search($this->search);

        //dump($this->searchResults);
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
