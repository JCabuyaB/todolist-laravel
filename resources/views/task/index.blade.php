<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO LIST</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container mt-3 d-flex flex-column align-items-center">
        <form class="w-50" action="{{ url('/task') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="task" class="form-label">Tarea</label>
                <input type="text" class="form-control" id="task" name="task">
                @error('task')
                    <div id="taskHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

        <table class="mt-5 w-50 table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tarea</th>
                    <th scope="col">Terminar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td scope="row">{{$task->taskname}}</td>
                        <td>
                            <form action="{{route('task.delete', $task)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Terminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
