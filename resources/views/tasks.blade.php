<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background-color: #ffffff;
            margin-bottom: 10px;
        }
        .task-item .task-title {
            display: flex;
            align-items: center;
        }
        .task-item .task-title input[type="checkbox"] {
            margin-right: 10px;
        }
        .task-item .task-title.text-muted {
            text-decoration: line-through;
            color: #adb5bd;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">ToDo List</h1>

    <form action="/task" method="post" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nova tarefa" name="title" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Adicionar</button>
            </div>
        </div>
    </form>

    <div>
        @foreach($tasks as $task)
            <div class="task-item">
                <div class="task-title {{ $task->completed ? 'text-muted' : '' }}">
                    <form action="/task/{{ $task->id }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        <span>{{ $task->title }}</span>
                    </form>
                </div>
                <form action="/task/{{ $task->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
