<?php

    namespace App\Contracts\Services\Task;

    /**
     * Interface for user service
     */
    interface TaskServiceInterface
    {
        /**
         * To get task
         * @return array $tasks List of tasks
         */
        public function getTask();

        /**
         * To delete task
         * @param string $task
         * @return view home with left tasks 
         */
        public function deleteTask($id);

        /**
         * To post a new task
         * @return Object create new task
         */
        public function postTask($validate);
    }
?>