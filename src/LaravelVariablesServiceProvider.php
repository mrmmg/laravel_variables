<?php
namespace Mrmmg\LaravelVariables;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LaravelVariablesServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");

        $this->initializeVariables();
    }

    private function initializeVariables(){
        if(Schema::hasTable('variables')){
            $vars = \Illuminate\Support\Facades\DB::table('variables')->get();

            if(!$vars->isEmpty()){
                $vars->each(function ($var){
                    global $laravel_variables;
                    $laravel_variables[$var->name] = unserialize($var->value);
                });
            }
        }
    }
}
