<div class="p-4 sm:p-8 lg:p-12"> <!-- Ajustar el padding en diferentes tamaños de pantalla -->
    <x-card>
        @slot('title')
            <!-- Mensaje de acción (responsivo) -->
            <x-action-message on="deleted" class="text-lg text-white bg-red-500 p-4 rounded-md mb-4">
                <strong>{{__('Deleted category success')}}</strong>
            </x-action-message>

            <!-- Título (responsivo) -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">{{__('Listing')}}</h1>
        @endslot

        <!-- Tabla (responsivo) -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border text-center">
                <!-- Encabezado de la tabla -->
                <thead class="text-left bg-gray-100">
                <tr class="border-b bg-green-300 text-xl p-10 text-center">
                    <th class="font-bold py-2">{{__('Id')}}</th>
                    <th class="font-bold py-2">{{__('Title')}}</th>
                    <th class="font-bold py-2">{{__('Image')}}</th>
                    <th class="font-bold py-2">{{__('Text')}}</th>
                    <th class="font-bold py-2">{{__('Actions')}}</th>
                </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-b">
                        <td class="p-2">{{ $category->id }}</td>
                        <td class="p-2">{{ $category->title }}</td>
                        <td class="p-2">
                            @if ($category->image)
                                <img src="{{ $category->getImageUrlAttribute() }}" alt="{{ $category->title }}" class="w-20 sm:w-32 lg:w-40 my-3 mx-auto">
                                <br>
                                <span class="text-sm sm:text-base lg:text-lg">{{ $category->image }}</span> <!-- Mostrar el nombre de la imagen -->
                            @else
                                <span class="text-red-600">{{__('No image available')}}</span>
                            @endif
                        </td>
                        <td class="p-2">{{ $category->text }}</td>
                        <td class="p-2">
                            <a href="{{ route('d-category-edit', $category) }}" class="'inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'">{{__('Edit')}}</a>
                            <x-danger-button wire:click="delete({{ $category->id }})" onclick="return confirm('¿Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()">
                                {{__('Remove')}}
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-card>

                                 <!-- Paginación (responsivo) -->
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
