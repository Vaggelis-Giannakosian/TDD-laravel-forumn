@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">
                            {{ $thread->creator->name }}
                        </a>
                        posted
                        {{ $thread->title }}
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @auth
           <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('replies.store',$thread) }}">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="body">Post your reply here!</label>
                            <textarea placeholder="Have something to say?" name="body" rows="3" id="body"  class="form-control"></textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
        @endauth
    </div>
@endsection