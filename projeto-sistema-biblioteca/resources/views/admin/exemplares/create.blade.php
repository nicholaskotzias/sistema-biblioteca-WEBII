<x-app-layout>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Criar Novo Exemplar
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

            <form action="{{ route('admin.exemplares.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="livro_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Livro</label>
                    <select id="livro_id" name="livro_id" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Selecione um livro</option>
                        @foreach ($livros as $livro)
                            <option value="{{ $livro->id }}" {{ old('livro_id') == $livro->id ? 'selected' : '' }}>
                                {{ $livro->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="codigo_exemplar" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Código do Exemplar</label>
                    <input id="codigo_exemplar" name="codigo_exemplar" type="text" required
                        value="{{ old('codigo_exemplar') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="status" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Status</label>
                    <select id="status" name="status" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                        <option value="DISPONIVEL" {{ old('status') == 'DISPONIVEL' ? 'selected' : '' }}>DISPONÍVEL</option>
                        <option value="EMPRESTADO" {{ old('status') == 'EMPRESTADO' ? 'selected' : '' }}>EMPRESTADO</option>
                        <option value="DANIFICADO" {{ old('status') == 'DANIFICADO' ? 'selected' : '' }}>DANIFICADO</option>
                        <option value="PERDIDO" {{ old('status') == 'PERDIDO' ? 'selected' : '' }}>PERDIDO</option>
                    </select>
                </div>

                <div>
                    <label for="localizacao" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Localização (opcional)</label>
                    <input id="localizacao" name="localizacao" type="text"
                        value="{{ old('localizacao') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition">
                        Criar Exemplar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
