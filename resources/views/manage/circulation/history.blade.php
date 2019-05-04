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

                        <div class="col-md-3">
                            Rekod Sehingga
                            <h2 class="title">{{ \Carbon\Carbon::today()->toFormattedDateString() }}</h2>
                        </div>
                        <div class="col-md-3">
                            Jumlah Rekod
                            <h3 class="title text-center">{{ $records->count() }}</h3>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('circulation-history.filter')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Rekod untuk Bulan :</label>
                                    <div class="col-12 col-md-12">
                                        
                                        <div class="input-group">
                                            <select class="form-control" name="date">
                                                <option selected="true" disabled="disabled"> -- Pilih -- </option>
                                                @foreach ($recordDates as $date)
                                                    <option>{{ $date }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <input type="submit" class="btn btn-outline-secondary" value="Cari">
                                                <!-- <button class="btn btn-outline-secondary" type="button">Search</button> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <h5>Rekod Sirkulasi Terdahulu</h5>
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
					
								@forelse ($records as $key => $record)

								<tr>
									<td>{{ $key+1 }}</th>
									<td>{{ $record->book->title }}</td>
                                    <td>{{ $record->student->name }}</td>
                                    <td>{{ $record->user->name }}</td>
                                    <td>{{ $record->created_at->format('d/m/Y') }}</td>
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
			{{ $records->links( "pagination::bootstrap-4") }}
		</div>
	</div><!-- .animated -->
</div><!-- .content -->
@endsection
