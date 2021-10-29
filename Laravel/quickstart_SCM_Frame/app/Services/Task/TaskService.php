<?php

    namespace App\Services\Task;
    use App\Contracts\Dao\Task\TaskDaoInterface;
    use App\Contracts\Services\Task\TaskServiceInterface;

    /**
     * Task Service class
     */
    class TaskService implements TaskServiceInterface
    {
        /**
         * task Dao
         */
        private $taskDao;

        /**
         * Class Constructor
         * @paramTtaskDaoInterface
         * @return
         */
        public function __construct(TaskDaoInterface $taskDao)
        {
            $this->taskDao = $taskDao;
        }
        /**
         * To get task
         * @return array $tasks List of tasks
         */
        public function getTask()
        {
            return $this->taskDao->getTask();
        }

        /**
         * To delete task
         * @param string $task
         * @return view home with left tasks 
         */
        public function deleteTask($id)
        {
            return $this->taskDao->deleteTask($id);
        }
        
        /**
         * To post a new task
         * @return Object create new task
         */
        public function postTask($validate) 
        {
            return $this->taskDao->postTask($validate);
        }
    }
?>