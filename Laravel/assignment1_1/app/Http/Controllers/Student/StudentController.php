<?php

    namespace App\Http\Controllers\Student;

    use App\Contracts\Services\Student\StudentServiceInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\StudentCreateRequest;
    use App\Http\Requests\StudentEditRequest;
    use App\Http\Requests\StudentUploadRequest;
    use Illuminate\Http\Request;


    class StudentController extends Controller
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
         * To show create student view
         * 
         * @return View create student
         */
        public function showStudentCreateView()
        {
            return view('students.create');
        }

        /**
         * To check student create form and redirect to confirm page.
         * @param StudentCreateRequest $request Request form student create
         * @return View student create confirm
         */
        public function submitStudentCreateView(StudentCreateRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            return redirect()
                ->route('students.create.confirm')
                ->withInput();
        }

        /**
         * To show student create confirm view
         *
         * @return View student create confirm view
         */
        public function showStudentCreateConfirmView()
        {
            if (old()) {
            return view('students.create-confirm');
            }
            return redirect()->route('studentList');
        }

        /**
         * To submit student create confirm view
         * @param Request $request
         * @return View student list
         */
        public function submitStudentCreateConfirmView(Request $request)
        {
            $student = $this->studentInterface->saveStudent($request);
            return redirect()->route('studentList');
        }

        /**
         * To show student list
         *
         * @return View Student list
         */
        public function showStudentList()
        {
            $studentList = $this->studentInterface->getStudentList();
            return view('students.list', compact('studentList'));
        }

        /**
         * To delete student by id
         * @param string $studentid student id
         * @return View student list
         */
        public function deleteStudentById($studentId)
        {
            // $msg = $this->studentInterface->deleteStudentById($studentId);
            // return response($msg, 204);
            $msg = $this->studentInterface->deleteStudentById($studentId);
            return redirect()->route('studentList');
        }

        /**
         * Show student edit
         * 
         * @return View student edit
         */
        public function showStudentEdit($studentId)
        {
            $student = $this->studentInterface->getStudentById($studentId);
            return view('students.edit', compact('student'));
        }

        /**
         * Submit student edit
         * @param Request $request
         * @param $studentId
         * @return View student edit confirm view
         */
        public function submitStudentEditView(StudentEditRequest $request, $studentId)
        {
            // validation for request values
            $validated = $request->validated();
            return redirect()
            ->route('student.edit.confirm', [$studentId])
            ->withInput();
        }

        /**
         * To show student edit confirm view
         * @param $studentId
         * @return View student edit confirm view
         */
        public function showStudentEditConfirmView($studentId)
        {
            if (old()) {
            return view('students.edit-confirm');
            }
            return redirect()->route('studentList');
        }

        /**
         * To submit profile edit confirmation view
         * @param Request $request Request from student edit confirm
         * @param string $studentId Student id
         * @return View student list
         */
        public function submitStudentEditConfirmView(Request $request, $studentId)
        {
            $user = $this->studentInterface->updatedStudentById($request, $studentId);
            return redirect()->route('studentList');
        }
          /**
         * To show create student view
         * 
         * @return View create student
         */
        public function showStudentUploadView()
        {
            return view('students.upload');
        }

        /**
         * To submit CSV upload view
         * 
         * @param Request $request Request from student upload
         * @return view student list
         */
        public function submitStudentUploadView(StudentUploadRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            $content = $this->studentInterface->uploadStudentCSV($validated);
            if (!$content['isUploaded']) {
            return redirect('/student/upload')->with('error', $content['message']);
            } else {
            return redirect()->route('studentList');
            }
        }

        /**
         * To download student csv file
         * @return File Download CSV file
         */
        public function downloadStudentCSV()
        {
            return $this->studentInterface->downloadStudentCSV();
        }
    }
?>
