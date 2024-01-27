<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $text;

    protected $rules = [
        'title' => 'required|min:3',
        'text' => 'nullable|min:10',
    ];

    public function render()
    {
        return view('livewire.dashboard.category.save')->layout('layouts.app');
    }

    public function submit()
    {
        // Validación de los campos con mensajes personalizados
        $this->validate();

        // Creación de la categoría
        Category::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'text' => $this->text,
        ]);

        // Restablecer los campos
        $this->reset(['title', 'text']);
    }
}
