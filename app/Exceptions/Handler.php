<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status' => '0',
                'message' => 'Endpoint tidak ditemukan.'
            ], 404);
        }

        if ($exception instanceof AuthenticationException) {
            \Log::info('AuthenticationException thrown: '.$exception->getMessage());

            return response()->json([
                'status' => '0',
                'message' => 'Token tidak valid atau tidak ditemukan.'
            ], 403);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status' => '0',
                'message' => 'Metode HTTP tidak diizinkan untuk endpoint ini.'
            ], 405); // Mengembalikan 405 Method Not Allowed
        }

        return parent::render($request, $exception);
    }
}
