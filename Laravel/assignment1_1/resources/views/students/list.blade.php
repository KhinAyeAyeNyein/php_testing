@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/student-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/student-list.js') }}"></script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Student List') }}</div>
        <div class="card-body">
          <div class="row search-bar">        
            <a class="btn btn-primary header-btn" href="/student/create">{{ __('Create') }}</a>
            <a class="btn btn-primary header-btn" href="/student/upload">{{ __('Upload') }}</a>
            <a class="btn btn-primary header-btn" href="/student/download">{{ __('Download') }}</a>
          </div>
          <table class="table table-hover table-responsive" id="student-list">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th class="header-cell" scope="col">Name</th>
                <th class="header-cell" scope="col">Roll Number</th>
                <th class="header-cell" scope="col">Class</th>
                <th class="header-cell" scope="col">Date of Birth</th>
                <th class="header-cell" scope="col">Operation1</th>
                <th class="header-cell" scope="col">Operation2</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($studentList as $student)
              <tr>
                <td>{{$student->id}}</td>
                <td>
                  <a class="student-name" onclick="showStudentDetail({{json_encode($student)}})" data-toggle="modal" data-target="#student-detail-popup">{{$student->name}}</a></td>
                <td>{{$student->roll_Number}}</td>
                <td>{{$student->class}}</td>
                <td>{{date('Y/m/d', strtotime($student->dob))}}</td>
                <td><a type="button" class="btn btn-primary" href="/student/edit/{{$student->id}}">Edit</a></td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="showDeleteConfirm({{json_encode($student)}})" data-toggle="modal" data-target="#delete-confirm">Delete</button>
                </td>
              </tr>
              <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="student-delete">
                      <h4 class="delete-confirm-header">Are you sure to delete student?</h4>
                      <div class="col-md-12">
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="student-id"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="student-name"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Roll_Number') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="student-roll-Number"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="student-class"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('DOB') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="student-dob"></i>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ url('students/list/'.$student->id) }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
          <div class="modal fade" id="student-detail-popup" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ __('Student Detail') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="student-detail">
                  <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-6">
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="student-name"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Roll Number') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="student-roll-number"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="student-class"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Date of Birth') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="student-dob"></i>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Confirm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="student-delete">
                  <h4 class="delete-confirm-header">Are you sure to delete student?</h4>
                  <div class="col-md-12">
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="student-id"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="student-name"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Roll_Number') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="student-roll-Number"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="student-class"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('DOB') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="student-dob"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="deleteStudentById({{json_encode(csrf_token())}})" type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection