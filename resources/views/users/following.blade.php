@extends('layouts.compose')

@section('content')
    <div class="profile_1 mb-1">
        <a href="javascript:history.back()"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($all_users as $user)
                @if (Auth::user()->isFollowing($user->id))
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
                                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
