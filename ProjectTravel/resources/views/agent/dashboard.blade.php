@extends('layouts.header')

@section('content')


@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
    



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Agent: {{ Auth::user()->name }}</div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary float-left mb-3" data-toggle="modal" data-target="#exampleModalScrollable">
                            Add New
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="agent/create" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="nama" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea required>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                        </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Kode Referal</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach ($agent as $agent)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{  $agent->nama  }}</td>
                                    <td>{{  $agent->gender  }}</td>
                                    <td><button type="button" class="btn btn-outline-secondary">{{  $agent->kodereferal }}</button></td>
                                    <td>{{  $agent->alamat  }}</td>
                                    <td>
                                        
                                    <a href="agent/{{$agent->id}}/viewUpdate" class="btn btn-warning btn-sm">Update</a>
                                    <a href="agent/{{$agent->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus')">Delete</a>
                                    <a href="agent/{{$agent->id}}/listagent" class="btn btn-success btn-sm">Show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">MyData</div>

                    <ul></ul>
                    <ul>Nama    : {{ Auth::user()->name }}</ul>
                    <ul>Gender  :</ul>
                    <ul>Alamat  :</ul>
                    <ul>Kode    :</ul>
                    <ul></ul>   
                <div class="card-body">
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection