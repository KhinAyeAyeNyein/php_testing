@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mark-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/mark-list.js') }}"></script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Mark List') }}</div>
        <div class="card-body">
          <div class="row search-bar">
            <a class="btn btn-primary header-btn" href="/mark/add">{{ __('Add') }}</a>
            <a class="btn btn-primary header-btn" href="/mark/upload">{{ __('Upload') }}</a>
            <a class="btn btn-primary header-btn" href="/mark/download">{{ __('Download') }}</a>
          </div>
          <table class="table table-hover table-responsive" id="mark-list">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th class="header-cell" scope="col">student_id</th>
                <th class="header-cell" scope="col">Myanmar</th>
                <th class="header-cell" scope="col">English</th>
                <th class="header-cell" scope="col">Mathematics</th>
                <th class="header-cell" scope="col">Chemistry</th>
                <th class="header-cell" scope="col">Physics</th>
                <th class="header-cell" scope="col">Biology</th>
                <th class="header-cell" scope="col">Operation1</th>
                <th class="header-cell" scope="col">Operation2</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($markList as $mark)
              <tr>
                <td>{{$mark->id}}</td>
                <td>{{$mark->student_id}}</td>
                <td>{{$mark->Myanmar}}</td>
                <td>{{$mark->English}}</td>
                <td>{{$mark->Mathematics}}</td>
                <td>{{$mark->Chemistry}}</td>
                <td>{{$mark->Physics}}</td>
                <td>{{$mark->Biology}}</td>
                <td><a type="button" class="btn btn-primary" href="/mark/edit/{{$mark->id}}">Edit</a></td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="showDeleteConfirm({{json_encode($mark)}})" data-toggle="modal" data-target="#delete-confirm">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      
          <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Confirm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="mark-delete">
                  <h4 class="delete-confirm-header">Are you sure to delete mark?</h4>
                  <div class="col-md-12">
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-id"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-name"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Roll_Number') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-roll-number"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-class"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Phone') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-phone"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('DOB') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="mark-dob"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="deleteMarkById({{json_encode(csrf_token())}})" type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection