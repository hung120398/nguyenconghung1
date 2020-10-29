<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      'App\Model' => 'App\Policies\ModelPolicy',
      
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('delete-book',function($user){
            return $user->hasRole('thuthu');

       });
       Gate::define('add-book',function($user){
        return $user->hasRole('thuthu');

       });
       Gate::define('update-book',function($user){
        return $user->hasRole('thuthu');

   });
       Gate::define('muon-book',function($user){
       return $user->hasRole('user');

       });
       
       Gate::define('manage-user',function($user){
        return $user->hasAnyRoles(['admin']);
     });
         Gate::define('xem-sach',function($user){
            return $user->hasAnyRoles(['thuthu','user']);
   
            });
        
    }
}
