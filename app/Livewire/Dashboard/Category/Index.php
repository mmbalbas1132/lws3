<?php

namespace App\Livewire\Dashboard\Category;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.category.index')->layout('layouts.app');
//        Tuve que añadir ->layout('layouts.app'); porque si no me daba un error de que no encontraba el layout devido que la estructura de carpetas ha cambiado por la vesión de laravel 10 respecto a la 8   .
    }
}
