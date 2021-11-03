<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/student-create.css') }}" rel="stylesheet">

    <title>Create</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <h1 class="card-header">Create Student</h1>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right required" for="id">StudentID</label>
        <input class="form-control" type="text" name="id"> <br>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right required" for="name">Name</label>
    <input class="form-control" type="text" name="name"> <br>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right required" for="roll_Number">Roll_Number</label>
    <input class="form-control" type="text" name="roll_Number"> <br>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right required" for="class">Class</label>
    <input class="form-control" type="text" name="class"> <br>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="dob">Date of Birth</label>
    <input class="form-control" type="date" name="dob"> <br>
    </div>
    <button onclick="createPost()">Create</button>

    <script>
        function createPost() {
            var createdData = {
                id: $('[name=id]').val(),
                name: $('[name=name]').val(),
                roll_Number: $('[name=roll_Number]').val(),
                class: $('[name=class]').val(),
                dob: $('[name=dob]').val(),
            }

            $.ajax({
            url: "/api/students/create",
            type: 'POST',
            data: createdData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-vue/student");
                }
            });
        }
    </script>
</body>
</html>