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
									<th>isbn</th>
									<th>title</th>
									<th>Author</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
					
								@forelse ($books as $key => $book)

								<tr>
									<td>{{$book->id}}</th>
									<td>{{$book->isbn}}</td>
									<td>{{$book->title}}</td>
									<td>{{$book->author}}</td>
									<td class="has-text-right">
										<div class="row">
											<a class="btn btn-primary btn-sm" href="{{route('books.show', $book->isbn)}}" title="View Student"><i class="ti-eye"></i></a>
											<a class="btn btn-success btn-sm" href="{{route('books.edit', $book->isbn)}}" title="Edit Student"><i class="ti-pencil"></i></a>
											<form method="POST" action="{{route('books.destroy', $book->isbn)}}">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda pasti ?');" title="Delete Book"><i class="ti-trash"></i></button>
											</form>
										</div>
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
			{{ $books->links( "pagination::bootstrap-4") }}
		</div>
	</div><!-- .animated -->
</div><!-- .content -->
@endsection
