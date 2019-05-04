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
        <h5>Rekod Sirkulasi Sekarang</h5>
        <hr>

    	<div class="row">
    		<div class="col-md-12">
        		<div class="card">
					<div class="card-body">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>id</th>
									<th>Judul Buku</th>
                                    <th>Peminjam</th>
                                    <th>Direkod Oleh</th>
                                    <th>Tarikh Pinjam</th>
								</tr>
							</thead>
							<tbody>
					
								@forelse ($books as $key => $book)

								<tr>
									<td>{{ $key+1 }}</th>
									<td>{{ $book->book->title }}</td>
                                    <td>{{ $book->student->name }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>{{ $book->created_at->format('d/m/Y') }}</td>
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
