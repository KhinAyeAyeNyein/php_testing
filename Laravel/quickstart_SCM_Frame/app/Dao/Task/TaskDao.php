<?php

    namespace App\Dao\Task;

    use App\Contracts\Dao\Task\TaskDaoInterface;
    use App\Models\Task;
    
    class TaskDao implements TaskDaoInterface
    {
        /**
         * To get tasks
         * @return array $tasks list of tasks
         */
        public function getTask()
        {
            $tasks = Task::orderBy('created_at', 'asc')->get();
            return $tasks;
        }

        /**
         * To delete Task
         * @param string $id Task
         * @return view home with task left
         */
        public function deleteTask($id)
        {
            $del = Task::findOrFail($id)->delete();
            return $del;
        }

         /**
         * To save Task that from api request
         * @param array $validated Validated values form request
         * @return Object created task object
         */
        public function postTask($validate)
        {
            $task = new Task;
            $task->name = $validate['name'];
            $task->save();

            return $task;
        }

    }
?>
