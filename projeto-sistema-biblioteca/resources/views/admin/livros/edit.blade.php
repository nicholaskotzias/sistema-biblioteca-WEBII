<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-2xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Editar Livro
            </h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-500 text-white rounded-lg shadow">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.livros.update', $livro->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Título</label>
                    <input id="titulo" name="titulo" type="text" required
                        value="{{ old('titulo', $livro->titulo) }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="isbn" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">ISBN</label>
                    <input id="isbn" name="isbn" type="text" required
                        value="{{ old('isbn', $livro->isbn) }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="descricao" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="4" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">{{ old('descricao', $livro->descricao) }}</textarea>
                </div>

                <div>
                    <label for="ano_publicacao" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Ano de Publicação</label>
                    <input id="ano_publicacao" name="ano_publicacao" type="number" required
                        value="{{ old('ano_publicacao', $livro->ano_publicacao) }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="categoria_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Categoria</label>
                    <select id="categoria_id" name="categoria_id" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $livro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="autor_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Autor</label>
                    <select id="autor_id" name="autor_id" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Selecione um autor</option>
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}" {{ old('autor_id', $livro->autor_id) == $autor->id ? 'selected' : '' }}>
                                {{ $autor->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition">
                        Atualizar Livro
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
