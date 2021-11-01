<?php

    namespace App\Http\Controllers\Mark;

    use App\Contracts\Services\Mark\MarkServiceInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MarkCreateRequest;
    use App\Http\Requests\MarkEditRequest;
    use Illuminate\Http\Request;
    use App\Http\Requests\StudentUploadRequest;

    class MarkController extends Controller
    {
        /**
         * mark interface
         */
        private $markInterface;
        /**
         * Create a new controller instance.
         * @param MarkServiceInterface $markServiceInterface
         * @return void
         */
        public function __construct(MarkServiceInterface $markServiceInterface)
        {
            $this->markInterface = $markServiceInterface;
        }

        /**
         * To show create mark view
         * 
         * @return View create mark
         */
        public function showMarkCreateView()
        {
            return view('marks.create');
        }

        /**
         * To check mark create form and redirect to confirm page.
         * @param MarkCreateRequest $request Request form mark create
         * @return View mark create confirm
         */
        public function submitMarkCreateView(MarkCreateRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            return redirect()
                ->route('marks.create.confirm')
                ->withInput();
        }

        /**
         * To show mark create confirm view
         *
         * @return View mark create confirm view
         */
        public function showMarkCreateConfirmView()
        {
            if (old()) {
            return view('marks.create-confirm');
            }
            return redirect()->route('markList');
        }

        /**
         * To submit mark create confirm view
         * @param Request $request
         * @return View mark list
         */
        public function submitMarkCreateConfirmView(Request $request)
        {
            $mark = $this->markInterface->saveMark($request);
            return redirect()->route('markList');
        }

        /**
         * To show mark list
         *
         * @return View Mark list
         */
        public function showMarkList()
        {
            $markList = $this->markInterface->getMarkList();
            return view('marks.list', compact('markList'));
        }

        /**
         * To delete mark by id
         * @param string $markid mark id
         * @return View mark list
         */
        public function deleteMarkById($markId)
        {
            // $msg = $this->markInterface->deleteMarkById($markId);
            // return response($msg, 204);
            $msg = $this->markInterface->deleteMarkById($markId);
            return redirect()->route('markList');
        }

        /**
         * Show mark edit
         * 
         * @return View mark edit
         */
        public function showMarkEdit($markId)
        {
            $mark = $this->markInterface->getMarkById($markId);
            return view('marks.edit', compact('mark'));
        }

        /**
         * Submit mark edit
         * @param Request $request
         * @param $markId
         * @return View mark edit confirm view
         */
        public function submitMarkEditView(MarkEditRequest $request, $markId)
        {
            // validation for request values
            $validated = $request->validated();
            return redirect()
            ->route('mark.edit.confirm', [$markId])
            ->withInput();
        }

        /**
         * To show mark edit confirm view
         * @param $markId
         * @return View mark edit confirm view
         */
        public function showMarkEditConfirmView($markId)
        {
            if (old()) {
            return view('marks.edit-confirm');
            }
            return redirect()->route('markList');
        }

        /**
         * To submit profile edit confirmation view
         * @param Request $request Request from mark edit confirm
         * @param string $markId Mark id
         * @return View mark list
         */
        public function submitMarkEditConfirmView(Request $request, $markId)
        {
            $user = $this->markInterface->updatedMarkById($request, $markId);
            return redirect()->route('markList');
        }

        /**
         * To show create mark view
         * 
         * @return View create mark
         */
        public function showMarkUploadView()
        {
            return view('marks.upload');
        }

        /**
         * To submit CSV upload view
         * 
         * @param Request $request Request from mark upload
         * @return view mark list
         */
        public function submitMarkUploadView(StudentUploadRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            $content = $this->markInterface->uploadMarkCSV($validated);
            if (!$content['isUploaded']) {
            return redirect('/mark/upload')->with('error', $content['message']);
            } else {
            return redirect()->route('markList');
            }
        }
        
        /**
         * To download mark csv file
         * @return File Download CSV file
         */
        public function downloadMarkCSV()
        {
            return $this->markInterface->downloadMarkCSV();
        }
    }
?>
