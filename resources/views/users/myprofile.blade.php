@extends('layouts.compose')

@section('content')
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    <div class="container">
        <form action="/" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                @csrf
                <textarea type="form-control" name="tweet"></textarea>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>
            <div class="row mt-2 justify-content-center">
                <input type="file" name="image_file" accept="image/png, image/jpeg">
            </div>
            <div class="row justify-content-center mt-3">
                <input type="submit" value="Tweet" class="btn btn-outline-primary">
            </div>
        </form>
    </div>

<div class="profile mb-3">
    <div class="row ml-3">
        <p class="mb-0"><div class="arial_black"><b>{{ $userID->name }}</div></p>
    </div>
    <div class="row ml-3">
        <p class="mb-0"><div class="arial_black_1"><b>{{ $userID->profile }}</div></p>
    </div>
    <div class="row mr-2 mb-2 justify-content-end">
        <a href="{{ route('user_edit', ['user_id' => $userID->id]) }}"><i class="fas fa-user-edit fa-lg"></i></a>
    </div>
</div>

<div class="row mt-4 mb-3 justify-content-center">
    <a href="{{ route('following_user', ['user_id' => $userID->id]) }}" class="follow mr-3">フォロー</a>
    <a href="{{ route('followed_user', ['user_id' => $userID->id]) }}" class="follow ml-3">フォロワー</a>
</div>

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($items as $item)
                <div class="card">
                    <div class="card-header">
                        <div class="row ml-1 d-flex flex-column">
                            <p class="mb-0">{{ $item->user->name }}</p>
                        </div>
                        <div class="row mt-1 ml-1 d-flex flex-column">
                            <p class="mb-0">{{ $item->tweet }}</p>
                        </div>
                        <div class="row mr-1 d-flex justify-content-end"> 
                            <div class="mr-1">
                            @if (Auth::user()->isFavorite($item->id))
                                <form action="{{ route('unfavorite', ['tweet' => $item->id]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-heart"></i></button>
                                </form>
                            @else
                                <form action="{{ route('favorite', ['tweet' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="far fa-heart"></i></button>
                                </form>
                            @endif
                            </div>
                            <div class="ml-2">
                                {{ \App\Http\Controllers\TweetController::Favorite_number($item->id) }}
                            </div>
                            @if (Auth::id() == $item->user_id)
                            <div class="ml-4">
                                <form action="{{ route('remove', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            @endif
                            <div class="ml-4 mt-1">
                                <a href="{{ route('tweet_show', ['id' => $item->id]) }}"><i class="fas fa-info-circle fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('footer')
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-in-alt fa-lg"></i>　ログアウト
    </a>
    <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

