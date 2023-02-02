### step

```sh
composer require laravel/ui --dev
```

-   add ui auth

```sh
php artisan ui bootstrap --auth
```

```sh
npm i && npm up
```

```sh
npm run dev
```

-   run project and check /login url

```sh
php artisan serve
```

-   [Laravel:Socialite Doc](https://laravel.com/docs/8.x/socialite#routing)

```sh
composer require laravel/socialite
```

-   add vars in .env (.env.example too)

```sh
# Google Auth
GOOGLE_CLIENT_ID="ALWAYS_SECRET"
GOOGLE_CLIENT_SECRET="ALWAYS_SECRET"
```

-   add in web/route.php and add the method or [check this](https://github.com/Lukmanern/laravel-with-google-auth/blob/master/app/Http/Controllers/Auth/LoginController.php)

```sh
// Google Auth
Route::get('/login/google',
      [LoginController::class, 'redirectToGoogle']
)->name('login.google');

Route::get('/login/google/callback',
      [LoginController::class, 'handleGoogleCallback']
)->name('callback.google');
```

-   add array in config/services.php

```sh
'google' => [
      'client_id' => env('GOOGLE_CLIENT_ID'),
      'client_secret' => env('GOOGLE_CLIENT_SECRET'),
      'redirect' => 'http://localhost:8000/login/google/callback',
],
```

-   add 2 colomns in user migration file and edit (password tobe nullable)

```sh
// add
$table->string('provider_id')->nullable();
$table->string('avatar')->nullable();
// edit
$table->string('password')->nullable();
```

-   run migration

```sh
php artisan migrate
```

-   or

```sh
php artisan migrate:fresh
```
