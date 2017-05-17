<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception) {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e) {

//        if ($exception instanceof TokenMismatchException) {
//            return redirect()->route('/')->with('error', trans('auth.token-mismatch'));
//        }
//        return parent::render($request, $exception);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(
                            $this->getJsonMessage($e), $this->getExceptionHTTPStatusCode($e)
            );
        }
        return parent::render($request, $e);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception) {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }

    protected function getJsonMessage($e) {
        // You may add in the code, but it's duplication
        return [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }

    protected function getExceptionHTTPStatusCode($e) {
        // Not all Exceptions have a http status code
        // We will give Error 500 if none found
        return method_exists($e, 'getStatusCode') ?
                $e->getStatusCode() : 500;
    }

}
