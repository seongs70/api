<?php

namespace App\Exceptions;

use Exception;
//ModelNotFoundException 클래스
use Illuminate\Database\Eloquent\ModelNotFoundException;
//Response::HTTP_NOT_FOUND 클래스

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
//라우트 오류 예외처리 클래스
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //예외처리 제이슨 http://localhost:8000/api/product/505 에서 제이슨을 찾을 수 없으면
        if($request->expectsJson()){
            if($exception instanceof ModelNotFoundException){
                return response()->json([
                    // 어떤에러인지 표시
                    'errors' => 'Product Model not found'
                ], Response::HTTP_NOT_FOUND);
            }
            if($exception instanceof NotFoundHttpException){
                return response()->json([
                    // 어떤에러인지 표시
                    'errors' => 'Incorect Route'
                ], Response::HTTP_NOT_FOUND);
            }
        }
        return parent::render($request, $exception);
    }
}
