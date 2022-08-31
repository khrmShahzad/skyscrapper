@extends('teacher.layout.master')

@section('content')
<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Subject</a></li>
    <li class="breadcrumb-item active" aria-current="page">Subject </li>
  </ol>
</nav>

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Subject </h6>
          <a href="{{ route('subjects.create') }}">  <button style="float:right; margin-bottom:20px;" class="btn btn-primary" type="submit">Create</button> </a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
           @foreach($subjects as $subject)
              <tr>
               <td>{{ $subject->name }}
                </td>
                 <td class="float-right">
                   <a href="{{ route('subjects.edit',$subject) }}" class="btn btn-secondary  btn-block">Edit</a>
                   <form action="{{ route('subjects.destroy',$subject) }}" method="POST">
                       @csrf
                       @method('DELETE')
                      <button type="submit" class="btn btn-secondary btn-block mt-2 ">Delete</button>
                   </form>
                  </td>
              </tr>
          @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
