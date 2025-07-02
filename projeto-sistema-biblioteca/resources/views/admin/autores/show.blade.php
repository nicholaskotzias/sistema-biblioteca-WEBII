<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">

        <div class="w-full max-w-md rounded-3xl shadow-xl p-8 space-y-6 flex flex-col items-center text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                Detalhes do Autor
            </h1>
            <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                Aqui estão as informações do autor cadastrado.
            </p>
        </div>

        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 space-y-6 flex flex-col items-center text-center">
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest inline-block">Nome</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-white inline-block">{{ $autor->nome }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest inline-block">Biografia</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-white inline-block whitespace-pre-line">{{ $autor->biografia }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest inline-block">Nacionalidade</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-white inline-block">{{ $autor->nacionalidade }}</p>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <a href="{{ route('admin.autores.index') }}" class="inline-block px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition">
                Voltar à Lista
            </a>
        </div>
    </div>
</x-app-layout>
