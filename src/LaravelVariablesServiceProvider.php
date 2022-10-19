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
        global $variables;

        if(Schema::hasTable('variables')){
            $vars = \Illuminate\Support\Facades\DB::table('variables')->get();

            if(!$vars->isEmpty()){
                $vars->each(function ($var){
                    $variables[$var->name] = unserialize($var->value);
                });
            }
        }
    }
}
