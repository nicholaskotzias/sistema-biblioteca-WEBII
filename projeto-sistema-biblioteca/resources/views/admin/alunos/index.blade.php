<x-app-layout>
    <div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="w-full max-w-5xl bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <div class="overflow-x-auto flex justify-center">
                <table class="table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Nome</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Email</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Matrícula</th>
                            <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $aluno->user->name }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $aluno->user->email }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $aluno->matricula }}</td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
                                    {{-- <a href="{{ route('admin.alunos.show', $aluno->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Ver</a>
                                    <a href="{{ route('admin.alunos.edit', $aluno->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Atualizar</a>
                                    <form action="{{ route('admin.alunos.destroy', $aluno->id) }}" method="POST" onsubmit="return confirm('Confirma exclusão?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Remover</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $alunos->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
