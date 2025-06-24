<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-6 py-12">

        <div class="max-w-xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 text-center">
                Criar Novo Aluno
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

            <form action="{{ route('admin.alunos.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Nome</label>
                    <input id="name" name="name" type="text" required
                        value="{{ old('name') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Email</label>
                    <input id="email" name="email" type="email" required
                        value="{{ old('email') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="password" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Senha</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Confirmar Senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="matricula" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Matrícula</label>
                    <input id="matricula" name="matricula" type="text" required
                        value="{{ old('matricula') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="curso" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Curso</label>
                    <input id="curso" name="curso" type="text" required
                        value="{{ old('curso') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label for="data_nascimento" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Data de Nascimento</label>
                    <input id="data_nascimento" name="data_nascimento" type="date" required
                        value="{{ old('data_nascimento') }}"
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700
                               text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition">
                        Criar Aluno
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
