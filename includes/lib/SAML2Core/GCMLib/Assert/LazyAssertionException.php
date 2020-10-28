<?php


namespace Assert;

class LazyAssertionException extends InvalidArgumentException
{
    private $errors = array();
    public static function fromErrors(array $errors)
    {
        $tj = \sprintf("\124\150\x65\40\x66\x6f\154\x6c\x6f\167\151\156\x67\x20\45\x64\x20\x61\x73\163\x65\162\x74\151\x6f\156\x73\x20\146\x61\x69\154\x65\144\72", \count($errors)) . "\xa";
        $gJ = 1;
        foreach ($errors as $xl) {
            $tj .= \sprintf("\x25\144\x29\40\45\x73\72\40\x25\163\xa", $gJ++, $xl->getPropertyPath(), $xl->getMessage());
            R3P:
        }
        Ys2:
        return new static($tj, $errors);
    }
    public function __construct($tj, array $errors)
    {
        parent::__construct($tj, 0, null, null);
        $this->errors = $errors;
    }
    public function getErrorExceptions()
    {
        return $this->errors;
    }
}
