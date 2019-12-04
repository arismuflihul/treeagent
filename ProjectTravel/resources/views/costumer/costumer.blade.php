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
            <h1>Data Costumer: {{ Auth::user()->name }}</h1>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Costumer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="costumer/createv2" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">E-mail</label>
                            <input type="email" name="email" class="form-control" id="nama" placeholder="E-mail" required>
                        </div>
                        <!--<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option>--Please Select--</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="gender" name="status">
                                <option>--Please Select--</option>
                                <option>Lajang</option>
                                <option>Menikah</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pekerjaan</label>
                            <select class="form-control" id="gender" name="status">
                                <option>--Please Select--</option>
                                <option>Wiraswasta</option>
                                <option>Guru</option>
                                <option>Pegawai</option>
                                <option>Lainnya</option>
                            </select>
                        </div>-->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Harga</label>
                            <select class="form-control" id="harga" name="harga">
                                <option>--Please Select--</option>
                                <option>2500000</option>
                                
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
                <th scope="col">Tempat, Tgl Lahir</th>
                <th scope="col">Gender</th>
                <th scope="col">Status</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Harga</th>
                <th scope="col">Alamat</th>
                <!-- <th scope="col">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($costumer as $cos)
                <tr>
                    <th scope="row">-</th>
                    <td>{{$cos->nama}}</td>
                    <td>{{$cos->tempatlahir, $cos->tgllahir}}</td>
                    <td>{{$cos->gender}}</td>
                    <td>{{$cos->status}}</td>
                    <td>{{$cos->pekerjaan}}</td>
                    <td>{{number_format($cos->harga,2,',','.')}}</td>
                    <td>{{$cos->alamat}}</td>
                    <!-- <td>
                        
                    <a href="costumer/{{$cos->id}}/viewUpdate" class="btn btn-warning btn-sm">Update</a>
                    <a href="costumer/{{$cos->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus')">Delete</a>
                    <a href="costumer/{{$cos->id}}/viewUpdate" class="btn btn-success btn-sm">See</a>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
