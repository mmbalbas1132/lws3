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

        <!-- Botón de enviar -->
        <x-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{__('Send')}}</x-button>
    </form>
</div>
