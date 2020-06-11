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
              <li class="breadcrumb-item active">กฎหมายที่เกี่ยวข้อง</li>
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
                  <h3 class="card-title">กฎหมายที่เกี่ยวข้อง</h3>
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
                <form method="POST" action="{{ route('laws.store') }}">
                @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="heading">หัวเรื่องกฎหมายที่เกี่ยวข้อง :</label>
                      <input type="text" class="form-control" name="heading" placeholder="หัวเรื่องกฎหมาย" required>
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
                    <h3 class="card-title">ข้อมูลกฎหมายที่เกี่ยวข้อง</h3>
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
                            <th>หัวเรื่องกฎหมายที่เกี่ยวข้อง</th>
                            <th>URL</th>
                            <th colspan = 3>Actions</th>
                           </tr>
                           </thead>
                                                
                           <tbody>
                           @foreach($law as $law)
                             <tr> 
                                <td style="width: 180px">{{$law->heading}}</td>
                                <td style="width: 180px">{{$law->url}}</td>
                                                       
                                
                                <td id="btn" style="width: 20px">                        
                                  <a href="{{ route('laws.edit',$law->id)}}" class="btn btn-primary">Edit</a>                           
                                </td>                       
                                <td id="btn" style="width: 20px">                      
                                  <form action="{{ route('laws.destroy', $law->id)}}" method="POST">
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


