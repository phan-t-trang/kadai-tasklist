@extends('layouts.app')

@section('content')
    @if(isset($task))
        <h2>id = {{ $task->id }} のタスク詳細ページ</h2>

        <table class="table w-full my-4">
            <tr>
                <th>id</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $task->status }}</td>
            </tr>
            <tr>
                <th>タスク</th>
                <td>{{ $task->content }}</td>
            </tr>
        </table>
        @if (Auth::id() == $task->user_id)
            {{-- 投稿削除ボタンのフォーム --}}
            <a class="btn btn-outline" href="{{ route('tasks.edit', $task->id) }}">このタスクを編集</a>
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error btn-sm normal-case"
                    onclick="return confirm('Delete id = {{ $task->id }} ?')">Delete</button>
            </form>
        @endif
        </div>
    @else
        <p>タスク情報が見つかりません。</p>
    @endif
@endsection