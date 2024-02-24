<?php

namespace App\Exceptions;

use App\Http\Traits\Responser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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


    if($exception instanceof  AuthorizationException){
        return $this->responseFail(null,403,'غير مصرح لك للدخول لذلك الصفحه',403);

    }


        return parent::render($request, $exception);
    }


    protected function convertValidationExceptionToResponse(ValidationException $e, $request): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        $errors = $e->validator->errors()->all();

        return $this->responseFail($errors,422,"Validation error");
    }


    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
