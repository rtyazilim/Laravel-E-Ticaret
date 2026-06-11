<?php

namespace App\Core\Exceptions;

use Exception;

class DomainException extends Exception
{
    protected string $errorCode;
    protected array $details;

    public function __construct(string $message, string $errorCode = 'DOMAIN_ERROR', array $details = [], int $httpCode = 422)
    {
        parent::__construct($message, $httpCode);
        $this->errorCode = $errorCode;
        $this->details = $details;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function render(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => [
                'code' => $this->errorCode,
                'message' => $this->getMessage(),
                'details' => $this->details,
            ],
        ], $this->getCode());
    }
}
