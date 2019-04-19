@extends('layouts.manage')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bahagian Pelajar</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Maklumat Pelajar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>View Student Details</h3>
                            <a href="{{route('students.edit', $student->id)}}" class="text-right"><i class="fa fa-user-plus m-r-10"></i> Edit this User</a>
                        </div>
                        <hr>
                        <form action="{{route('students.update', $student->ic)}}" method="POST">
                            
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nama Pelajar</label>
                                <div class="col-12 col-md-12">
                                    <input type="text" name="name" class="form-control" value="{{$student->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nombor IC</label>
                                <div class="col-12 col-md-12">
                                    <input type="text" name="ic" class="form-control" value="{{$student->ic}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Tingkatan</label>
                                <div class="col-12 col-md-12" >
                                    <input type="text" name="form" class="form-control" value="{{$student->form}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12 col-md-12" >
                                    <hr>
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                    <button type="submit" class="btn btn-primary btn-sm m-r-5">Update</button>
                                    <a class="btn btn-success btn-sm" href="{{route('students.edit', $student->ic)}}">Edit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
