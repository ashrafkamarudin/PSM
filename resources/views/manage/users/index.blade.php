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
        			<div class="card-header">
            			<strong class="card-title">Data Table</strong>
        			</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Date Created</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
					
								@forelse ($users as $key => $user)

								<tr>
									<th>{{$key+1}}</th>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>
										@forelse ($user->roles as $role)
											<a href="#" class="badge badge-light">
												{{$role->display_name}}
											</a>
										@empty
											<p>This user has not been assigned any roles yet</p>
										@endforelse
									</td>
									<td>{{$user->created_at->toFormattedDateString()}}</td>
									<td class="has-text-right">
										<a class="btn btn-primary btn-sm m-r-5" href="{{route('users.show', $user->id)}}">View</a>
										<a class="btn btn-success btn-sm" href="{{route('users.edit', $user->id)}}">Edit</a>
									</td>
								</tr>
								
								@empty
								
								@endforelse
							</tbody>
						</table>
					</div>
        		</div>
    		</div>
    	</div>
	</div><!-- .animated -->
</div><!-- .content -->
@endsection
