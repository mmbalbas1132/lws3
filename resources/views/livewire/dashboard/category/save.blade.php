<x-card>
    @slot('title')
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">Crear o actualizar categoría</h1>
    @endslot

    <div class="p-20">
        <x-action-message on="created">
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
                    {{-- @error('title'){{ $message }}@enderror --}}
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

            <!-- Botón de enviar -->
            @slot('actions')
                <x-button type="submit">{{__('Send')}}</x-button>
            @endslot
        </x-form-section>
    </div>
</x-card>
