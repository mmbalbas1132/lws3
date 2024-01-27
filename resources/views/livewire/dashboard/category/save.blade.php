<div>
    <form wire:submit.prevent="submit">
        {{--El comportamiento que estás experimentando, donde la variable no se actualiza hasta que se pulsa el botón de enviar, se debe al uso de wire:submit.prevent="submit" en tu formulario. Cuando se utiliza wire:submit.prevent, Livewire bloquea la acción predeterminada del formulario y realiza una solicitud HTTP para procesar los datos antes de volver a renderizar la página. Esto significa que los cambios en los campos del formulario no se reflejarán en tiempo real en la vista hasta que se envíe el formulario.--}}
{{--   Consultas:     https://laravel-livewire.com/docs/2.x/properties#binding-inputs-to-properties--}}

        <!-- Campo de título -->

        <h3 class="text-xl">***{{$title}}***</h3>
        <label for="">Título</label>
        <input type="text" wire:model.live.debounce="title"><br>

        @error('title') <span class="error bg-red-600 text-white">{{ $message }}</span> @enderror
        <br>

        <!-- Campo de texto -->
        <label for="">Texto</label>
        <input type="text" wire:model="text"><br>
        <h3 class="text-xl">***{{$text}}***</h3>
        @error('text') <span class="error bg-red-600 text-white">{{ $message }}</span> @enderror
        <br>
        <!-- Botón de enviar -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Enviar</button>
    </form>
</div>
