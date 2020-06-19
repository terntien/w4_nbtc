@extends('layouts.head')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                        สำนักงาน กสทช. เขต 6 ขอนแก่น</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลเครือข่ายร่วม</li>
                        </ol>
                    </div>
                </div>
            </div>  
        </div>

        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-ticodetle">เครือข่ายร่วม</h3>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form method="POST" action="{{ route('networks.update', $network->id) }}">
                        @method('PATCH') 
                        @csrf
                            <div class="card-body ">
                                <div class="form-group col-md-12">
                                    <label for="code">รหัสเครือข่ายร่วม :</label>
                                    <input type="text" class="form-control" name="codenet" value="{{ $network->codenet }}" required>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="name">เครือข่ายร่วม :</label>
                                    <input type="text" class="form-control" name="namenet" value="{{ $network->namenet }}" require>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
      </div>
@endsection