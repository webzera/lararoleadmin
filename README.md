Requirements
------------
 - PHP >= 7.0.0
 - Laravel >= 7.0

Installation
------------

> First, install laravel 7.0, and make sure that the database connection settings are correct.

> Make sure install auth,
```
php composer.phar require laravel/ui
php artisan ui vue --auth
```
> And Install
```
composer require webzera/lararoleadmin
  or
php composer.phar require webzera/lararoleadmin
```
>Add `php composer.phar require laracasts/flash` for flash messages.

Add Admin guard
---------------

> Auth guard [admin] defined config/auth.php file

Laravel uses guards for authentication which allows you to manage multiple authenticated instances from multiple tables. To create a new guard open the auth.php from the config directory:
```
'guards' => [
	[...],
	'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
],
'providers' => [
	[...],
	'admins' => [
            'driver' => 'eloquent',
            'model' => Webzera\Lararoleadmin\Admin::class,
        ],
],
'passwords' => [
        [...],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
```    

```
php composer.phar dump-autoload or composer dump-autoload
``` 

Then run these commands to publish assets and config：

```
php artisan vendor:publish --provider="Webzera\Lararoleadmin\Providers\LararoleadminServiceProvider"
```
or the database seeder file need to update so add force command
```
php artisan vendor:publish --force
```
Add Middleware for check admin Role
-----------------------------------
> In Http/Kenel.php add this line in
```
protected $routeMiddleware = [
	[...],
	'checkrole' => \App\Http\Middleware\CheckRole::class,
]
```
> add this line to main route/web.php file
```
Route::get('/admin', 'Admin\AdminController@index')->name('admin::home');
```

```php composer.phar dump-autoload``` //must use before migration

```php artisan migrate:fresh```

```php artisan db:seed```

Add Text Editer for Page
------------------------
> Install Laravel-filemanager 

```composer require unisharp/laravel-filemanager```
or
```php composer.phar require unisharp/laravel-filemanager```

> Change url for `ImageBrowseUrl` and `ImageUploadUrl` in page create blade and edit blade.

> Like
```
  filebrowserImageBrowseUrl: '/ruddra/public/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/ruddra/public/laravel-filemanager/
```

> Laravel-filemanater Publish the package’s config and assets

```
php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public
```
and
```
php artisan route:clear
php artisan config:clear
```
> and add this routes in main route/web.php file 

```
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
 \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 ```
> create symbolic link, check the public/storage folder not exist

```
 php artisan storage:link
```
> In PermissionController comment `$this->middleware('checkrole');` and click `Admin Role Permission` in side navigation button, And Uncomment.

> Edit APP_URL in .env. file, APP_URL=`http://localhost/<hostname>/public`

> Open in local `http://localhost/<hostname>admin/login` in browser, admin user email : `webzera@webzera.com`
admin password : `password` to login.