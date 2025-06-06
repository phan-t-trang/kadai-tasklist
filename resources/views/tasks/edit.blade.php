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
            <h2 class="text-lg">id: {{ $task->id }} のタスク編集ページ</h2>
        </div>

        <div class="flex justify-center">
            <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="w-1/2">
                @csrf
                @method('PUT')

                    <div class="form-control my-4">
                        <label for="content" class="label">
                            <span class="label-text">Task:</span>
                        </label>
                        <input type="text" name="content" value="{{ $task->content }}" class="input input-bordered w-full">
                    </div>

                <button type="submit" class="btn btn-primary btn-outline">更新</button>
            </form>
        </div>

    </body>
</html>
