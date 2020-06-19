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
                        <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                        @method('PATCH') 
                        @csrf
                            <div class="card-body ">
                                <div class="form-group col-md-12">
                                    <label for="name">ชื่อสถานที่ :</label>
                                    <input type="text" class="form-control" name="namecontact" value="{{ $contact->namecontact }}" required>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="address">ที่อยู่ :</label>
                                    <textarea type="text" class="form-control" name="address" rows="3" value="{{ $contact->address }}" require >{{ $contact->address }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="area">พื้นที่ความรับผิดชอบ :</label>
                                    <textarea type="text" class="form-control" name="area" rows="2" value="{{ $contact->area }}" require >{{ $contact->area }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="phone">หมายเลขโทรศัพท์ :</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" require>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="tel">โทรสาร :</label>
                                    <input type="text" class="form-control" name="tel" value="{{ $contact->tel }}" require>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="email">E-mail :</label>
                                    <input type="text" class="form-control" name="email" value="{{ $contact->email }}" require>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="web">website :</label>
                                    <input type="text" class="form-control" name="web" value="{{ $contact->web }}" require>
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