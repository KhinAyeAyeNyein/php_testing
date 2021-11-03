/**
 * To set data table
 */
$(document).ready(function() {
    const studentTable = $("#student-list").DataTable({
        sDom: "lrtip"
    });

    $("#search-click").click(function() {
      studentTable.search($("#search-keyword").val()).draw();
    });
});

/**
 * To show student detail
 * @param {Object} studentInfo studentinfo
 * @returns void
 */
function showStudentDetail(studentInfo) {
    $("#student-detail #student-name").text(studentInfo.name);
    $("#student-detail #student-roll_Number").text(studentInfo.roll_Number);
    $("#student-detail #student-class").text(studentInfo.class);
    $("#student-detail #student-dob").text(moment(studentInfo.dob).format("YYYY/MM/DD"));
    $("#student-detail #student-created-at").text(
        moment(studentInfo.created_at).format("YYYY/MM/DD")
    );
    $("#student-detail #student-updated-at").text(
        moment(studentInfo.updated_at).format("YYYY/MM/DD")
    );
    $("#student-detail #student-updated-student").text(studentInfo.updated_student);
}

/**
 * To show student delete confirm
 * @param {Object} studentInfo studentInfo
 * @returns void
 */
function showDeleteConfirm(studentInfo) {
    $("#student-delete #student-id").text(studentInfo.id);
    $("#student-delete #student-name").text(studentInfo.name);
    $("#student-delete #student-roll-Number").text(studentInfo.roll_Number);
    $("#student-delete #student-class").text(studentInfo.class);
    $("#student-delete #student-dob").text(studentInfo.dob);
}

/**
 * To delete student by id
 * @returns void
 */
async function deleteStudentById(csrf_token) {
    axios
            .delete(`/students/delete/${this.userInfo.id}`)
            .then(response => {
                location.reload();
            })
            .catch(err => {
                console.log(err);
            });
        this.isDeleteDialog = false;
        this.dialog = false;
    await $.ajax({
        url: "/students/delete/" + $("#student-delete #student-id").text(),
        type: "DELETE",
        data: {
            _token: csrf_token
        },
        dataType: "text",
        success: function(result) {
            console.log(result);
            location.reload();
        }
    });
}
