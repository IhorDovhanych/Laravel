<?php

namespace App\Providers;
use App\Models\Student;
use App\Models\User;
use App\Policies\StudentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Student::class => StudentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delete-post', function (User $user) {
            return $user['role'] == 'admin' ||  $user['role'] == 'superadmin';
        });
        Gate::define('update-post', function (User $user) {
            return $user['role'] == 'admin' || $user['role'] == 'superadmin';
        });
//        if (! Gate::allows('delete-post')) {
//            abort(403, "Not allowed by gate");
//        }
    }
}
