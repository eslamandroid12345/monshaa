<?php

namespace App\Exceptions;

use App\Http\Traits\Responser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use Responser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function render($request, Throwable $exception)
    {

    if ($exception instanceof AuthorizationException) {
        return $this->responseFail(null, 401, $exception->getMessage(), 401);

    }

    if ($exception instanceof ModelNotFoundException) {
        return $this->responseFail(null, 404, 'بيانات العقار غير موجوده', 404);

    }

    if($exception instanceof \Exception) {

        return $this->responseFail(null, 500, $exception->getMessage(), 500);

    }

        return parent::render($request, $exception);
    }
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
