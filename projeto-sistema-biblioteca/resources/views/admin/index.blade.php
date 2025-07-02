<x-app-layout>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-yellow-50 via-white to-yellow-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">
        <div class="max-w-xl text-center mb-12 px-4">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
                Bem-vindo ao Painel Administrativo!
            </h1>
            <p class="text-base text-gray-700 dark:text-gray-300">
                Olá, <span class="font-semibold">{{ Auth::user()->name }}</span>. Aqui você pode gerenciar o sistema. Escolha uma das opções abaixo para começar.
            </p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 max-w-md w-full space-y-5 grid grid-cols-1 gap-5">
            <a href="{{ route('admin.alunos.index') }}" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-semibold shadow-lg hover:from-yellow-700 hover:to-yellow-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Manter Aluno
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-green-600 to-emerald-700 text-white font-semibold shadow-lg hover:from-green-700 hover:to-emerald-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Manter Livro
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-semibold shadow-lg hover:from-purple-700 hover:to-indigo-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8h5v-6h-5v6z" />
                </svg>
                Manter Autor
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-pink-600 to-rose-700 text-white font-semibold shadow-lg hover:from-pink-700 hover:to-rose-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h4v11H3zM9 5h4v16H9zM15 12h4v9h-4z" />
                </svg>
                Manter Exemplar
            </a>

            <a href="{{ route('admin.categorias.index') }}" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-teal-600 to-cyan-700 text-white font-semibold shadow-lg hover:from-teal-700 hover:to-cyan-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Manter Categoria
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold shadow-lg hover:from-blue-700 hover:to-indigo-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Aprovar Empréstimo
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-700 text-white font-semibold shadow-lg hover:from-red-700 hover:to-rose-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h4v11H3zM9 5h4v16H9zM15 12h4v9h-4z" />
                </svg>
                Visualizar Livros Mais Emprestados
            </a>
        </div>
    </div>
</x-app-layout>
