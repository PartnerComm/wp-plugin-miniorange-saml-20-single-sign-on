<?php


namespace Assert;

class InvalidArgumentException extends \InvalidArgumentException implements AssertionFailedException
{
    private $propertyPath;
    private $value;
    private $constraints;
    public function __construct($tj, $CT, $Tn, $DE, array $qY = array())
    {
        parent::__construct($tj, $CT);
        $this->propertyPath = $Tn;
        $this->value = $DE;
        $this->constraints = $qY;
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
