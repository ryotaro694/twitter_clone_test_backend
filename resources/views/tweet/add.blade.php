@extends('layouts.compose')
@section('content')
    <form action="/tweet/add" method="post">
        <table>
            @csrf
            <tr><th>ツイート</th><td><textarea type="form-control" name="tweet"></textarea></td>
        </table>
        <input type="submit" value="ツイートする">
    </form>
@endsection

@section('footer')
神野凌太郎
@endsection
