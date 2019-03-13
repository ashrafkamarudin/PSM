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
              <h1 class="title">{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
              <h5>{{$role->description}}</h5>
                <a href="{{route('roles.edit', $role->id)}}" class="text-right"><i class="fa fa-user-plus m-r-10"></i> Edit this User</a>
            </div>
            <hr>
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permissions:</h1>
                  <ul>
                    @foreach ($role->permissions as $r)
                      <li>{{$r->display_name}} <em class="m-l-15">({{$r->description}})</em></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
