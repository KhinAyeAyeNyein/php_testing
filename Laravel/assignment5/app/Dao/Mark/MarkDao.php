<?php

    namespace App\Dao\Mark;

    use App\Models\Marks;
    use App\Contracts\Dao\Mark\MarkDaoInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    /**
     * Data accessing object for mark
     */
    class MarkDao implements MarkDaoInterface
    {
        /**
         * To save mark
         * @param Request $request request with inputs
         * @return Object $mark saved mark
         */
        public function saveMark(Request $request)
        {
            $mark = new Marks();
            $mark->student_id = $request['student_id'];
            $mark->Myanmar = $request['Myanmar'];
            $mark->English = $request['English'];
            $mark->Mathematics = $request['Mathematics'];
            $mark->Chemistry = $request['Chemistry'];
            $mark->Physics = $request['Physics'];
            $mark->Biology = $request['Biology'];
            $mark->save();
            return $mark;
        }

        /**
         * To get mark list
         * @return array $markList Mark list
         */
        public function getMarkList()
        {
            // $markList = DB::table('marks as mark')
            // ->join('students', 'students.id', '=', 'mark.student_id')
            // ->whereNull('mark.deleted_at')
            // ->get();
            // return $markList;
            $markList = Marks::all();
            return $markList;
        }

        /**
         * To delete mark by id
         * @param string $id mark id
         * @param string $deletedUserId deleted user id
         * @return string $message message success or not
         */
        public function deleteMarkById($id)
        {
            $mark = Marks::find($id);
            if ($mark) {
            $mark->delete();
            return 'Deleted Successfully!';
            }
            return 'Mark Not Found!';
        }

        /**
         * To get mark by id
         * @param string $id mark id
         * @return Object $mark mark object
         */
        public function getMarkById($id)
        {
            $mark = Marks::find($id);
            return $mark;
        }

        /**
         * To update mark by id
         * @param Request $request request with inputs
         * @param string $id Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkById(Request $request, $id)
        {
            $mark = Marks::find($id);
            $mark->student_id = $request['student_id'];
            $mark->Myanmar = $request['Myanmar'];
            $mark->English = $request['English'];
            $mark->Mathematics = $request['Mathematics'];
            $mark->Chemistry = $request['Chemistry'];
            $mark->Physics = $request['Physics'];
            $mark->Biology = $request['Biology'];
            $mark->save();
            return $mark;
        }

        /**
         * To upload csv file for mark
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadMarkCSV($validated)
        {
            $path =  $validated['csv_file']->getRealPath();
            $csv_data = array_map('str_getcsv', file($path));
            // save mark to Database accoding to csv row
            foreach ($csv_data as $index => $row) {
            if (count($row) >= 2) {
                try {
                $mark = new Marks();
                $mark->student_id = $row[0];
                $mark->Myanmar = $row[1];
                $mark->English = $row[2];
                $mark->Mathematics = $row[3];
                $mark->Chemistry = $row[4];
                $mark->Physics = $row[5];
                $mark->Biology = $row[6];
                $mark->save();
                } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                //error handling for duplicated mark
                if ($errorCode == '1062') {
                    $content = array(
                    'isUploaded' => false,
                    'message' => 'Row number (' . ($index + 1) . ') is duplicated student.'
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
         * To save mark via API
         * @param array $validated Validated values from request
         * @return Object created mark object
         */
        public function saveMarkAPI($validated)
        {
            $mark = new Marks();
            $mark->student_id = $validated['student_id'];
            $mark->Myanmar = $validated['Myanmar'];
            $mark->English = $validated['English'];
            $mark->Mathematics = $validated['Mathematics'];
            $mark->Chemistry = $validated['Chemistry'];
            $mark->Physics = $validated['Physics'];
            $mark->Biology = $validated['Biology'];
            $mark->save();
            return $mark;
        }
        /**
         * To update mark by id via api
         * @param array $validated Validated values from request
         * @param string $markId Mark id
         * @return Object $mark Mark Object
         */
        public function updatedMarkByIdAPI($validated, $markID)
        {
            $mark = Marks::find($markID);
            $mark->student_id = $validated['student_id'];
            $mark->Myanmar = $validated['Myanmar'];
            $mark->English = $validated['English'];
            $mark->Mathematics = $validated['Mathematics'];
            $mark->Chemistry = $validated['Chemistry'];
            $mark->Physics = $validated['Physics'];
            $mark->Biology = $validated['Biology'];
            $mark->save();
            return $mark;
        }

        /**
         * To search data
         * @param integer $data Input from user
         * @return array $markList Mark list
         */
        public function search($data)
        {
            $markList = DB::table('marks as mark')
            ->whereNull('mark.deleted_at')
            ->where('Myanmar','LIKE', '%'. $data .'%')
            ->orWhere('English','LIKE', '%'. $data .'%')
            ->orWhere('Mathematics','LIKE', '%'. $data .'%')
            ->orWhere('Chemistry','LIKE', '%'. $data .'%')
            ->orWhere('Physics','LIKE', '%'. $data .'%')
            ->orWhere('Biology','LIKE', '%'. $data .'%')
            ->get();
            return $markList;
        }
    }

?>