@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div id="printThis">
                <h1> Resit Pinjaman Buku </h1>
                <hr>

                <div class="row">
                    <div class="col-lg-12">

                        <form id="borrow_form" method="POST" action="{{ route('circulation.store') }}">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tarikh Transaksi </label>
                                <div class="col-sm-09">
                                    <input 
                                        type="text" 
                                        class="form-control-plaintext" 
                                        value=": {{ \Carbon\Carbon::today()->format('d/m/Y') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Peminjam </label>
                                <div class="col-sm-09">
                                    <input 
                                        type="text" 
                                        class="form-control-plaintext" 
                                        value=": {{ $student['name'] }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombor IC </label>
                                <div class="col-sm-09">
                                    <input 
                                        type="text" 
                                        class="form-control-plaintext"
                                        value=": {{ $student['ic'] }}">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Senarai Buku</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Senarai Buku yang dipinjam</h6>
                                    
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ISBN #</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">Penerbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($books as $book)
                                        <tr>
                                            <td scope="col"> {{ $book->isbn }} </td>
                                            <td scope="col"> {{ $book->title }} </td>
                                            <td scope="col"> {{ $book->author }} </td>
                                            <td scope="col"> {{ $book->publisher }} </td>
                                        <tr>
                                        @empty
                                        <tr>
                                            <td scope="col" colspan="4"> Sila tambah buku </td>
                                        <tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <button onclick="printDiv('printThis')" class="btn btn-primary float-right">Print</button>
                    <a href=" {{ route('circulation.reset') }} " class="btn btn-default float-right">Padam</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
function printDiv(divName){
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
</script>    
@endsection
