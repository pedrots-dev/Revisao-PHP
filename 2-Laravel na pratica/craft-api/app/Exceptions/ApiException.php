<?php
namespace App\Exceptions;

use Exception;


class ApiException extends Exception{
    public readonly string $codeName;
    public readonly int $httpStatus;
    public readonly mixed $details;

    public function __construct(string $codeName, string $message, int $httpStatus = 400, mixed $details = null)
    {
        parent::__construct($message);

        $this->codeName = $codeName;
        $this->httpStatus = $httpStatus;
        $this->details = $details;
    }
}


?>
