@extends('layouts.master')

@section('content')

<div class="container">
  <div class="bg-white p-3 text-dark">
  	<h2>Judul: {{$article->judul}}</h2>
    <p>Slug: {{$article->slug}}</p>
    <br>
    <p>{{$article->isi}}</p>
    @foreach($tag_setelah as $tag)
    <a href="" class="btn btn-info"> {{$tag}} </a>
    @endforeach
  </div> 
    <a href="/artikel" class="btn btn-primary w-100 mt-3">back</a>      
</div>

@endsection