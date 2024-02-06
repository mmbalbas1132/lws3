<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Log;

class Save extends Component
{
    use WithFileUploads;
//    En este caso no es necesario porque no se cargan archivos en este componente

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
    public function boot()
    {
        Log::info('boot');
    }
    public function booted()
    {
        Log::info('booted');
    }
    public function mount()
    {
        Log::info('mount');
    }
    public function hydrateTitle($value)
    {
        Log::info('hydrateTitle');
    }
  public function dehydrateFoo ($value)
  {
      Log::info('dehydrateFoo $value');
  }
  public function hydrate()
  {
      Log::info('hydrate');
  }
    public function dehydrate()
    {
        Log::info('dehydrate');
    }
    public function updating($name, $value)
    {
        Log::info('updating $name $value');
    }
    public function updated($name, $value)
    {
        Log::info('updated $name $value');
    }
    public function updatingTitle($value)
    {
        Log::info('updatingTitle $value');
    }
    public function updatedTitle($value)
    {
        Log::info('updatedTitle $value');
    }
}

