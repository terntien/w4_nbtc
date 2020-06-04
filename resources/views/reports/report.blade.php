@extends('layouts.head')
@section('content')
  <!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">แจ้งปัญหาเกี่ยวกับเสา</li>
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
                            <h3 class="card-title">แจ้งปัญหาเกี่ยวกับเสา</h3>
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
                        <form method="POST" action="{{ route('reports.store') }}">
                        @csrf
                            <div class="card-body ">
                                <div class="form-group">
                                    <label>ปัญหาที่พบ :</label>
                                    <select class="form-control report_select" name="report_select" id="report_select">
                                        <option value="">เลือกผู้ให้บริการ</option>
                                            @foreach($list as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="report_user">ชื่อผู้แจ้ง</label>
                                    <input type="text" class="form-control" name="user" placeholder="กรุณาเพิ่มข้อมูล" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">ที่อยู่</label>
                                    <input type="text" class="form-control" name="address" placeholder="กรุณาเพิ่มข้อมูล" required>
                                </div>
                                <div class="form-group">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea class="form-control" name="detail"  rows="5"></textarea>                                
                                </div>
                                <div class="form-group">
                                    <label for="date">วัน/เดือน/ปี</label>
                                    <input type="date" class="form-control" name="date" placeholder="กรุณาเพิ่มDate" required>
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

