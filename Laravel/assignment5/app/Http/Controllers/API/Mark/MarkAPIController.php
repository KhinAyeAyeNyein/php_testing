<?php

    namespace App\Http\Controllers\API\Mark;

    use App\Contracts\Services\Mark\MarkServiceInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MarkCreateAPIRequest;
    use App\Http\Requests\MarkEditAPIRequest;
    use App\Http\Requests\UploadRequest;
    use Illuminate\Http\JsonResponse;

    class MarkAPIController extends Controller
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
         * To show mark list
         *
         * @return Response json with Mark list
         */
        public function showMarkList()
        {
            $markList = $this->markInterface->getMarkList();
            return response()->json($markList);
        }
        /**
         * To delete mark by id
         * @param string $markid mark id
         * @return Response message
         * @return View mark list
         */
        public function deleteMarkById($markId)
        {
            // $msg = $this->markInterface->deleteMarkById($markId);
            // return response($msg, 204);
            $msg = $this->markInterface->deleteMarkById($markId);
            return response(['message' => $msg]);
            //return redirect()->route('markList');
        }

        /**
         * To create mark via API
         * @param MarkCreateRequest $request request via API
         * @return Response json created user
         */
        public function createMark(MarkCreateAPIRequest $request)
        {
            // validation for request values
            $validated = $request->validated();
            $mark = $this->markInterface->saveMarkAPI($validated);
            return response()->json($mark);
        }

        /**
         * To Update mark via API
         * @param MarkEditAPIRequest $request request via API
         * @param string $markId mark id
         * @return Response json updated mark.
         */
        public function updateMark(MarkEditAPIRequest $request, $markId)
        {
            // validation for request values
            $validated = $request->validated();
            $mark = $this->markInterface->updatedMarkByIdAPI($validated, $markId);
            return response()->json($mark);
        }

        /**
         * To get mark by id via API
         * @param string $markId mark id
         * @return Response json mark object
         */
        public function getMarkById($markId)
        {
            $mark = $this->markInterface->getMarkById($markId);
            return response()->json($mark);
        }

        public function uploadMarkCSVFile(UploadRequest $request)
        {
            $validated = $request->validated();
            $content = $this->markInterface->uploadMarkCSV($validated);
            if (!$content['isUploaded']) {
                return response()->json(['error' => $content['message']], JsonResponse::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $content['message']]);
            }
        }
    }
?>
