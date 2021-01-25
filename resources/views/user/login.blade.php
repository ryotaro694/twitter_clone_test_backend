@extends('layouts.compose')
@section('content')
    <form action="/user/login" method="post">
        <table>
            @csrf
            <tr><th>メールアドレス：</th><td><input type="text" name="email"></td></tr>
            <tr><th>パスワード：</th><td><input type="text" name="password"></td></tr>            
        </table>
        <input type="submit" value="ログイン">
    </form>
@endsection

@section('footer')
神野凌太郎
@endsection
