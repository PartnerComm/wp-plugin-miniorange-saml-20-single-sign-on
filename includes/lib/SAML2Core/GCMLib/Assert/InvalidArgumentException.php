<?php


namespace Assert;

class InvalidArgumentException extends \InvalidArgumentException implements AssertionFailedException
{
    private $propertyPath;
    private $value;
    private $constraints;
    public function __construct($Nr, $ug, $m7, $Iy, array $uU = array())
    {
        parent::__construct($Nr, $ug);
        $this->propertyPath = $m7;
        $this->value = $Iy;
        $this->constraints = $uU;
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
