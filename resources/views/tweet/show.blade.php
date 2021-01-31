@extends('layouts.compose')
@section('content')
<div class="profile_1 mb-1">
    <a href="javascript:history.back()"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
</div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            @if (Auth::id() == $form->user_id)
                            <div class="row ml-1 d-flex flex-column">
                                {{ $form->user->name }}</br>
                                （{{ $form->created_at->format('Y/m/d/s')}}）
                            </div>
                            @else
                            <div class="row ml-1 d-flex flex-column">
                                <a href="{{ route('show', ['user_id' => $form->user_id]) }}">{{ $form->user->name }}</a>
                                （{{ $form->created_at->format('Y/m/d/s')}}）
                            </div>
                            @endif
                            <div class="row mt-3 ml-1 d-flex flex-column">
                                <p class="mb-0">{{ $form->tweet }}</p>
                            </div>
                            <div class="row mr-1 d-flex justify-content-end"> 
                                <div class="mr-1">
                                @if (Auth::user()->isFavorite($form->id))
                                    <form action="{{ route('unfavorite', ['tweet' => $form->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-heart"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('favorite', ['tweet' => $form->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary btn-sm">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>
                                @endif
                                </div>
                                <div class="ml-2">
                                    {{ \App\Http\Controllers\TweetController::Favorite_number($form->id) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($form->image_file)
                    <div class="row mt-3 ml-1 d-flex flex-column">
                        <img src="{{ Storage::url($form->image_file) }}" width=100%;/>
                    </div>
                    @endif
            </div>
        </div>
    </div>
@endsection

