<?php


namespace Assert;

class InvalidArgumentException extends \InvalidArgumentException implements AssertionFailedException
{
    private $propertyPath;
    private $value;
    private $constraints;
    public function __construct($Ew, $oZ, $YK, $zw, array $b6 = array())
    {
        parent::__construct($Ew, $oZ);
        $this->propertyPath = $YK;
        $this->value = $zw;
        $this->constraints = $b6;
    }
    public function getPropertyPath()
    {
        return $this->propertyPath;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function getConstraints()
    {
        return $this->constraints;
    }
}
