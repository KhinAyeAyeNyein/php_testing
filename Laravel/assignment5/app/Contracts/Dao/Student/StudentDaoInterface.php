<?php

    namespace App\Contracts\Dao\Student;

    use Illuminate\Http\Request;

    /**
     * Interface for Data Accessing Object of Student
     */
    interface StudentDaoInterface
    {
        /**
         * To save student that from api request
         * @param Request $request request with inputs
         * @return Object created student object
         */
        public function saveStudent(Request $request);

        /**
         * To get post by id
         * @param string $id post id
         * @return Object $post post object
         */
        public function getStudentById($id);

        /**
         * To Update Students with values from request
         * @param Request $request request including inputs
         * @return Object updated user object
         */
        public function updatedStudentById(Request $request, $id);

        /**
         * To get student list
         * @return array $studentList Student list
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
         * To upload csv file for student
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadStudentCSV($validated);

        /**
         * To save student via API
         * @param array $validated Validated values from request
         * @return Object created student object
         */
        public function saveStudentAPI($validated);
        /**
         * To update student by id via api
         * @param array $validated Validated values from request
         * @param string $studentId Student id
         * @return Object $student Student Object
         */
        public function updatedStudentByIdAPI($validated, $studentId);
        
        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList Mark list
         */
        public function search($data1, $data2);
    }
?>