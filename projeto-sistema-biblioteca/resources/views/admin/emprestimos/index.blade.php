<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-5xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Empréstimos Pendentes
            </h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="mb-4 p-4 bg-red-500 text-white rounded-lg shadow">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse rounded-xl overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-center">
                            <th class="px-4 py-3">Aluno</th>
                            <th class="px-4 py-3">Livro</th>
                            <th class="px-4 py-3">Exemplar</th>
                            <th class="px-4 py-3">Solicitado em</th>
                            <th class="px-4 py-3">Devolução Prevista</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($emprestimos as $emprestimo)
                            <tr class="text-center border-b border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $emprestimo->aluno->user->name }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $emprestimo->exemplar->livro->titulo }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $emprestimo->exemplar->codigo_exemplar }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $emprestimo->data_emprestimo->format('d/m/Y') }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $emprestimo->data_devolucao_prevista->format('d/m/Y') }}</td>
                                <td class="flex justify-center space-x-2 px-4 py-2">
                                    <form method="POST" action="{{ route('admin.emprestimos.aprovar', $emprestimo->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition">
                                            Aprovar
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.emprestimos.recusar', $emprestimo->id) }}"
                                          onsubmit="return confirm('Tem certeza que deseja recusar este empréstimo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition">
                                            Recusar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-600 dark:text-gray-300">Nenhum empréstimo pendente.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
