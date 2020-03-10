<?php


namespace Assert;

class LazyAssertionException extends InvalidArgumentException
{
    private $errors = array();
    public static function fromErrors(array $errors)
    {
        $Ew = \sprintf("\124\x68\x65\x20\146\157\154\154\157\x77\x69\156\x67\40\45\x64\x20\141\x73\163\x65\x72\164\x69\157\156\163\40\x66\141\151\x6c\x65\x64\72", \count($errors)) . "\12";
        $lp = 1;
        foreach ($errors as $oP) {
            $Ew .= \sprintf("\45\144\51\x20\x25\163\72\x20\x25\163\12", $lp++, $oP->getPropertyPath(), $oP->getMessage());
            Z9I:
        }
        JTi:
        return new static($Ew, $errors);
    }
    public function __construct($Ew, array $errors)
    {
        parent::__construct($Ew, 0, null, null);
        $this->errors = $errors;
    }
    public function getErrorExceptions()
    {
        return $this->errors;
    }
}
