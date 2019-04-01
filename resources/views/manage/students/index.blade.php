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
                  <th></th>
                  <th>Name</th>
                  <th>IC</th>
                  <th>Form</th>
                  <th></th>
                </tr>
              </thead>

              @forelse ($students as $student)

                <tr>
                    <td>  </td>
                    <td> {{ $student->name }} </td>
                    <td> {{ $student->ic }} </td>
                    <td> {{ $student->form }} </td>
                    <td class="has-text-right">
                        <a class="button is-outlined m-r-5" href="{{route('users.show', $student->id)}}">View</a>
                        <a class="button is-light" href="{{route('users.edit', $student->id)}}">Edit</a>
                    </td>
                </tr>
                  
              @empty
                  
              @endforelse

              <tbody> 
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
