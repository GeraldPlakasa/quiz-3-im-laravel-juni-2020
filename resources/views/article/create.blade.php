@extends('layouts.master')

@section('content')

<div class="container">        
	<form action="/artikel" method="post">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" name="judul" placeholder="Masukan judul">
    </div>
    <div class="form-group">
      <label for="content">Isi:</label>
      <textarea class="form-control" id="content" rows="50" name="isi"></textarea>
    </div>
    <div class="form-group">
      <label for="tag">Tag:</label>
      <p style="font-size: 13px; font-style: italic;">Pisahkan dengan koma: html,css,javascript</p>
      <input type="text" class="form-control" name="tag" placeholder="(Optional)" id="tag">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
