<?php

  namespace App\Contracts\Dao\Mark;

  use Illuminate\Http\Request;

  /**
   * Interface for Data Accessing Object of Mark
   */
  interface MarkDaoInterface
  {
    /**
     * To save mark
     * @param Request $request request with inputs
     * @return Object $mark saved mark
     */
    public function saveMark(Request $request);

    /**
     * To get mark list
     * @return $markList
     */
    public function getMarkList();

    /**
     * To delete mark by id
     * @param string $id mark id
     * @param string $deletedUserId deleted user id
     * @return string $message message success or not
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
     * To save mark via API
     * @param array $validated Validated values from request
     * @return Object created mark object
     */
    public function saveMarkAPI($validated);

    /**
     * To search data
     * @param integer $data Input from user
     * @return array $markList Mark list
     */
    public function search($data);
  }
?>
