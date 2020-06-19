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
                                        <h3 class="card-title">การแจ้งปัญหาเกี่ยวกับเสา </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                         @if(session()->get('success'))
                                            <div class="alert alert-success">
                                            {{ session()->get('success') }}  
                                            </div>
                                        @endif
                                    
                                            <table class="table" width="70%">
                                                <thead>
                                                    <tr>
                                                    <th>วันที่</th>
                                                    <th>ปัญหาเสา</th>
                                                    <th>รายละเอียด</th>
                                                    <th>ผู้แจ้งปัญหา</th>
                                                    <th>ที่อยู่</th>
                                                    <th colspan = 3>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($report as $row)
                                                    <tr> 
                                                        <td>{{$row->date}}</td>
                                                        <td>{{$row->problem}}</td>
                                                        <td>{{$row->detail}}</td>
                                                        <td>{{$row->user}}</td>
                                                        <td>{{$row->address}}</td>
                                                        
                                                        <td id="btn" style="width: 20px">
                                                            <form action="{{ route('reports.destroy', $row->id)}}" method="POST">
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