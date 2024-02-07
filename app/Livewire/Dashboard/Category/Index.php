<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination; // Importa el trait WithPagination

class Index extends Component
{
    use WithPagination; // Usa el trait WithPagination



    public function render()
    {
        $categories = Category::paginate(5); // Obtiene los datos paginados
        return view('livewire.dashboard.category.index', compact('categories'))->layout('layouts.app');
    }

    public function delete(Category $category)
    {
        $category->delete();

    }

}
