PHP 7.2.34 (cli) (built: Oct  1 2020 10:24:14) ( ZTS MSVC15 (Visual C++ 2017) x64 )
Composer version 2.3-dev+f1f013edde6528e58a47dfd94af527f5b9af801c (2.3-dev) 2022-04-29 13:02:24
Laravel Framework 7.30.6

Миграция для создания таблиц есть. Выполнить компанду php artisan migrate
Была выключена проверка на CSRF app->HTTP->Kernel.php закоментировал следующую строку
            // \App\Http\Middleware\VerifyCsrfToken::class,
