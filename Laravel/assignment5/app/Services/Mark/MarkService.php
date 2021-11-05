<?php

    namespace App\Services\Mark;

    use App\Contracts\Dao\Mark\MarkDaoInterface;
    use App\Contracts\Services\Mark\MarkServiceInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    /**
     * Service class for service.
     */
    class MarkService implements MarkServiceInterface
    {
        /**
         * service dao
         */
        private $serviceDao;
        /**
         * Class Constructor
         * @param MarkDaoInterface
         * @return
         */
        public function __construct(MarkDaoInterface $serviceDao)
        {
            $this->serviceDao = $serviceDao;
        }

        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveMark(Request $request)
        {
            return $this->serviceDao->saveMark($request);
        }

        /**
         * To get mark list
         * @return array $markList list of marks
         */
        public function getMarkList()
        {
            return $this->serviceDao->getMarkList();
        }
        /**
         * To delete mark by id
         * @param string $id mark id
         * @param string $deletedMarkId deleted mark id
         * @return string $message message for success or not
         */
        public function deleteMarkById($id)
        {
            return $this->serviceDao->deleteMarkById($id);
        }
        
        /**
         * To get mark by id
         * @param string $id mark id
         * @return Object $mark mark object
         */
        public function getMarkById($id)
        {
            return $this->serviceDao->getMarkById($id);
        }

        /**
         * To update mark by id
         * @param Request $request request with inputs
         * @param string $id Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkById(Request $request, $id)
        {
            return $this->serviceDao->updatedMarkById($request, $id);
        }

        /**
         * To upload csv file for mark
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadMarkCSV($validated)
        {
            $fileName = $validated['csv_file']->getClientOriginalName();
            Storage::putFileAs(config('path.csv') .
            config('path.separator'), $validated['csv_file'], $fileName);
            return $this->serviceDao->uploadMarkCSV($validated);
        }

        /**
         * To download mark csv file
         * @return File Download CSV file
         */
        public function downloadMarkCSV()
        {
            $markList = $this->serviceDao->getMarkList();
            $filename = "mark.csv";
            //write csv file
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array('student_id', 'Myanmar', 'English', 'Mathematics', 'Chemistry', 'Physics', 'Biology'));

            foreach ($markList as $row) {
            fputcsv($handle, array(
                $row->student_id, $row->Myanmar, $row->English,$row->Mathematics,$row->Chemistry, $row->Physics,$row->Biology,
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
         * To save mark via API
         * @param array $validated Validated values from request
         * @return Object created mark object
         */
        public function saveMarkAPI($validated)
        {
            return $this->serviceDao->saveMarkAPI($validated);
        }

        /**
         * To update mark by id via api
         * @param array $validated Validated values from request
         * @param string $id Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkByIdAPI($validated, $markId)
        {
            return $this->serviceDao->updatedMarkByIdAPI($validated, $markId);
        }

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList list of marks
         */
        public function search($data)
        {
            return $this->serviceDao->search($data);
        }
    }
?>