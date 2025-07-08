<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-5xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">

            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Meus Empréstimos
            </h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if ($meusEmprestimos->isEmpty())
                <p class="text-center text-gray-700 dark:text-gray-300">Você não possui empréstimos no momento.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse rounded-xl overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-center">
                                <th class="px-4 py-3">Livro</th>
                                <th class="px-4 py-3">Exemplar</th>
                                <th class="px-4 py-3">Data Empréstimo</th>
                                <th class="px-4 py-3">Data Devolução Prevista</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 text-center">
                            @foreach ($meusEmprestimos as $emprestimo)
                                <tr class="border-b border-gray-300 dark:border-gray-600">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                        {{ $emprestimo->exemplar->livro->titulo }}
                                    </td>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                        {{ $emprestimo->exemplar->codigo_exemplar }}
                                    </td>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                        {{ $emprestimo->data_emprestimo->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                        {{ $emprestimo->data_devolucao_prevista->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100 font-semibold">
                                        {{ ucfirst(strtolower($emprestimo->status)) }}
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($emprestimo->status == 'APROVADO')
                                            <form method="POST" action="{{ route('alunos.emprestimos.devolver', $emprestimo->id) }}">
                                                @csrf
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded font-semibold transition">
                                                    Devolver
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-500 italic">Sem ações</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
