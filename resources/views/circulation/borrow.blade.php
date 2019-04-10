@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1> Pinjam Buku </h1>
            <hr>

            <div class="row">
                <div class="col-lg-12">

                    <form method="POST" action="{{ route('search.borrow') }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">IC Number</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="std_ic" 
                                    placeholder="Masukkan Nombor IC" 
                                    value="@if(!empty(Session::get('std_ic'))){{ Session::get('std_ic') }}@endif">
                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" name="book_isbn" placeholder="Masukkan Nombor ISBN Buku">
                            <input type="hidden" name="circulation_status" value="borrow">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" value="Tambah">
                                <!-- <button class="btn btn-outline-secondary" type="button">Search</button> -->
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
                            <h6 class="card-subtitle mb-2 text-muted">Senarai Buku yang akan dipinjam</h6>
                                
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

            <div class="row mt-3">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('circulation.store') }}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary float-right">Pinjam</button>
                    </form>
                    <a href=" {{ route('circulation.reset') }} " class="btn btn-default float-right">Padam</a>
                </div>
            </div>

    </div>
</div>
@endsection
