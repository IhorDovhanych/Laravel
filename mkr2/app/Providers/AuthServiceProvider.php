<?php

namespace App\Providers;
use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delete-post', function (User $user, ?Grade $grade) {
            return $user['role'] == 'admin' ||  $user['role'] == 'superAdmin' || $user->id == $grade->editor_id;
        });
        Gate::define('update-post', function (User $user, ?Grade $grade) {
            return $user['role'] == 'admin' || $user['role'] == 'superAdmin' || $user['role'] == 'editor' || $user['id'] == $grade['editor_id'];
        });
        Gate::define('create-post', function (User $user) {
            return $user['role'] == 'admin' || $user['role'] == 'superAdmin' || $user['role'] == 'editor';
        });
//        if (! Gate::allows('delete-post')) {
//            abort(403, "Not allowed by gate");
//        }
    }
}
