<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Save extends Component
{
    public $title;
    public $text;
    public function render()
    {
        return view('livewire.dashboard.category.save')->layout('layouts.app');
    }


    public function submit()
    {
        // Validación de los campos con mensajes personalizados
        $this->validate([
            'title' => 'required|min:3', // Ejemplo: título requerido y mínimo de 3 caracteres
            'text' => 'required|min:10', // Ejemplo: texto requerido y mínimo de 10 caracteres
        ], [
            'title.required' => 'El título no puede estar vacío.',
            'title.min' => 'El título debe tener al menos 3 caracteres.',
            'text.required' => 'El texto no puede estar vacío.',
            'text.min' => 'El texto debe tener al menos 10 caracteres.',
        ]);

        // Creación de la categoría
        Category::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'text' => $this->text,
        ]);

        // Restablecer los campos
        $this->title = '';
        $this->text = '';
    }
}
