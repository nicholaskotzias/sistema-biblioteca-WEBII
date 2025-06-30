<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">
        <div class="max-w-xl text-center mb-12 px-4">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
                Bem-vindo ao Sistema de Biblioteca Escolar!
            </h1>
            <p class="text-base text-gray-700 dark:text-gray-300">
                Olá, <span class="font-semibold">{{ Auth::user()->name }}</span>. Estamos felizes em ter você aqui. Escolha uma das opções abaixo para começar.
            </p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 max-w-md w-full space-y-5">
            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold shadow-lg hover:from-blue-700 hover:to-indigo-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4H5a2 2 0 00-2 2v12a2 2 0 002 2h7" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16" />
                </svg>
                Visualizar Livros Disponíveis
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-green-600 to-emerald-700 text-white font-semibold shadow-lg hover:from-green-700 hover:to-emerald-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Solicitar Empréstimo
            </a>

            <a href="#" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-700 text-white font-semibold shadow-lg hover:from-red-700 hover:to-rose-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Devolver Exemplar
            </a>

            <a href="{{ route('alunos.show', Auth::user()->aluno->id) }}" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-violet-700 text-white font-semibold shadow-lg hover:from-purple-700 hover:to-violet-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4.992 4.992 0 0112 15c1.657 0 3.156.804 4.121 2.048M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16" />
                </svg>
                Ver Perfil
            </a>

            <a href="{{ route('alunos.edit', Auth::user()->aluno->id) }}" class="flex items-center justify-center gap-3 py-3 rounded-xl bg-gradient-to-r from-yellow-600 to-orange-700 text-white font-semibold shadow-lg hover:from-yellow-700 hover:to-orange-800 transition w-full max-w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17h2M12 12v5m-7-6h14a2 2 0 012 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4a2 2 0 012-2z" />
                </svg>
                Editar Perfil
            </a>
        </div>
    </div>
</x-app-layout>
