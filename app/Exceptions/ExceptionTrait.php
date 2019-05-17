<?php

namespace App\Exceptions;



//ModelNotFoundException 클래스

//라우트 오류 예외처리 클래스
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
trait ExceptionTrait
{
    public function apiException($request,$e)
    {
        if($this->isModel($e)){
            return $this->ModelResponse($e);
        }
            if($this->isHttp($e)){
                return $this->HttpResponse($e);
            }
                return parent::render($request, $exception);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }
    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function ModelResponse($e)
    {
        return response()->json([
            // 어떤에러인지 표시
            'errors' => 'Product Model not found'
        ], Response::HTTP_NOT_FOUND);
    }
    protected function HttpResponse($e)
    {
        return response()->json([
            // 어떤에러인지 표시
            'errors' => 'Incorect Route'
        ], Response::HTTP_NOT_FOUND);
    }
}
