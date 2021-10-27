<?php

    namespace App\Providers;

    use App\Contracts\Dao\Task\TaskDaoInterface;
    use App\Contracts\Services\Task\TaskServiceInterface;
    use App\Dao\Task\TaskDao;
    use App\Services\Task\TaskService;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //Dao Registration
            $this->app->bind(TaskDaoInterface::class, TaskDao::class);

            //Service Registration
            $this->app->bind(TaskServiceInterface::class, TaskService::class);
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            //
        }
    }
?>
