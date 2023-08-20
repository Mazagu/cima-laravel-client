<?php 

namespace Bluesourcery\Cima\Exceptions;

use Exception;

class HttpException extends Exception
{
    protected $statusCode;

    public function __construct($statusCode, $message = null, $code = 0, Exception $previous = null)
    {
        $this->statusCode = $statusCode;

        if ($message === null) {
            $message = $this->getDefaultMessage($statusCode);
        }

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function getDefaultMessage($statusCode)
    {
        $defaultMessages = [
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
        ];

        return $defaultMessages[$statusCode] ?? 'Unknown Error';
    }
}
