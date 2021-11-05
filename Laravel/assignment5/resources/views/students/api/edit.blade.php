<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <!-- Script -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <title>Edit</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <h1>Edit Post</h1>
    <label for="id">StudentID</label><input type="text" name="id"> <br>
    <label for="name">Name</label><input type="text" name="name"> <br>
    <label for="roll_Number">Roll_Number</label><input type="text" name="roll_Number"> <br>
    <label for="class">Class</label><input type="text" name="class"> <br>
    <label for="dob">Date of Birth</label><input type="date" name="dob"> <br>
    <button onclick="editPost()">Edit</button>

    <script>
        var studentID = window.location.pathname.split('/')[3];
        $.ajax({
        url: "/api/students/" + studentID,
        type: 'GET',
        dataType: 'json', // added data type
            success: function(res) {
                $('[name=id]').val(res.id);
                $('[name=name]').val(res.name);
                $('[name=roll_Number]').val(res.roll_Number);
                $('[name=class]').val(res.class);
                $('[name=dob]').val(res.dob);
            }
        });
        function editPost() {
            var editedData = {
                id: $('[name=id]').val(),
                name: $('[name=name]').val(),
                roll_Number: $('[name=roll_Number]').val(),
                class: $('[name=class]').val(),
                dob: $('[name=dob]').val(),
            }

            $.ajax({
            url: "/api/students/edit/" + studentID,
            type: 'POST',
            data: editedData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-vue/student");
                }
            });
        }
    </script>
</body>
</html>