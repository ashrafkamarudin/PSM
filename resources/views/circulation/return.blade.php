@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1> Return Book </h1>
            <hr>

            <div class="row">
                <div class="col-lg-12">

                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Book's ID">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Search</button>
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
                            <h6 class="card-subtitle mb-2 text-muted">The books that will be returned</h6>
                                
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
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
