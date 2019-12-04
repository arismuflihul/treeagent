@extends('layouts.header')

@section('content')

<div class="container">
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Costumer:</div>
                    <div class="card-body">
                    
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Kode Referal</th>
                                <th scope="col">Alamat</th>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection