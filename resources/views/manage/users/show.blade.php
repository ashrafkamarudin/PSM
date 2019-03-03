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
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">View User Details</h3>
            </div>
            <hr>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$user->name}}</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static"><pre>{{$user->email}}</pre></p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">
                    <ul>
                      @forelse ($user->roles as $role)
                        <li>{{$role->display_name}} ({{$role->description}})</li>
                      @empty
                        <p>This user has not been assigned any roles yet</p>
                      @endforelse
                    </ul>
                  </p>
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
