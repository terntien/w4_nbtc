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
                            <div class="col-md-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Dashboard </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                         @if(session()->get('success'))
                                            <div class="alert alert-success">
                                            {{ session()->get('success') }}  
                                            </div>
                                        @endif
                                    
                                            <table class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                    <th>รหัสใบอนุญาต</th>
                                                    <th>เครือข่าย</th>
                                                    <th>เครือข่ายร่วม</th>
                                                    <th>จังหวัด</th>
                                                    <th>รหัสไปรษณีย์ </th>
                                                    <th>วันที่ขอใบอนุญาต</th>
                                                    <th colspan = 3>เพิ่มเติม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tower as $row)
                                                    <tr> 
                                                        <td style="width: 180px">{{$row->towers_license_code}}</td>
                                                        <td style="width: 180px">{{$row->namecus}}</td>
                                                        <td style="width: 180px">{{$row->namenet}}</td>
                                                        <td style="width: 180px">{{$row->towers_pravince}}</td>
                                                        <td style="width: 180px">{{$row->towers_code}}</td>
                                                        <td style="width: 180px">{{$row->towers_license_date}}</td>
                                                        <td style="width: 20px"> 
                                                            <a href="{{ route('towers.show',$row->id)}}">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td id="btn" style="width: 20px">
                                                            <a href="{{ route('towers.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                                                        </td>
                                                        <td id="btn" style="width: 20px">
                                                            <form action="{{ route('towers.destroy', $row->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn" type="submit"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px; color:#C0392B;"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                   
                                        </div>
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