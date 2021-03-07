@extends('layouts.app')
@section('content')
  @foreach($posts as $key => $post)
    <label for="title">タイトル</label>
    <div class="title">
    @if(array_key_exists("title", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["title"] }}
    @endif
    </div>
    <label for="subtitle">サブタイトル</label>
    <div class="subtitle">
    @if(array_key_exists("subtitle", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["subtitle"] }}
    @endif
    </div>
    <label for="authors">著者</label>
    <div class="authors">
    @if(array_key_exists("authors", $post["volumeInfo"]) && array_key_exists(0, $post["volumeInfo"]["authors"]) && array_key_exists(1, $post["volumeInfo"]["authors"]))
      {{ $post["volumeInfo"]["authors"][0] }}・
      {{ $post["volumeInfo"]["authors"][1] }}
    @endif
    </div>
    <label for="publisher">出版社</label>
    <div class="publisher">
    @if(array_key_exists("publisher", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["publisher"] }}
    @endif
    </div>
    <label for="publishedDate">出版日</label>
    <div class="publishedDate">
    @if(array_key_exists("publishedDate", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["publishedDate"] }}
    @endif
    </div>
    <label for="description">本紹介</label>
    <div class="description">
    @if(array_key_exists("description", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["description"] }}
    @endif
    </div>
    <label for="categories">カテゴリー</label>
    <div class="categories">
    @if(array_key_exists("categories", $post["volumeInfo"]))
      {{ $post["volumeInfo"]["categories"][0] }}
    @endif
    </div>
    <label for="title">表紙</label>
    <div class="book-image">
    @if(array_key_exists("imageLinks", $post["volumeInfo"]))
      <img src={{ $post["volumeInfo"]["imageLinks"]["smallThumbnail"] }} width="100px" height="100px">
    @endif
    </div>
  @endforeach
@endsection