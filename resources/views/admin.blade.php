@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        {{ $user->id }}
        {{ $user->user_id }}
        {{ $user->user_name }}
        {{ $user->email }}
        {{ $user->role }}
        {{ $user->secret_question_id }}
        {{ $user->secret_answer }}
        {{ $user->created_at }}
        {{ $user->updated_at }}
        <br>
    @endforeach
    <br>
    @foreach ($articles as $article)
        {{ $article->id }}
        {{ $article->user_id }}
        {{ $article->title }}
        {{ $article->description }}
        {{ $article->hash1_id }}
        {{ $article->hash2_id }}
        {{ $article->hash3_id }}
        {{ $article->created_at }}
        {{ $article->updated_at }}
        <br>
    @endforeach
    @foreach ($comments as $comment)
        {{ $comment->id }}
        {{ $comment->user_id }}
        {{ $comment->article_id }}
        {{ $comment->detail }}
        {{ $comment->created_at }}
    <br>
    @endforeach
@endsection
