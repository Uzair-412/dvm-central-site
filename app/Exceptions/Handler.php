<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;
use Mail;
use Auth;

/**
 * Class Handler.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            return redirect()
                ->route(homeRoute())
                ->withFlashDanger(__('You do not have access to do that.'));
        }

        if ($exception instanceof AuthorizationException) {
            return redirect()
                ->back()
                ->withFlashDanger($exception->getMessage() ?? __('You do not have access to do that.'));
        }

        if ($exception instanceof ModelNotFoundException) {
            return redirect()
                ->route(homeRoute())
                ->withFlashDanger(__('The requested resource was not found.'));
        }

        return parent::render($request, $exception);
    }

    public function register()
    {
        if(app()->environment() != 'local' && app()->environment() != 'development')
        {
            $this->reportable(function (Throwable $e) {
                // get error message
                $error_message = $e->getMessage();
        
                // get file
                $error_file = $e->getFile();
        
                // get line number
                $error_line = $e->getLine();
        
                // get method, GET or POST
                $method = request()->method();
        
                // get full URL including query string
                $full_url = request()->fullUrl();
        
                // get route name
                $route = "";
        
                // get list of all middlewares attached to that route
                $middlewares = "";
        
                // data with the request
                $inputs = "";
                if (request()->route() != null)
                {
                    $route = "uri: " . request()->route()->getName();
                    $middlewares = json_encode(request()->route()->gatherMiddleware());
                    $inputs = json_encode(request()->all());
                }
        
                // get IP address of user
                $ip = request()->ip();
        
                // get user browser or request source
                $user_agent = request()->userAgent();
        
                // create email body
                $html = $error_message . "\n\n";
                $html .= "File: " . $error_file . "\n\n";
                $html .= "Line: " . $error_line . "\n\n";
                $html .= "Inputs: " . $inputs . "\n\n";
                $html .= "Method: " . $method . "\n\n";
                $html .= "Full URL: " . $full_url . "\n\n";
                $html .= "Route: " . $route . "\n\n";
                $html .= "Middlewares: " . $middlewares . "\n\n";
                $html .= "IP: " . $ip . "\n\n";
                $html .= "User Agent: " . $user_agent . "\n\n";
        
                // for testing purpose only
                Auth::loginUsingid(1);
        
                // check if user is logged in
                if (Auth::check())
                {
                    // get email of user that faced this error
                    $html .= "User: " . Auth::user()->email;
                }
        
                // subject of email
                $subject = "Internal Server Error";
        
                // send an email
                Mail::raw($html, function ($message) use ($subject) {
                    // developer email
                    $message->to("uzair.gmit@gmail.com")
                        ->subject($subject);
                    $message->to("waleed.gmit@gmail.com")
                        ->subject($subject);
                });
            });
        }
    }
}
