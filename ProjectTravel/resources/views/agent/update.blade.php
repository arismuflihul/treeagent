@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Update Agent</h5>
                </div>
                <div class="modal-body">
                    <form action="update" method="POST">
                    {{csrf_field()}}
                    <!-- {{ method_field('PUT') }} -->
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="nama" value="{{$agent->nama}}" class="form-control" id="nama" placeholder="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Laki-laki" @if($agent->gender == 'Laki-laki') selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($agent->gender == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control"  name="alamat" id="alamat" rows="3">{{$agent->alamat}}</textarea required>
                        </div>
                        
                        <div class="modal-footer">
                            <a href="/ProjectTravel/agent" class="btn btn-secondary" >Close</a>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection