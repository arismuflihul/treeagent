@extends('layouts.header')

@section('content')
<div class="container">
<div class="row">
        <div class="col-6">
            <h1>Daftar Agent: {{ Auth::user()->name }}</h2>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalScrollable">
            Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                
                <div class="modal-body">
                    <form action="agentbawah/create" method="POST">
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

            
        
<table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Gender</th>
                <th scope="col">Kode Referal</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
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
                    <td>
                        
                    <a href="" class="btn btn-warning btn-sm">Update</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus')">Delete</a>
                    <a href="agentbawah/{{$agent->id}}/listagentbawah" class="btn btn-success btn-sm">See</a>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection