<?php
Use Illuminate\Auth\Events\Registered;
'Illuminate\Auth\Events\Registered' => [
        'App\Listeners\SendWelcomeEmail'
    ]
// php artisan event:generate 

// go to SendWelcomeEmail

use Mail;
public function registered (Registered $event)
{
    Mail:to($event->user)->send(new WelcomeToOurSass($event->username));
}
// php artisan make:mail WelcomeToOurSass --markdown="emails.welcome"

// go to WelcomeToOurSass

public $user;
public function __construct(User $user)
{
    $this->user  $user;
}

// go to welcome.blade.php 

{{ $user->email }}
// Welcome text

//create custom provider

// We create custom provider just to use common data over and over again;
// php artisan make:provider MediumServiceProvider
use JonathanTorres\MediumSdk\Medium;

public function register()
{
    $this->app->bind('medium-php-sdk', function(){
        return new Medium(config('medium'));
    });
}
// create new file config/medium.php

return [
   
        'client-id' => 'CLIENT-ID',
        'client-secret' => 'CLIENT-SECRET',
        'redirect-url' => 'http://example.com/callback',
        'state' => 'somesecret',
        'scopes' => 'scope1,scope2',
   
];

//  Go to web.php
$medium = resolve('medium-php-sdk');
dd($medium);
// Go to app.php
// include medium sevice provider
public function boot() {
    $this->app->make('router')->get('medium', function(){
        return 'medium home';
    });
}

// Create custom middleware
// php artisan make:middleware Administration

// go to Administration
// Go to app.php

'administrator' => [
    'test@example.com'
];

public function handle($request, Closure $next)
{
    if (auth()->check){
        if (in_array(auth()->user()->email, config('app.administrator'))){
            dd('You are an administator');
        } else {
            dd("You are not an administrator");
        }
    } else {
        dd("Please login");
    }
}

// // Go to kernel.php
// define new routes 
'admin' => [
    'web',
    \App\Http\Middleware\Administration::class
]
// Web.php

// Go to route service provider 
protected function mapAdminRoutes()
{
    Route::prefix('admin')
    ->middleware('admin')
    ->namespace($this->namespace.'\Administrator')
    ->group(base_path('routes/admin.php'));
}

// Go to routes/admin.php 
Route::get('/', function(){
    dd("Routes was reached");
});

// Go to modal not found exception file
namespace App\Exceptions ;
use Exception; 
use Illuminate\Database\Eloquent\ModelNotFoundException;

// go to render method of ModelNotFoundException

if ($exception instanceof ModelNotFoundException){
    return response()->json([
        'message' => "Hey we could not find that user"
    ]);
}

// touch App\Exceptions\HackerAlertException.php;
//  go to HackerAlertException.php
namespace App\Exceptions;
use Exception; 
use Log;
class HackerAlertException extends Exception {
    public function render() //Mandatory
    {
        return response()->json([
            'message' => 'Hacker, you got no luck today.'
        ]);
    }
    public function report() // mandatory
    {
        Log::critical('Hacker tried to hack us today')
    }

}

// Go to web.php
Route::get('/admin', function(){
    if(!auth()->check)
    {
        throw new \App\Exceptions\HackerAlertException();
    }
})

// npm install admin-lte@v3.0.0-alpha.2 --save
?>