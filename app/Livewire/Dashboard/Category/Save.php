<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class Save extends Component
{
    use WithFileUploads;

    public $category;
    public $title;
    public $text;
    public $image;

    protected $rules = [
        'title' => 'required|min:3',
        'text' => 'nullable|min:10',
        'image' => 'nullable|image|max:1024', // 1MB Max
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
        // Si se ha subido una imagen, guardarla
//        En este código:
//        Estamos concatenando el slug de la categoría con la extensión original de la imagen para formar el nombre de la imagen ($imageName).
//        Luego, estamos usando el método storeAs() para almacenar la imagen en el directorio especificado (public/categories) con el nombre que hemos creado.
//        Finalmente, actualizamos el campo de imagen de la categoría con el nombre de la imagen.
        if ($this->image) {
            $imageName = $this->category->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/categories', $imageName);
            $this->category->update([
                'image' => $imageName,
            ]);
        }

        $this->reset(['category','title', 'text']);
        // Opcionalmente, resetear también $this->category si se desea reutilizar el formulario para crear otra nueva categoría
        // $this->reset([, 'title', 'text']);
    }
}

