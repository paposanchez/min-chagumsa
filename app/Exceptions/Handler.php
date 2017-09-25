<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;



use Psr\Log\LoggerInterface;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\Debug\Exception\FlattenException;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;


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

                if ($e instanceof ModelNotFoundException) {
                        $e = new NotFoundHttpException($e->getMessage(), $e);
                }

                if ($e instanceof TokenMismatchException) {

                        return redirect()->guest('login')->withError('error', trans("auth.token-mismatch"));
                }

                if ($request->ajax() || $request->wantsJson()) {
                        return response()->json(
                                $this->getJsonMessage($e), $this->getExceptionHTTPStatusCode($e)
                        );
                }else{
                        return parent::render($request, $e);
                }

        }

        /**
         *      사용자 exception 디자인 변경
         */
        protected function convertExceptionToResponse(Exception $e)
        {
                $e = FlattenException::create($e);
                $handler = new SymfonyExceptionHandler(config('app.debug', false));
                return SymfonyResponse::create(view('errors.common', compact('e'))->render(), $e->getStatusCode(), $e->getHeaders());
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
                        return response()->json(['error' => trans("auth.unauthorized")], 401);
                }

                return redirect()->guest('login');
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
