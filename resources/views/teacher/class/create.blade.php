@extends('teacher.layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
<div  class="col-lg-12 grid-margin mb-8 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create</h4>

        <form action="{{ route('classes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control @error('detail')is-invalid @enderror" name="detail" value="{{ old('detail') }}">
                        @error('detail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
