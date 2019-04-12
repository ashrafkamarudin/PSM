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
                <a href="{{route('users.edit', $student->id)}}" class="text-right"><i class="fa fa-user-plus m-r-10"></i> Edit this User</a>
            </div>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Pelajar</label>
                <div class="col-12 col-md-12" style="background-color: #f8f9fa; border-radius: 3px;">
                  <p class="form-control-static"><pre>{{$student->name}}</pre></p>
                </div>
              </div>
              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nombor IC</label>
                <div class="col-12 col-md-12" style="background-color: #f8f9fa; border-radius: 3px;">
                  <p class="form-control-static"><pre>{{$student->ic}}</pre></p>
                </div>
              </div>
              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Tingkatan</label>
                <div class="col-12 col-md-12" style="background-color: #f8f9fa; border-radius: 3px;">
                  <p class="form-control-static"><pre>{{$student->form}}</pre></p>
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
