<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Assignment 4</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <a class="btn btn-primary header-btn" href="/api-vue/mark/create">Create</a>
    <table class="table table-hover table-responsive">
        <thead>
            <th class="header-cell" scope="col">Student ID</th>
            <th class="header-cell" scope="col">Myanmar</th>
            <th class="header-cell" scope="col">English</th>
            <th class="header-cell" scope="col">Mathematics</th>
            <th class="header-cell" scope="col">Chemistry</th>
            <th class="header-cell" scope="col">Physics</th>
            <th class="header-cell" scope="col">Biology</th>
        </thead>
        <tbody></tbody>
    </table>
    <script>
        $.ajax({
            url: "/api/marks/list",
            type: "GET",
            dataType: "json", 
            success: function(res) {
                res.forEach(mark => {
                    $('tbody').append(
                        `<tr>
                            <td>${mark.student_id}</td>
                            <td>${mark.Myanmar}</td>
                            <td>${mark.English}</td>
                            <td>${mark.Mathematics}</td>
                            <td>${mark.Chemistry}</td>
                            <td>${mark.Physics}</td>
                            <td>${mark.Biology}</td>
                            <td>
                            <a class="btn btn-primary" href="/api-vue/mark/${mark.id}/edit">Edit</a>
                            <button class="btn btn-danger" onclick="deletePost(${mark.id})">Delete</button>
                            </td>
                        </tr>`
                    );
                });
            }
        });
        
        function deletePost(id) {
            if(confirm("Are you sure you want to delete")) {
                $.ajax({
                url: `/api/marks/delete/${id}`,
                type: 'DELETE',
                success: function(result) {
                    // confirm("Are you sure you want to delete");
                    location.reload();
                },
                error: function(result) {
                    alert("fail");
                }
                });
            }
        }
    </script>
</body>
</html>