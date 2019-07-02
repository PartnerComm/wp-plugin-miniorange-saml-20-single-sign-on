<?php


namespace Assert;

class LazyAssertionException extends InvalidArgumentException
{
    private $errors = array();
    public static function fromErrors(array $errors)
    {
        $Nr = \sprintf("\x54\x68\145\40\x66\x6f\154\154\x6f\167\x69\156\147\x20\x25\x64\x20\x61\163\163\x65\x72\164\x69\x6f\x6e\x73\40\x66\x61\151\154\145\x64\x3a", \count($errors)) . "\xa";
        $W0 = 1;
        foreach ($errors as $P8) {
            $Nr .= \sprintf("\45\144\51\x20\45\163\x3a\x20\x25\x73\12", $W0++, $P8->getPropertyPath(), $P8->getMessage());
            bua:
        }
        TPS:
        return new static($Nr, $errors);
    }
    public function __construct($Nr, array $errors)
    {
        parent::__construct($Nr, 0, null, null);
        $this->errors = $errors;
    }
    public function getErrorExceptions()
    {
        return $this->errors;
    }
}
