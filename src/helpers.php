<?php

global $variables;

/**
 * Returns the value of a variable if it exists, otherwise, the default value will be returned.
 * @param $name
 * @param null $default
 * @return mixed|null
 */
function variable_get($name, $default = NULL){
    global $variables;

    return $variables[$name] ?? $default;
}

/**
 * Set a variable in database and global variables.
 * @param $name
 * @param $value
 * @throws ErrorException
 */
function variable_set($name, $value){
    if(\Illuminate\Support\Facades\Schema::hasTable('variables')){
        global $variables;

        \Illuminate\Support\Facades\DB::table('variables')->upsert([
            'name' => $name,
            'value' => serialize($value)
        ], 'name', ['value']);

        $variables[$name] = $value;
    } else {
        throw new \ErrorException('Table `variables` does not found in database.');
    }
}

/**
 * Delete a variable from database and global variables permanently.
 * @param $name
 * @throws ErrorException
 */
function variable_del($name){
    if(\Illuminate\Support\Facades\Schema::hasTable('variables')){
        global $variables;

        \Illuminate\Support\Facades\DB::table('variables')->where('name', $name)->delete();

        unset($variables[$name]);
    } else {
        throw new \ErrorException('Table `variables` does not found in database.');
    }
}
