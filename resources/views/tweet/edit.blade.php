@extends('layouts.compose')
@section('content')
    <form action="/tweet/update" method="post">
        <table>
            @csrf
            <input type="hidden" name="tweet_id" value="{{$form->id}}"></td>
            <input type="hidden" name="user_id" value="{{$form->user_id}}"></td>
            <tr><th>ツイート</th><td><input type="form-control" name="tweet" value="{{$form->tweet}}"></td></tr>
        </table>
        <input type="submit" value="完了">
    </form>
@endsection

@section('footer')
神野凌太郎
@endsection
