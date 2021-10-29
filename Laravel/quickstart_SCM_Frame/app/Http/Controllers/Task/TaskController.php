<?php

    namespace App\Http\Controllers\Task;

    use App\Contracts\Services\Task\TaskServiceInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\TaskValidateRequest;

    /**
     * This is Task Controller.
     * This will handle task CRUD processing.
     */
    class TaskController extends Controller
    {
        /**
         * task interface
         */
        private $taskInterface;
        /**
         * Create a new controller instance.
         * @param TaskServiceInterface $taskServiceInterface
         * @return void
         */
        public function __construct(TaskServiceInterface $taskServiceInterface)
        {
            $this->taskInterface = $taskServiceInterface;
        }

        /**
         * Show task 
         *
         * @return View Task
         */
        public function getTasks()
        {
            $tasks = $this->taskInterface->getTask();
            return view('tasks', [
                'tasks' => $tasks
            ]);
        }

        /**
         * To post a new task
         * @param Request @request from TaskValidateRequest
         * @return View task list 
         */
        public function postTask(TaskValidateRequest $request)
        {
            $validate = $request->validated();
            $add = $this->taskInterface->postTask($validate);
            return redirect('/');
        }

        /**
         * To delete task
         * @param string $id task id
         * @return View left task list
         */
        public function deleteTask($id)
        {
            $msg = $this->taskInterface->deleteTask($id);
            return redirect('/');
        }
    }


?>