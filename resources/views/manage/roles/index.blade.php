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
      <div class="col-lg-12">

          <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Role</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">

        @foreach ($roles as $role)

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-user"></i><strong class="card-title pl-2">{{$role->display_name}}</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">{{$role->name}}</h5>
                <p class="location text-sm-center">
                  {{$role->description}}
                </p>
              </div>
              <hr>
              <div class="card-text text-sm-center">
                <a href="{{route('roles.show', $role->id)}}" class="btn btn-primary">Details</a>
                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-secondary">Edit</a>
              </div>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
