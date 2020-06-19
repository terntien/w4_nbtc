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
                        <li class="breadcrumb-item active">เพิ่มข้อมูลเสาสัญญาณ</li>
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
                            <h3 class="card-title">เพิ่มข้อมูลเสาสัญญาณ</h3>
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
                        <form method="POST" action="{{ route('towers.update', $tower->id) }}">
                        @method('PATCH') 
                        @csrf
                            <div class="card-body ">
                                <div class="form-group">
                                    <label>ผู้ให้บริการ :</label>
                                    <select class="form-control" name="customer_select">

                                        @foreach($list as $row)
                                            <option value="{{ $row->id }}" {{$row->id == $tower->towers_customer  ? 'selected' : ''}}>  
                                                {{$row->codecus}} : {{$row->namecus}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                            
                                <div class="form-group">
                                    <label>เครือข่ายร่วม :</label>
                                    <select class="form-control" name="network_select">
                                    
                                        @foreach($nets as $row)
                                            <option value="{{ $row->id }}" {{$row->id == $tower->towers_network  ? 'selected' : ''}}>  
                                                {{$row->codenet}} : {{$row->namenet}}</option>
                                        @endforeach
                             
                                    </select>
                            
                                </div>
                                <div class="form-group">
                                    <label for="towers_parish">ตำบล</label>
                                    <input type="text" class="form-control" name="towers_parish" value="{{ $tower->towers_parish }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_district">อำเภอ</label>
                                    <input type="text" class="form-control" name="towers_district" value="{{ $tower->towers_district }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_pravince">จังหวัด</label>
                                    <input type="text" class="form-control" name="towers_pravince" value="{{ $tower->towers_pravince }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_code">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" name="towers_code" value="{{ $tower->towers_code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_code">รหัสใบอนุญาต</label>
                                    <input type="text" class="form-control" name="towers_license_code" value="{{ $tower->towers_license_code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_date">วันขอใบอนุญาต</label>
                                    <input type="date" class="form-control" name="towers_license_date" value="{{ $tower->towers_license_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_typeleaf">ประเภทใบตั้ง</label>
                                    <input type="text" class="form-control" name="towers_typeleaf" value="{{ $tower->towers_typeleaf }}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_sending">กำลังส่ง</label>
                                    <input type="text" class="form-control" name="towers_sending" value="{{ $tower->towers_sending }}" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="LATDEG">Latitude</label>
                                        <input type="text" class="form-control" name="LATDEG" value="{{ $tower->LATDEG }}" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="LONGDEG">Longitude</label>
                                        <input type="text" class="form-control" name="LONGDEG" value="{{ $tower->LONGDEG }}" require>
                                    </div>
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