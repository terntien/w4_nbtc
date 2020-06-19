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
                        <form method="POST" action="{{ route('towers.store') }}">
                        @csrf
                            <div class="card-body ">
                        
                                 <div class="form-group">
                                    <label>ผู้ให้บริการ :</label>
                                    <select class="form-control customer_select" name="customer_select" id="customer_select">
                                        <option value="">เลือกผู้ให้บริการ</option>
                                        @foreach($list as $row)
                                            <option value="{{$row->id}}">{{$row->namecus}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <label>เครือข่ายร่วม :</label>
                                    <select class="form-control network_select" name="network_select" id="network_select">
                                    <option value="">เลือกเครือข่ายร่วม</option>
                                        @foreach($nets as $row)
                                            <option value="{{$row->id}}">{{$row->namenet}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="towers_parish">ตำบล</label>
                                    <input type="text" class="form-control" name="towers_parish" placeholder="กรุณาเพิ่มตำบล" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_district">อำเภอ</label>
                                    <input type="text" class="form-control" name="towers_district" placeholder="กรุณาเพิ่มอำเภอ" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_pravince">จังหวัด</label>
                                    <input type="text" class="form-control" name="towers_pravince" placeholder="กรุณาเพิ่มจังหวัด" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_code">รหัสไปรษณีย์</label>
                                    <input type
                                    ="text" class="form-control" name="towers_code" placeholder="กรุณาเพิ่มรหัสไปรษณีย์" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_code">รหัสใบอนุญาต</label>
                                    <input type="text" class="form-control" name="towers_license_code" placeholder="กรุณาเพิ่มรหัสใบอนุญาต" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_date">วันขอใบอนุญาต</label>
                                    <input type="date" class="form-control" name="towers_license_date" placeholder="กรุณาเพิ่มDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_typeleaf">ประเภทใบตั้ง</label>
                                    <input type="text" class="form-control" name="towers_typeleaf" placeholder="กรุณาเพิ่มประเภทใบที่ตั้ง" required>
                                </div>
                                <div class="form-group">
                                    <label for="towers_sending">กำลังส่ง</label>
                                    <input type="text" class="form-control" name="towers_sending" placeholder="กรุณาเพิ่มกำลังส่ง" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="LATDEG">Latitude</label>
                                        <input type="text" class="form-control" name="LATDEG" placeholder="องศา" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="LONGDEG">Longitude</label>
                                        <input type="text" class="form-control" name="LONGDEG" placeholder="องศา" require>
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

