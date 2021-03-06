@extends('layouts.compose')

@section('content')
    <div class = "d-flex justify-content-end flex-grow-1">
        <div class = "md-1 mr-2">
            <p class="mb-0">フォロー：{{ $follow_count }}</p>
        </div>
        <div class = "md-1 mr-4">
            <p class="mb-0">フォロワー：{{ $follower_count }}</p>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
        
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user->name }}</p>
                            </div>
                            @if (Auth::user()->isFollowed($user->id))
                                <div class="px-2">
                                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                                </div>
                            @endif
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (Auth::user()->isFollowing($user->id))
                                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                    @csrf

                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
