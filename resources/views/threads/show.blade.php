@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->user->name }}</a>
                    posted:
                    {{ $thread->title }}
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($thread->replies as $reply)
            @include ('threads.reply')
            @endforeach
        </div>
    </div>
    @if(auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <form action="{{ route('reply.store', [$thread->channel->slug, $thread->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="5" placeholder="Have something to say?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Reply</button>
            </form>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <p>Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
        </div>
    </div>
    @endif
</div>
@endsection
