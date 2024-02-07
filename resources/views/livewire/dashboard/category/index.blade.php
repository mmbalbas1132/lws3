<div>
    <x-action-message on="deleted" class="text-lg text-white bg-red-500 p-4 rounded-md">
         <strong>{{__('Deleted category success')}}</strong>
    </x-action-message>
<h1>Listado</h1>
<table class="table w-full">
    <thead>
        <tr>

            <th class="px-4 py-2">Título</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td class="border px-4 py-2">{{ $category->id .' ' . $category->title }}</td>
            <td class="border px-4 py-2">
                @if ($category->image)
                    <img src="{{ $category->getImageUrlAttribute() }}" alt="{{ $category->title }}" class="w-40 my-3">


                @else
                    Sin imagen
                @endif
            </td>

            <td class="border px-4 py-2">
                <a href="{{ route('d-category-edit', $category) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Editar</a>
                <x-danger-button wire:click="delete({{ $category->id }})" onclick="return confirm('¿Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()">
                    Eliminar
                </x-danger-button>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $categories->links() }}
</div>
