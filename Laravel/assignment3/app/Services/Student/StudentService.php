<?php

    namespace App\Services\Student;

    use App\Contracts\Dao\Student\StudentDaoInterface;
    use App\Contracts\Services\Student\StudentServiceInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    /**
     * Service class for service.
     */
    class StudentService implements StudentServiceInterface
    {
        /**
         * service dao
         */
        private $serviceDao;
        /**
         * Class Constructor
         * @param StudentDaoInterface
         * @return
         */
        public function __construct(StudentDaoInterface $serviceDao)
        {
            $this->serviceDao = $serviceDao;
        }
        
        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveStudent(Request $request)
        {
            return $this->serviceDao->saveStudent($request);
        }

        /**
         * To get student list
         * @return array $studentList list of students
         */
        public function getStudentList()
        {
            return $this->serviceDao->getStudentList();
        }

        /**
         * To delete student by id
         * @param string $id student id
         * @param string $deletedStudentId deleted student id
         * @return string $message message for success or not
         */
        public function deleteStudentById($id)
        {
            return $this->serviceDao->deleteStudentById($id);
        }

        /**
         * To get student by id
         * @param string $id student id
         * @return Object $student student object
         */
        public function getStudentById($id)
        {
            return $this->serviceDao->getStudentById($id);
        }

        /**
         * To update student by id
         * @param Request $request request with inputs
         * @param string $id Student id
         * @return Object $student Student Object
         */
        public function updatedStudentById(Request $request, $id)
        {
            return $this->serviceDao->updatedStudentById($request, $id);
        }

        /**
         * To upload csv file for student
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadStudentCSV($validated)
        {
            $fileName = $validated['csv_file']->getClientOriginalName();
            Storage::putFileAs(config('path.csv') .
            config('path.separator'), $validated['csv_file'], $fileName);
            return $this->serviceDao->uploadStudentCSV($validated);
        }

        /**
         * To download student csv file
         * @return File Download CSV file
         */
        public function downloadStudentCSV()
        {
            $studentList = $this->serviceDao->getStudentList();
            $filename = "student.csv";
            //write csv file
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array('Name', 'roll_Number', 'Class', 'dob', 'created_at', 'updated_at'));

            foreach ($studentList as $row) {
            fputcsv($handle, array(
                $row->id, $row->name, $row->roll_Number, $row->Class,$row->Class,
                date('Y/m/d', strtotime($row->created_at)),
                date('Y/m/d', strtotime($row->updated_at)),
            ));
            }

            fclose($handle);

            $headers = array(
            'Content-Type' => 'text/csv',
            );

            return response()
            ->download($filename, $filename, $headers)
            ->deleteFileAfterSend();
        }

        /**
         * To save student via API
         * @param array $validated Validated values from request
         * @return Object created student object
         */
        public function saveStudentAPI($validated)
        {
            return $this->serviceDao->saveStudentAPI($validated);
        }

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList list of marks
         */
        public function search($data1, $data2)
        {
            return $this->serviceDao->search($data1, $data2);
        }
    }
?>
