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


        <div class="container mx-auto">
            <div class="prose ml-4">
                <h2 class="text-lg">タスク 一覧</h2>
            </div>

            @if (isset($tasks))
                <table class="table table-zebra w-full my-4">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>タスク</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td><a class="link link-hover text-info" href="{{ route('tasks.show', $task->id) }}">{{ $task->id }}</a></td>
                            <td>{{ $task->content }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            {{-- タスク作成ページへのリンク --}}
            <a class="btn btn-primary" href="{{ route('tasks.create') }}">新規タスクの投稿</a>
        </div>

    </body>
</html>