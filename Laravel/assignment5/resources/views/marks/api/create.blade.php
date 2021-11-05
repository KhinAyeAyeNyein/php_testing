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
    <label for="student_id">StudentID</label>
    <input type="text" name="student_id"> <br>
    <label for="Myanmar">Myanmar</label>
    <input type="text" name="Myanmar"> <br>
    <label for="English">English</label>
    <input type="text" name="English"> <br>
    <label for="Mathematics">Mathematics</label>
    <input type="text" name="Mathematics"> <br>
    <label for="Chemistry">Chemistry</label>
    <input type="text" name="Chemistry"> <br>
    <label for="Physics">Physics</label>
    <input type="text" name="Physics"> <br>
    <label for="Biology">Biology</label>
    <input type="text" name="Biology"> <br>

    <button onclick="createPost()">Create</button>

    <script>
        function createPost() {
            var createdData = {
                student_id: $('[name=student_id]').val(),
                Myanmar: $('[name=Myanmar]').val(),
                English: $('[name=English]').val(),
                Mathematics: $('[name=Mathematics]').val(),
                Chemistry: $('[name=Chemistry]').val(),
                Mathematics: $('[name=Physics]').val(),
                Chemistry: $('[name=Biology]').val(),
            }

            $.ajax({
            url: "/api/marks/create",
            type: 'POST',
            data: createdData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-vue/mark");
                }
            });
        }
    </script>
</body>
</html>