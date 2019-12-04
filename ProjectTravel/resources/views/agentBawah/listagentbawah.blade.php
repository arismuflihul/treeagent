@extends('layouts.header')

@section('content')

<div class="container">
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
    <div class="row">
        <div class="col-6">
            <h1>Daftar Agent:</h2>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Kode Referal</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($agent as $agent)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $agent->nama }}</td>
                    <td>{{ $agent->gender }}</td>
                    <td>{{ $agent->kodereferal }}</td>
                    <td>{{ $agent->alamat }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection