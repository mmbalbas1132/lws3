<div>
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
                <a href="{{ route('d-category-edit', $category) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Editar</a>
                <x-danger-button>
                    Eliminar
                </x-danger-button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $categories->links() }}
</div>
