@extends('layouts.manage')

@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
      <div class="page-header float-left">
          <div class="page-title">
              <h1>User Details</h1>
          </div>
      </div>
  </div>
  <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li class="active">User Details</li>
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
              <h1 class="title">View Permission Details</h1>
                <a href="{{route('permissions.edit', $permission->id)}}" class="text-right"><i class="fa fa-user-plus m-r-10"></i> Edit this User</a>
            </div>
            <hr>
            <article class="media">
              <p>
                <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
                <br>
                {{$permission->description}}
              </p>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
