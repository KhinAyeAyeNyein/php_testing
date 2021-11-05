<?php

    namespace App\Contracts\Services\Mark;

    use Illuminate\Http\Request;

    /**
     * Interface for mark service
     */
    interface MarkServiceInterface
    {
        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveMark(Request $request);

        /**
         * To get mark list
         * @return array $markList list of marks
         */
        public function getMarkList();

        /**
         * To delete mark by id
         * @param string $id mark id
         * @param string $deletedMarkId deleted mark id
         * @return string $message message for success or not
         */
        public function deleteMarkById($id);

        /**
         * To get mark by id
         * @param string $id mark id
         * @return Object $mark mark object
         */
        public function getMarkById($id);

        /**
         * To update mark by id
         * @param Request $request request with inputs
         * @param string $id Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkById(Request $request, $id);

        /**
         * To upload csv file for mark
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadMarkCSV($validated);
        /**
         * To download mark csv file
         * @return File Download CSV file
         */
        public function downloadMarkCSV();
        /**
         * To save mark via API
         * @param array $validated Validated values from request
         * @return Object created mark object
         */
        public function saveMarkAPI($validated);

        /**
         * To update mark by id via api
         * @param array $validated Validated values from request
         * @param string $id Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkByIdAPI($validated, $markId);

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList list of marks
         */
        public function search($data);
    }

?>