<div>
    <x-action-message on="created" class="text-lg text-white bg-green-500 p-4 rounded-md">
       <strong>{{__('Created category success')}}</strong>
    </x-action-message>
    <x-action-message on="updated" class="text-lg text-white bg-green-500 p-4 rounded-md">
         <strong>{{__('Updated category success')}}</strong>
    </x-action-message>
    <form wire:submit.prevent="submit">
        {{--El comportamiento que estás experimentando, donde la variable no se actualiza hasta que se pulsa el botón de enviar, se debe al uso de wire:submit.prevent="submit" en tu formulario. Cuando se utiliza wire:submit.prevent, Livewire bloquea la acción predeterminada del formulario y realiza una solicitud HTTP para procesar los datos antes de volver a renderizar la página. Esto significa que los cambios en los campos del formulario no se reflejarán en tiempo real en la vista hasta que se envíe el formulario.--}}
{{--   Consultas:     https://laravel-livewire.com/docs/2.x/properties#binding-inputs-to-properties--}}

        <!-- Campo de título -->
        <x-label for="">{{__('Title')}}</x-label>
        @error('title') <span class="error bg-red-600 text-white">{{ $message }}</span> @enderror
        <x-input type="text" wire:model="title" />

        <!-- Campo de texto -->
        <x-label for="">{{__('Text')}}</x-label>
        <x-input type="text" wire:model="text"/>

        <!-- Campo de imagen -->
        <x-label for="">{{__('Image')}}</x-label>
        <x-input-error for="image" class="mb-4" />
        <x-input type="file" wire:model="image"/>
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="image" class="w-40 my-3">
        @endif


{{--        Este fragmento de código lo utiliza Livewire para manejar la carga de imágenes. Aquí está el desglose:--}}

{{--        <x-label for="">{{__('Image')}}</x-label>: Esto crea una etiqueta de texto para la imagen. La función {{__('Image')}} se utiliza para traducir la palabra "Image" según el idioma configurado en la aplicación.--}}

{{--        <x-input-error for="image" class="mb-4" />: Esto genera un mensaje de error para el campo de imagen, en caso de que ocurra algún error durante la carga.--}}

{{--        <x-input type="file" wire:model="image"/>: Este es un elemento de entrada de tipo archivo que permite al usuario seleccionar un archivo de su dispositivo local. El atributo wire:model="image" está vinculado a una propiedad de Livewire llamada "image", lo que significa que cuando se selecciona un archivo, se asignará automáticamente a esa propiedad en el componente de Livewire.--}}

{{--        @if ($image): Esto verifica si hay un archivo de imagen seleccionado. Si $image no es nulo, significa que se ha seleccionado un archivo de imagen.--}}

{{--        <img src="{{ $image->temporaryUrl() }}" alt="image" class="w-40 my-3">: Si se ha seleccionado un archivo de imagen, se muestra una etiqueta <img> que muestra una vista previa de la imagen seleccionada. La función temporaryUrl() genera una URL temporal para acceder al archivo de imagen cargado temporalmente. Esto es útil para mostrar una vista previa de la imagen antes de que se guarde definitivamente en el servidor. El atributo alt proporciona un texto alternativo para la imagen, y class="w-40 my-3" se utiliza para aplicar estilos CSS a la imagen (en este caso, un ancho de 40 unidades y un margen superior e inferior de 3 unidades).--}}


        <!-- Botón de enviar -->
        <x-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{__('Send')}}</x-button>
    </form>
</div>
