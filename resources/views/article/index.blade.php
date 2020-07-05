@extends('layouts.master')

@section('content')

<div class="container">        
	<a href="/artikel/create" class="btn btn-success mb-4">Buat Artikel Baru!!</a>
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>No</th>
        <th>judul</th>
        <th>Tag</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($articles as $key => $article)

      <tr>
        <td> {{$key + 1}} </td>
		<td> {{$article->judul}} </td>
		<td> {{$article->tag}} </td>
		<td>
			<a href="artikel/{{$article->id}}" class="btn btn-info">Lihat</a>
			<a href="artikel/{{$article->id}}/edit" class="btn btn-light">Edit</a>
      <form action="/artikel/{{$article->id}}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>    
      </form>
		</td>
      </tr>

    @endforeach
    </tbody>
  </table>
</div>

@endsection

@push('scripts')

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    });
</script>

@endpush