@extends('teacher.layout.master')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
<div  class="col-lg-12 grid-margin mb-8 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create</h4>

        <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Class Name</label>
                        <select class="custom-select @error('class_id')is-invalid @enderror" name="class_id">
                           {{ Helper::getOptions('class_rooms','id','name') }}
                        </select>
                        @error('class_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Subject Name</label>
                        <select class="custom-select @error('subject_id')is-invalid @enderror" name="subject_id">
                           {{ Helper::getOptions('subjects','id','name') }}
                        </select>
                        @error('subject_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Timing</label>
                            <input type="time" class="form-control @error('timing')is-invalid @enderror" name="timing" value="{{ old('timing') }}">
                            @error('timing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Duration</label>
                            <select class="custom-select @error('duration')is-invalid @enderror" name="duration">
                              <option value="">Select Duration</option>
                              <option value="15">15 Minutes</option>
                              <option value="30">30 Minutes</option>
                              <option value="45">45 Minutes</option>
                              <option value="60">60 Minutes</option>
                            </select>
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Break & Teacher Meeting</label>
                            <input type="time" class="form-control @error('break_teacher_meeting')is-invalid @enderror" name="break_teacher_meeting" value="{{ old('break_teacher_meeting') }}">
                            @error('break_teacher_meeting')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>OFF</label>
                            <input type="time" class="form-control @error('off_day')is-invalid @enderror" name="off_day" value="{{ old('off_day') }}">
                            @error('off_day')
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
