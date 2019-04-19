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
                    <li class="active">Senarai Pelajar</li>
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
            			<strong class="card-title">Senarai Pelajar yang sudah didaftar</strong>
        			</div>
        			<div class="card-body">
            			<table class="table">
                  			<thead>
								<tr>
									<th> # </th>
									<th>Name</th>
									<th>IC</th>
									<th>Form</th>
									<th></th>
								</tr>
                			</thead>
							<tbody>
							
							@forelse ($students as $key => $student)

								<tr>
									<td> {{ $key+1 }}  </td>
									<td> {{ $student->name }} </td>
									<td> {{ $student->ic }} </td>
									<td> {{ $student->form }} </td>
									<td class="has-text-right">
										<a class="btn btn-primary btn-sm m-r-5" href="{{route('students.show', $student->ic)}}">View</a>
										<a class="btn btn-success btn-sm" href="{{route('students.edit', $student->ic)}}">Edit</a>
										<form method="POST" action="{{route('students.destroy', $student->ic)}}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda pasti ?');">Delete</button>
										</form>
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
		<div class="row justify-content-center">
			{{ $students->links( "pagination::bootstrap-4") }}
		</div>
  	</div><!-- .animated -->
</div><!-- .content -->
@endsection
