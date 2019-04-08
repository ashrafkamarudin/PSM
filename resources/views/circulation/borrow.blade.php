@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1> Borrow Book </h1>
            <hr>

            <div class="row">
                <div class="col-lg-12">

                    <form method="POST" action="{{ route('search') }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">IC Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="std_ic" placeholder="Enter IC Number">
                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" name="book_isbn" placeholder="Enter Book's ISBN">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" value="Search">
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
                            <h5 class="card-title">List of Books</h5>
                            <h6 class="card-subtitle mb-2 text-muted">The books that are already registered to be borrowed</h6>
                                
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    

                                    @forelse ($books as $book)
                                    <tr>
                                        
                                        <td scope="col">  {{ $book->isbn }} </td>
                                        <td scope="col">First</td>
                                        <td scope="col">Last</td>
                                        <td scope="col">Handle</td>
                                    <tr>
                                    @empty
                                        
                                    @endforelse

                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>

    </div>
</div>
@endsection
