<x-app-layout>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-3 py-12">
        <div class="max-w-7xl bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 w-full">

            <div class="mb-6 flex justify-center">
                <a href="{{ route('admin.livros.create') }}"
                    style="background-color:#1f8344; color:white; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; box-shadow:0 10px 15px -3px rgba(72,187,120,0.5); display:inline-block; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#16a34a'"
                    onmouseout="this.style.backgroundColor='#1f8344'">
                    Adicionar Livro
                </a>
            </div>

            <div class="overflow-x-auto flex justify-center">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-center">
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Título</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">ISBN</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Autor</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Categoria</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Ano</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livros as $livro)
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $livro->titulo }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100 font-mono">{{ $livro->isbn }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $livro->autor->nome ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $livro->categoria->nome ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $livro->ano_publicacao }}</td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
                                    <a href="{{ route('admin.livros.show', $livro->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Ver</a>
                                    <a href="{{ route('admin.livros.edit', $livro->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Atualizar</a>
                                    <form action="{{ route('admin.livros.destroy', $livro->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $livros->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
