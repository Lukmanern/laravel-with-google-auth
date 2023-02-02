### step

```sh
composer require laravel/ui --dev
```

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
php artisan serve -q
```

-   https://laravel.com/docs/9.x/socialite#routing

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
