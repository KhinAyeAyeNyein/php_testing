<?php

    namespace App\Providers;

    use App\Contracts\Dao\Student\StudentDaoInterface;
    use App\Contracts\Services\Student\StudentServiceInterface;
    use App\Dao\Student\StudentDao;
    use App\Services\Student\StudentService;
    use App\Contracts\Dao\Mark\MarkDaoInterface;
    use App\Contracts\Services\Mark\MarkServiceInterface;
    use App\Dao\Mark\MarkDao;
    use App\Services\Mark\MarkService;
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
            $this->app->bind(StudentDaoInterface::class, StudentDao::class);
            $this->app->bind(MarkDaoInterface::class, MarkDao::class);

            //Service Registration
            $this->app->bind(StudentServiceInterface::class, StudentService::class);
            $this->app->bind(MarkServiceInterface::class, MarkService::class);
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
