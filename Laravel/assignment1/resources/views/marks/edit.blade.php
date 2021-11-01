@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/post-edit.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mark Edit') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="student_id"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Student_Id') }}</label>

                            <div class="col-md-6">
                                <input id="student_id" type="id"
                                    class="form-control @error('student_id') is-invalid @enderror" name="student_id"
                                    value="{{ old('student_id') }}" autocomplete="student_id" autofocus>

                                @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Myanmar"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Myanmar') }}</label>

                            <div class="col-md-6">
                                <input id="Myanmar" type="integer"
                                    class="form-control @error('Myanmar') is-invalid @enderror" name="Myanmar"
                                    autocomplete="Myanmar">{{ old('Myanmar') }}</input>
                                @error('Myanmar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="English"
                                class="col-md-4 col-form-label text-md-right required">{{ __('English') }}</label>
                            <div class="col-md-6">
                                <input id="English" type="integer"
                                    class="form-control @error('English') is-invalid @enderror" name="English"
                                    autocomplete="English">{{ old('English') }}</input>
                                @error('English')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Mathematics"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Mathematics') }}</label>
                            <div class="col-md-6">
                                <input id="Mathematics" type="integer"
                                    class="form-control @error('Mathematics') is-invalid @enderror" name="Mathematics"
                                    autocomplete="Mathematics">{{ old('Mathematics') }}</input>
                                @error('Mathematics')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Chemistry"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Chemistry') }}</label>
                            <div class="col-md-6">
                                <input id="Chemistry" type="integer"
                                    class="form-control @error('Chemistry') is-invalid @enderror" name="Chemistry"
                                    autocomplete="Chemistry">{{ old('Chemistry') }}</input>
                                @error('Chemistry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Physics"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Physics') }}</label>
                            <div class="col-md-6">
                                <input id="Physics" type="integer"
                                    class="form-control @error('Physics') is-invalid @enderror" name="Physics"
                                    autocomplete="Physics">{{ old('Physics') }}</input>
                                @error('Physics')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Biology"
                                class="col-md-4 col-form-label text-md-right required">{{ __('Biology') }}</label>
                            <div class="col-md-6">
                                <input id="Biology" type="integer"
                                    class="form-control @error('Biology') is-invalid @enderror" name="Biology"
                                    autocomplete="Biology">{{ old('Biology') }}</input>
                                @error('Biology')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    {{ __('Clear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection