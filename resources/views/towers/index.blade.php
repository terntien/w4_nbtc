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
                                                    <th>ประเภทใบที่ตั้ง</th>
                                                    <th>กำลังส่ง</th>
                                                    <th>จังหวัด</th>
                                                    <th>Latitude</th>
                                                    <th>Longtitude </th>
                                                    <th colspan = 3>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tower as $tower)
                                                    <tr> 
                                                        <td style="width: 180px">{{$tower->towers_license_code}}</td>
                                                        <td style="width: 180px">{{$tower->towers_typeleaf}}</td>
                                                        <td style="width: 180px">{{$tower->towers_sending}}</td>
                                                        <td style="width: 180px">{{$tower->towers_pravince}}</td>
                                                        <td style="width: 180px">{{$tower->LATDEG}}</td>
                                                        <td style="width: 180px">{{$tower->LONGDEG}}</td>
                                                        <td style="width: 20px"> 
                                                            <a href="{{ route('towers.show',$tower->id)}}">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td id="btn" style="width: 20px">
                                                            <a href="{{ route('towers.edit',$tower->id)}}" class="btn btn-primary">Edit</a>
                                                        </td>
                                                        <td id="btn" style="width: 20px">
                                                            <form action="{{ route('towers.destroy', $tower->id)}}" method="POST">
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