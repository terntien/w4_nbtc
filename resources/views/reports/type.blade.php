@extends('layouts.head')
@section('content')
<div class="content-wrapper">
        <section class="content">
            <div class="row row-main">
                <div class="col-md-12 logo text-center">
                    <img src="../assets/image/NBTC.png" alt="logonbtc">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-lg-12 connectedSortable">
                            <div class="offset-1 col-md-10">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">ประเภทการแจ้งปัญหา </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                        @if(session()->get('success'))
                                            <div class="alert alert-success">
                                            {{ session()->get('success') }}  
                                            </div>
                                        @endif
                                            <form method="POST" action="{{ route('problem.store') }}">
                                           
                                            @csrf
                                                <div class="card-body ">
                                                    <div class="form-group">
                                                        <label for="name">หัวข้อปัญหาเกี่ยวกับเสา</label>
                                                        <input type="text" class="form-control" name="name" placeholder="กรุณาเพิ่มข้อมูล" required>
                                                    </div>
                                                </div>
                                                
                                                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                                
                                            </form>
                                        </div>
                                        @method('PATCH') 
                                         @foreach($problem as $row)
                                            <div class="form-group">
                                                <label for="report_tower">หัวข้อปัญหาเกี่ยวกับเสา :</label>
                                                {{ $row->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
@endsection