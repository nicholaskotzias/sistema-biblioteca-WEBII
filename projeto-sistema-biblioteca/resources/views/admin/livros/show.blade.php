<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">

        <div class="w-full max-w-xl rounded-3xl shadow-xl p-8 space-y-6 flex flex-col items-center text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                Detalhes do Livro
            </h1>
            <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                Abaixo estão as informações completas do livro cadastrado.
            </p>
        </div>

        <div class="w-full max-w-xl bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 space-y-6 flex flex-col items-center text-center">
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">Título:</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $livro->titulo }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">ISBN:</p>
                    <p class="text-xl font-mono text-gray-900 dark:text-white">{{ $livro->isbn }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">Descrição:</p>
                    <p class="text-xl text-gray-900 dark:text-white">{{ $livro->descricao }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">Ano de Publicação:</p>
                    <p class="text-xl text-gray-900 dark:text-white">{{ $livro->ano_publicacao }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">Categoria:</p>
                    <p class="text-xl text-gray-900 dark:text-white">{{ $livro->categoria->nome ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest">Autor:</p>
                    <p class="text-xl text-gray-900 dark:text-white">{{ $livro->autor->nome ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="pt-6">
            <a href="{{ route('admin.livros.index') }}" class="inline-block px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition">
                Voltar à Lista
            </a>
        </div>
    </div>
</x-app-layout>
