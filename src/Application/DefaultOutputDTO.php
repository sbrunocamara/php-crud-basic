<?php

namespace crudApplication;


class DefaultOutputDTO
{
    private array $data = [];
    private string $errorCode = '';
    private string $errorMessage = '';

    public function __construct(array $data, string $errorCode = '', string $errorMessage)
    {
        $this->data = $data;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }
    

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value of errorCode
     */ 
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Get the value of errorMessage
     */ 
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getErrorData():array
    {
        return ['codErro' => $this->getErrorCode(), 'msgErro'=> $this->getErrorMessage()];
    }
}
