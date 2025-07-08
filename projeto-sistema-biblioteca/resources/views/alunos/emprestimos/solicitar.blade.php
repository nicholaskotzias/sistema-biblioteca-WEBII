<x-app-layout>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-500 text-white rounded-lg shadow">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-3xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">

            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Solicitar Empréstimo
            </h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if ($exemplaresDisponiveis->isEmpty())
                <p class="text-center text-gray-700 dark:text-gray-300">Nenhum exemplar disponível para empréstimo no momento.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($exemplaresDisponiveis as $exemplar)
                        <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-md">
                            <h3 class="font-bold text-lg text-gray-800 dark:text-gray-100">{{ $exemplar->livro->titulo }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Código: {{ $exemplar->codigo_exemplar }}</p>
                            <form method="POST" action="{{ route('alunos.emprestimos.solicitar', $exemplar->id) }}">
                                @csrf
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg font-semibold transition">
                                    Solicitar
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
