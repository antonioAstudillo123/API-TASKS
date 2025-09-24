<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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

    /**
     * Sobreescribimos el metodo render, para controlar las excepciones que arroje el sistema
     *  y poder asi, mostrar mensajes de error en un estandar JSON.
     */

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Los datos proporcionados no son válidos.',
                'errors' => $exception->errors(),
            ], 422);
        }


        if ($exception instanceof HttpException) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage() ?: 'Error HTTP',
            ], $exception->getStatusCode());
        }


        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor.',
            'error' => config('app.debug') ? $exception->getMessage() : null,
        ], 500);
    }
}
