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
                <div class="card-header">Bonus: {{ Auth::user()->name }}</div>
                    <div class="card-body">
                    
                        <table class="table table-bordered">
            <thead>
                <tr align="center">
                    <th scope="col">No</th>
                    <!-- <th scope="col">Id</th> -->
                    <th scope="col">Dari Agent</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Bonus</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Masuk Tanggal</th>
                
                </tr>
            </thead>
            <tbody>
            @php 
            $i=1; 
            $tot = 0;
           
            @endphp
            @foreach ($pendapatan as $cos)
            <!-- //Total Bonus -->
            @php $tot += $cos->hasil @endphp
                <tr align="center">
                    <th scope="row">{{$i++}}.</th>
                    <!-- <td>{{$cos->user_id}}</td> -->
                    <td>{{$cos->nameagent}}</td>
                    <td><span class="badge badge-success">{{$cos->ket}}</span></td>
                    <td><button type="button" class="btn btn-outline-dark">{{$cos->diskon}} %</button></td>
                    <td>Rp. {{number_format($cos->hasil,2,',','.')}}</td>
                    <td>{{$cos->created_at}}</td>
                </tr>
                @endforeach
                <tr align="center">
                    <th colspan="3" style="text-align:center"><b>Total</b></th>
                    <td></td>
                    <td><button type="button" class="btn btn-outline-dark">Rp. {{number_format($tot,2,',','.')}}</button></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection