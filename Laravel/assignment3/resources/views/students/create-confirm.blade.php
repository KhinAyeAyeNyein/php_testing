@extends('layouts.app')
@section('content')
<!-- Styles -->
<link href="{{ asset('css/post-create-confirm.css') }}" rel="stylesheet">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

    <!-- <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{  url('students/list/') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                        <a class="cancel-btn btn btn-secondary"
                            onClick="window.history.back()">{{ __('Cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

      <div class="card">
        <div class="card-header">Confirm Post</div>
        <div class="card-body">
          <form method="POST" action="{{ route('students.create.confirm') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="roll_Number" class="col-md-4 col-form-label text-md-right required">{{ __('Roll_Number') }}</label>

              <div class="col-md-6">
                <textarea id="roll_Number" type="text" class="form-control @error('roll_Number') is-invalid @enderror" name="roll_Number" autocomplete="roll_Number">{{ old('roll_Number') }}</textarea>
                @error('roll_Number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="class" class="col-md-4 col-form-label text-md-right required">{{ __('Class') }}</label>

              <div class="col-md-6">
                <textarea id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" autocomplete="class">{{ old('class') }}</textarea>
                @error('class')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

              <div class="col-md-6">
                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" readonly="readonly">

                @error('dob')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Confirm') }}
                </button>
                <a class="cancel-btn btn btn-secondary" onClick="window.history.back()">{{ __('Cancel') }}</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection