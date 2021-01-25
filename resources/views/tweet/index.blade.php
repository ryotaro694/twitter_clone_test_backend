@extends('layouts.compose')

@section('content')
    <div>
    <form action="/" method="post">
        <table>
            @csrf
            <tr><th>ツイート</th><td><textarea type="form-control" name="tweet"></textarea></td>
            <input type="hidden" name="user_id" value="{{ $user_id }}"></td>
        </table>
        <input type="submit" value="send">
    </form>
    </div>
    <table>
    @csrf
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->tweet}}</td>
            <td>{{$item->user_id}}</td>
            <td><a href="/tweet/edit?id={{$item->id}}"><i class="far fa-edit"></i></a></td>
            <td><a href="/tweet/delete?id={{$item->id}}">削除</a></td>
        </tr>
    @endforeach
    </table>
@endsection

@section('footer')
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        ログアウト
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
    @csrf
@endsection
