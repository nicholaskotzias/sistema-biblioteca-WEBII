<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livros Mais Emprestados</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h2>Relatório: Livros Mais Emprestados</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Total de Empréstimos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->total_emprestimos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
