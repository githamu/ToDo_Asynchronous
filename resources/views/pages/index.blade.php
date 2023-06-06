<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <title>ToDoリストを作りたい!</title>
</head>
<body>

    <h1>{{ $todo['head'] }}</h1>

    <form id="sendTodo">

        @csrf
        <p>{{ $todo['inputText'] }} <input type="text" name="text"></p>
        <h3 id="textErrorMessage" class="alerts"></h3>

        <p>{{ $todo['priority'] }} <input type="number" name="priority" onkeydown="return false" min="1" max="10"></p>
        <h3 id="priorityErrorMessage" class="alerts"></h3>

        <input type="submit" name="inputButton" value="{{ $todo['inputButton'] }}" class="button">
    
    </form>

    <table id="todoList">

        <tr>
            <th>id</th>
            <th>text</th>
            <th>priority</th>
            <th>delete</th>
            <th>check</th>
        </tr>

        @if ($todoList->isNotEmpty())
        @foreach ($todoList as $todo)
        <tr class="lists">

            <td>
                {{ $todo->id }}
            </td>

            <td>
                {{ $todo->text }}
            </td>

            <td>
                {{ $todo->priority }}
            </td>

            <td>
                <input type="button" name="deleteButton" value="削除" class="delete" data-id="{{ $todo->id }}">
            </td>

        </tr>
        @endforeach
        @endif

    </table>

    <script src="{{ asset('js/todo.js') }}"></script>
</body>
</html>