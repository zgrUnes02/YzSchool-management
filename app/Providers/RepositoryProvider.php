<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //? Teachers ------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\TeachersRepositoryInterface',
            'App\Repository\TeachersRepository'
        );

        //? Students ------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\StudentsRepositoryInterface',
            'App\Repository\StudentsRepository'
        );

        //? Promotions ------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\StudentsPromotionsRepositoryInterface',
            'App\Repository\StudentsPromotionsRepository'
        );

        //? Graduations ------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\StudentsGraduateRepositoryInterface',
            'App\Repository\StudentsGraduateRepository'
        );

        //? Fees --------------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\FeesRepositoryInterface',
            'App\Repository\FeesRepository'
        );

        //? Students Accounts -------------------------------------- :
        $this -> app -> bind(
            'App\Repository\StudentAccountRepositoryInterface',
            'App\Repository\StudentAccountRepository'
        );

        //? Fee Invoices ------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\FeeInvoicesRepositoryInterface',
            'App\Repository\FeeInvoicesRepository'
        );

        //? Receipt  ----------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\ReceiptrepositoryInterface',
            'App\Repository\Receiptrepository'
        );

        //? Payment  ----------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository'
        );

        //? Pay  --------------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\PayRepositoryInterface',
            'App\Repository\PayRepository'
        );

        //? Attendance  -------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\AttendanceRepositoryInterface',
            'App\Repository\AttendanceRepository'
        );

        //? Subject  -------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository'
        );

        //? Exams  -------------------------------------------- :
        // $this -> app -> bind(
        //     'App\Repository\ExamRepositoryInterface',
        //     'App\Repository\ExamRepository'
        // );

        //? Quizzez  -------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\QuizRepositoryInterface',
            'App\Repository\QuizRepository'
        );

        //? OnlineClasses  -------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\OnlineClassesRepositoryInterface',
            'App\Repository\OnlineClassesRepository'
        );

        //? Books  -------------------------------------------- :
        $this -> app -> bind(
            'App\Repository\BookRepositoryInterface',
            'App\Repository\BookRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
