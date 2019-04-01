@extends('layouts.manage')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Register Student Form</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="create_book_form">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Student Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Enter Student Name" class="form-control"><small class="form-text text-muted">Please Enter Full Student Name</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">IC Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email-input" name="ic" placeholder="Enter IC Number" class="form-control"><small class="help-block form-text">Please enter new IC Number</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Form</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="password-input" name="form" placeholder="" class="form-control"><small class="help-block form-text"></small></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="create_book_form">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>  
    
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
