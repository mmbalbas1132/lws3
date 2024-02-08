<x-card>
    @slot('title')
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">Crear o actualizar categoría</h1>
    @endslot
<div class="p-20">
    <x-action-message on="created" >
       <strong>{{__('Created category success')}}</strong>
    </x-action-message>
    <x-action-message on="updated">
         <strong>{{__('Updated category success')}}</strong>
    </x-action-message>
    <x-form-section submit="submit">

@slot('title')
    {{__('Categories')}}
@endslot
        @slot('description')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus fugiat possimus tenetur aliquid tempora omnis magni. Obcaecati maiores eveniet veritatis, ullam nemo dolorem sint placeat molestias, et animi numquam ducimus?
        @endslot
    @slot('form')
        <!-- Campo de título -->
          <div class="col-span-6 sm:col-span-4">

        <x-label for="">{{__('Title')}}</x-label>
              <x-input-error for="title"/>
{{--        @error('title'){{ $message }}@enderror--}}
        <x-input type="text" wire:model="title" class="block w-full"/>
          </div>

        <!-- Campo de texto -->
        <div class="col-span-6 sm:col-span-4">
        <x-label for="">{{__('Text')}}</x-label>
        <x-input-error for="text"/>
        <x-input type="text" wire:model="text" class="block w-full"/>
        </div>

        <!-- Campo de imagen -->
        <div class="col-span-6 sm:col-span-4">
        <x-label for="">{{__('Image')}}</x-label>
        <x-input-error for="image"/>
        <x-input type="file" wire:model="image"/>
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="image" class="w-40 my-3">
        @endif
        </div>
    @endslot
{{--        Este fragmento de código lo utiliza Livewire para manejar la carga de imágenes. Aquí está el desglose:--}}
{{--        <x-label for="">{{__('Image')}}</x-label>: Esto crea una etiqueta de texto para la imagen. La función {{__('Image')}} se utiliza para traducir la palabra "Image" según el idioma configurado en la aplicación.--}}
{{--        <x-input-error for="image" class="mb-4" />: Esto genera un mensaje de error para el campo de imagen, en caso de que ocurra algún error durante la carga.--}}
{{--        <x-input type="file" wire:model="image"/>: Este es un elemento de entrada de tipo archivo que permite al usuario seleccionar un archivo de su dispositivo local. El atributo wire:model="image" está vinculado a una propiedad de Livewire llamada "image", lo que significa que cuando se selecciona un archivo, se asignará automáticamente a esa propiedad en el componente de Livewire.--}}
{{--        @if ($image): Esto verifica si hay un archivo de imagen seleccionado. Si $image no es nulo, significa que se ha seleccionado un archivo de imagen.--}}
{{--        <img src="{{ $image->temporaryUrl() }}" alt="image" class="w-40 my-3">: Si se ha seleccionado un archivo de imagen, se muestra una etiqueta <img> que muestra una vista previa de la imagen seleccionada. La función temporaryUrl() genera una URL temporal para acceder al archivo de imagen cargado temporalmente. Esto es útil para mostrar una vista previa de la imagen antes de que se guarde definitivamente en el servidor. El atributo alt proporciona un texto alternativo para la imagen, y class="w-40 my-3" se utiliza para aplicar estilos CSS a la imagen (en este caso, un ancho de 40 unidades y un margen superior e inferior de 3 unidades).--}}
        <!-- Botón de enviar -->
    @slot('actions')
        <x-button type="submit" >{{__('Send')}}</x-button>
    @endslot
    </x-form-section>
</div>
</x-card>
