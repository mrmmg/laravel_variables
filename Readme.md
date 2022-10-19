## Foreword
I have worked with both Drupal and Laravel frameworks.
In Drupal, we have two helper functions known as `variable_set` and `variable_get`, whose job is to manage and store the variables that we intend to have in a permanent space (database).
In Laravel, such a possibility is possible through `.env` file and config files, but we do not have any specific programming interface (API) to store such data in a database.
Therefore, I have developed this Laravel package based on Drupal.

Note that in this package all variables stored in a global php variable when booting service providers only with one database query!
## Installation
1. First Install the latest package version

    `compoer require mrmmg/laravel_variables`
2. Run Migrations

    `php artisan migrate`

## Usage
### Set Variable
With `variable_set(name, value)` helper function you can store variables in database. Example:
```php
variable_set("prune_cache", true);
variable_set("dataset", [...]);
```

You can store any type of value, something like Objects, Class References and etc.
### Get Variable
Use `variable_get(name, default = null)` helper function. Example:
```php
$dataset = variable_get("dataset", []);

//$dataset will be a array if found otherwise an empty array (default value) will be returned.
```
### Delete Variable
If you wants to delete a variable permanently from database use `variable_del(name)` helper function. Example:

```php
variable_del("dataset");
```
