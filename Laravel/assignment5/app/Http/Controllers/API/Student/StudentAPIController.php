<?php

    namespace App\Http\Controllers\API\Student;

    use App\Contracts\Services\Student\StudentServiceInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\StudentCreateAPIRequest;
    use App\Http\Requests\StudentEditAPIRequest;
    use App\Http\Requests\UploadRequest;
    use Illuminate\Http\JsonResponse;

    class StudentAPIController extends Controller
    {
        /**
         * student interface
         */
        private $studentInterface;
        /**
         * Create a new controller instance.
         * @param StudentServiceInterface $studentServiceInterface
         * @return void
         */
        public function __construct(StudentServiceInterface $studentServiceInterface)
        {
            $this->studentInterface = $studentServiceInterface;
        }
        /**
         * To show student list
         *
         * @return Response json with Student list
         */
        public function showStudentList()
        {
            $studentList = $this->studentInterface->getStudentList();
            return response()->json($studentList);
        }
        /**
         * To delete student by id
         * @param string $studentid student id
         * @return Response message
         * @return View student list
         */
        public function deleteStudentById($studentId)
        {
            // $msg = $this->studentInterface->deleteStudentById($studentId);
            // return response($msg, 204);
            $msg = $this->studentInterface->deleteStudentById($studentId);
            return response(['message' => $msg]);
            //return redirect()->route('studentList');
        }

        /**
         * To create student via API
         * @param StudentCreateRequest $request request via API
         * @return Response json created user
         */
        public function createStudent(StudentCreateAPIRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            $student = $this->studentInterface->saveStudentAPI($validated);
            return response()->json($student);
        }

        /**
         * To Update student via API
         * @param StudentEditAPIRequest $request request via API
         * @param string $studentId student id
         * @return Response json updated student.
         */
        public function updateStudent(StudentEditAPIRequest $request, $studentId)
        {
            // validation for request values
            $validated = $request->validated();
            $student = $this->studentInterface->updatedStudentByIdAPI($validated, $studentId);
            return response()->json($student);
        }

        /**
         * To get student by id via API
         * @param string $studentId student id
         * @return Response json student object
         */
        public function getStudentById($studentId)
        {
            $student = $this->studentInterface->getStudentById($studentId);
            return response()->json($student);
        }

        public function uploadStudentCSVFile(UploadRequest $request)
        {
            $validated = $request->validated();
            $content = $this->studentInterface->uploadStudentCSV($validated);
            if (!$content['isUploaded']) {
                return response()->json(['error' => $content['message']], JsonResponse::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $content['message']]);
            }
        }
    }
?>
