<?php

    namespace App\Contracts\Dao\Task;

    /**
     * Interface of Data Access Object for task
     */
    interface TaskDaoInterface
    {
        /**
         * To get tasks
         * @return array $tasks list of tasks
         */
        public function getTask();

        /**
         * To delete task
         * @param string $id task 
         * @return string $message message for success or not
         */
        public function deleteTask($id);

        /**
         * To save task that from api request
         * @param array $validated Validated values form request
         * @return Object created task object
         */
        public function postTask($validate);
    }
?>
