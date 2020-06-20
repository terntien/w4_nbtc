@extends('layouts.head')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">สำนักงาน กสทช. เขต 6 ขอนแก่น</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">แบบฟอร์มขอใบอนุญาต</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="offset-1 col-md-10">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">แบบฟอร์มขอใบอนุญาต</h3>
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
                <form method="POST" action="{{ route('licenses.store') }}">
                @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="heading">หัวเรื่องแบบฟอร์ม:</label>
                      <input type="text" class="form-control" name="heading" placeholder="หัวเรื่องแบบฟอร์ม" required>
                    </div>
                    <div class="form-group">
                      <label for="url">URL :</label>
                      <input type="text" class="form-control" name="url" placeholder="URL ข้อมูลเว็บ" required>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                  </div>
                </form>               
              </div>
            </div>
            <div class="offset-1 col-md-10">
              <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-text">ข้อมูลแบบฟอร์มขอใบอนุญาต</h3>
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
                            <th>หัวเรื่องแบบฟอร์ม</th>
                            <th>URL</th>
                            <th colspan = 3>Actions</th>
                           </tr>
                           </thead>
                                                
                           <tbody>
                           @foreach($license as $license)
                             <tr> 
                                <td style="width: 180px">{{$license->heading}}</td>
                                <td style="width: 180px">{{$license->url}}</td>
                                <td id="btn" style="width: 20px">                        
                                  <a href="{{ route('licenses.edit',$license->id)}}" class="btn btn-primary">Edit</a>                           
                                </td>                       
                                <td id="btn" style="width: 20px">                      
                                  <form action="{{ route('licenses.destroy', $license->id)}}" method="POST">
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
    </section>
  </div>
  
@endsection


