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
                    <strong>User Update Form</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="edit_user_form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name:</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email:</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password:</label></div>
                            <div class="col-12 col-md-12">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="password_options" value="no_change" class="form-check-input">Do Not Change Password
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="password_options" value="manual" class="form-check-input">Manually Set New Password
										</label>
										<input type="text" class="input" name="password" placeholder="Manually give a password to this user">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
							<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Roles:</label></div>
                            <div class="col-12 col-md-12">
								<input type="hidden" name="roles" :value="rolesSelected" />
								
								<div class="form-check">

									@foreach ($roles as $role)
									<div class="radio">
										<label for="radio1" class="form-check-label ">
                                        <input type="radio" id="radio1" name="roles" value="{{$role->id}}" class="form-check-input" {{ $role->display_name == $user->roles->toArray()[0]['display_name'] ? 'checked' : '' }}>{{$role->display_name}}
										</label>
									</div>
									@endforeach
								</div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="edit_user_form">
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

@section('scripts')
  <script>

    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });

  </script>
@endsection
