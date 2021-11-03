<?php

    namespace App\Dao\Student;

    use App\Models\Students;
    use App\Contracts\Dao\Student\StudentDaoInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    /**
     * Data accessing object for student
     */
    class StudentDao implements StudentDaoInterface
    {

        /**
         * To save student that from api request
         * @param Request $request request with inputs
         * @return Object created student object
         */
        public function saveStudent(Request $request)
        {
            $student = new Students();
            $student->name = $request['name'];
            $student->roll_Number = $request['roll_Number'];
            $student->class = $request['class'];
            $student->dob = $request['dob'];
            $student->save();
            return $student;
        }
        
        /**
         * To get student by id
         * @param string $id student id
         * @return Object $student student object
         */
        public function getStudentById($id)
        {
            $student = Students::find($id);
            return $student;
        }

        /**
         * To Update Students with values from request
         * @param Request $request request including inputs
         * @return Object updated user object
         */
        public function updatedStudentById(Request $request, $id)
        {
            $student = Students::find($id);
            $student->name = $request['name'];
            $student->roll_Number = $request['roll_Number'];
            $student->class = $request['class'];
            $student->dob = $request['dob'];
            $student->save();
            return $student;
        }

        /**
         * To get student list
         * @return array $studentList Student list
         */
        public function getStudentList()
        {
            $studentList = Students::all();
            return $studentList;
        }

        /**
         * To delete student by id
         * @param string $id student id
         * @param string $deletedStudentId deleted student id
         * @return string $message message for success or not
         */
        public function deleteStudentById($id)
        {
            $student = Students::find($id);
            if ($student) {
                $student->delete();
                return 'Deleted Successfully!';
            }
            return 'Student Not Found!';
        }

        /**
         * To upload csv file for student
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadStudentCSV($validated)
        {
            $path =  $validated['csv_file']->getRealPath();
            $csv_data = array_map('str_getcsv', file($path));
            // save student to Database accoding to csv row
            foreach ($csv_data as $index => $row) {
            if (count($row) >= 2) {
                try {
                $student = new Students();
                $student->name = $row[0];
                $student->roll_Number = $row[1];
                $student->class = $row[2];
                $student->dob = $row[3];
                $student->save();
                } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                //error handling for duplicated student
                if ($errorCode == '1062') {
                    $content = array(
                    'isUploaded' => false,
                    'message' => 'Row number (' . ($index + 1) . ') is duplicated roll-number.'
                    );
                    return $content;
                }
                }
            } else {
                // error handling for invalid row.
                $content = array(
                'isUploaded' => false,
                'message' => 'Row number (' . ($index + 1) . ') is invalid format.'
                );
                return $content;
            }
            }
            $content = array(
            'isUploaded' => true,
            'message' => 'Uploaded Successfully!'
            );
            return $content;
        }

        /**
         * To save student via API
         * @param array $validated Validated values from request
         * @return Object created student object
         */
        public function saveStudentAPI($validated)
        {
            $student = new Students();
            $student->name = $validated['name'];
            $student->roll_Number = $validated['roll_Number'];
            $student->class = $validated['class'];
            // $student->dob = $validated['dob'];
            $student->save();
            return $student;
        }
        /**
         * To update student by id via api
         * @param array $validated Validated values from request
         * @param string $studentId Student id
         * @return Object $student Student Object
         */
        public function updatedStudentByIdAPI($validated, $studentId)
        {
            $student = Students::find($studentId);
            $student->name = $validated['name'];
            $student->roll_Number = $validated['roll_Number'];
            $student->class = $validated['class'];
            // $student->dob = $validated['dob'];
            $student->save();
            return $student;
        }

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $studentList student list
         */
        public function search($data1, $data2)
        {
            $studentList = DB::table('students as student')
            ->whereNull('student.deleted_at')
            ->where('created_at','>=', $data1)
            ->where('created_at','<=', $data2)
            ->get();
            return $studentList;
        }
    } 
?>