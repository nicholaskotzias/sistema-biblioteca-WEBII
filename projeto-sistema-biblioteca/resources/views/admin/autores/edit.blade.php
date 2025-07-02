<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Editar Autor
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

            <form action="{{ route('admin.autores.update', $autor->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Nome</label>
                    <input id="nome" name="nome" type="text" required
                        value="{{ old('nome', $autor->nome) }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="biografia" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Biografia</label>
                    <textarea id="biografia" name="biografia" rows="4" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">{{ old('biografia', $autor->biografia) }}</textarea>
                </div>

                <div>
                    <label for="nacionalidade" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Nacionalidade</label>
                    <input id="nacionalidade" name="nacionalidade" type="text" required
                        value="{{ old('nacionalidade', $autor->nacionalidade) }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition">
                        Atualizar Autor
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
