<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','image','text'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getImageUrlAttribute()
    {
        return asset('storage/categories/' . $this->image);
    }
//Esta función es parte de un modelo de Laravel, de un modelo Eloquent, ya que incluye un accesor de atributo. Este accesor se utiliza típicamente para generar dinámicamente una URL para una imagen almacenada en el directorio de almacenamiento de la aplicación.
//1. `getImageUrlAttribute()` es un método definido dentro de una clase de modelo de Laravel Eloquent.
//2. Está definido dentro de un modelo que representa categorías, ya que hace referencia a una imagen de categoría.
//3. `asset()` es una función auxiliar de Laravel que se utiliza para generar una URL para un recurso, como archivos CSS, JavaScript o de imagen. El argumento pasado a `asset()` es relativo al directorio público de la aplicación.
//4. El argumento pasado a `asset()` es `'storage/categories/' . $this->image`. Esto concatena la cadena `'storage/categories/'` con el valor del atributo `image` de la instancia de modelo actual (`$this`). Se asume que el nombre del archivo de imagen está almacenado en el atributo `image` del modelo.
//5. El método devuelve la URL generada, que sería algo como `http://tu-url-de-aplicación/storage/categories/nombre-del-archivo-de-imagen`.
//
//Suponiendo que tus imágenes se almacenan en el directorio `storage/app/public/categories` y están enlazadas simbólicamente al directorio `public/storage/categories`, y que tu configuración está correctamente establecida, esta función generaría la URL correcta para la imagen asociada con la instancia del modelo de categoría.
}
