<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;



class Save extends Component
{

    public $category;
    public $title;
    public $text;

    protected $rules = [
        'title' => 'required|min:3',
        'text' => 'nullable|min:10',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->category = Category::findOrFail($id);
            $this->title = $this->category->title;
            $this->text = $this->category->text;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.category.save')->layout('layouts.app');
    }

    public function submit()
    {
        $this->validate();

        if (isset($this->category->id)) {
            $this->category->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'text' => $this->text,
            ]);
            $this->dispatch('updated'); // Emite el evento 'updated' con el id de la categoría
        } else {
            $this->category = Category::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'text' => $this->text,
            ]);
            $this->dispatch('created'); // Emite el evento 'created' con el id de la categoría
        }

        $this->reset(['category','title', 'text']);
        // Opcionalmente, resetear también $this->category si se desea reutilizar el formulario para crear otra nueva categoría
        // $this->reset([, 'title', 'text']);
    }
}

