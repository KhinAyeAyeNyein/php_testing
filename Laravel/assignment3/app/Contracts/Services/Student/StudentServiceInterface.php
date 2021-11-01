<?php

    namespace App\Contracts\Services\Student;

    use Illuminate\Http\Request;

    /**
     * Interface for student service
     */
    interface StudentServiceInterface
    {
        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveStudent(Request $request);

        /**
         * To get student list
         * @return array $studentList list of students
         */
        public function getStudentList();

        /**
         * To delete student by id
         * @param string $id student id
         * @param string $deletedStudentId deleted student id
         * @return string $message message for success or not
         */
        public function deleteStudentById($id);

        /**
         * To get student by id
         * @param string $id student id
         * @return Object $student student object
         */
        public function getStudentById($id);

        /**
         * To update student by id
         * @param Request $request request with inputs
         * @param string $id Student id
         * @return Object $student Student Object
         */
        public function updatedStudentById(Request $request, $id);

        /**
         * To upload csv file for student
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadStudentCSV($validated);

        /**
         * To download student csv file
         */
        public function downloadStudentCSV();

        /**
         * To save student via API
         * @param array $validated Validated values from request
         * @return Object created student object
         */
        public function saveStudentAPI($validated);

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList list of marks
         */
        public function search($data1, $data2);
    }

    

?>