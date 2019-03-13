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
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                @foreach ($books as $book)
                <tr>
                  <th>{{$book->id}}</th>
                  <td>{{$book->isbn}}</td>
                  <td>{{$book->title}}</td>
                  <td>{{$book->author}}</td>
                  <td class="has-text-right">
                    <a class="button is-outlined m-r-5" href="{{route('users.show', $book->id)}}">View</a>
                    <a class="button is-light" href="{{route('users.edit', $book->id)}}">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
