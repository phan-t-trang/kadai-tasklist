<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TaskBoard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    </head>

    <body>


        <div class="prose ml-4">
            <h2>id = {{ $task->id }} のタスク詳細ページ</h2>
        </div>

        <table class="table w-full my-4">
            <tr>
                <th>id</th>
                <td>{{ $task->id }}</td>
            </tr>

            <tr>
                <th>タスク</th>
                <td>{{ $task->content }}</td>
            </tr>
        </table>
        <a class="btn btn-outline" href="{{ route('tasks.edit', $task->id) }}">このタスクを編集</a>

        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="my-2">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-error btn-outline"
                onclick="return confirm('id = {{ $task->id }} のタスクを削除します。よろしいですか？')">削除</button>
        </form>
        </div>

    </body>
</html>
