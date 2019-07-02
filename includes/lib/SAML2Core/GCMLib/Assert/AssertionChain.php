<?php


namespace Assert;

use LogicException;
use ReflectionClass;
class AssertionChain
{
    private $value;
    private $defaultMessage;
    private $defaultPropertyPath;
    private $alwaysValid = false;
    private $all = false;
    private $assertionClassName = "\101\163\x73\x65\x72\164\134\x41\163\163\x65\162\x74\x69\x6f\x6e";
    public function __construct($Iy, $cx = null, $Oi = null)
    {
        $this->value = $Iy;
        $this->defaultMessage = $cx;
        $this->defaultPropertyPath = $Oi;
    }
    public function __call($hD, $WK)
    {
        if (!(true === $this->alwaysValid)) {
            goto lm;
        }
        return $this;
        lm:
        if (\method_exists($this->assertionClassName, $hD)) {
            goto pQ;
        }
        throw new \RuntimeException("\101\163\x73\x65\x72\x74\151\157\x6e\40\47" . $hD . "\47\40\x64\157\145\x73\40\x6e\x6f\x74\x20\x65\170\x69\x73\164\56");
        pQ:
        $x1 = new ReflectionClass($this->assertionClassName);
        $N0 = $x1->getMethod($hD);
        \array_unshift($WK, $this->value);
        $kF = $N0->getParameters();
        foreach ($kF as $bC => $d_) {
            if (!isset($WK[$bC])) {
                goto T_;
            }
            goto ob;
            T_:
            if (!("\155\145\x73\x73\141\147\145" == $d_->getName())) {
                goto N6;
            }
            $WK[$bC] = $this->defaultMessage;
            N6:
            if (!("\160\162\x6f\160\x65\162\x74\x79\120\141\164\x68" == $d_->getName())) {
                goto bE;
            }
            $WK[$bC] = $this->defaultPropertyPath;
            bE:
            ob:
        }
        ki:
        if (!$this->all) {
            goto oI;
        }
        $hD = "\141\x6c\x6c" . $hD;
        oI:
        \call_user_func_array(array($this->assertionClassName, $hD), $WK);
        return $this;
    }
    public function all()
    {
        $this->all = true;
        return $this;
    }
    public function nullOr()
    {
        if (!(null === $this->value)) {
            goto LR;
        }
        $this->alwaysValid = true;
        LR:
        return $this;
    }
    public function setAssertionClassName($ai)
    {
        if (\is_string($ai)) {
            goto Tn;
        }
        throw new LogicException("\x45\170\x63\145\160\164\151\x6f\156\x20\143\x6c\x61\163\163\x20\156\141\155\145\40\x6d\x75\163\164\x20\x62\145\40\x70\x61\x73\163\x65\x64\40\x61\x73\40\141\x20\163\x74\x72\x69\156\147");
        Tn:
        if (!("\x41\163\163\145\162\x74\134\101\163\x73\145\x72\x74\151\157\156" !== $ai && !\is_subclass_of($ai, "\x41\x73\x73\145\x72\x74\134\101\x73\163\145\162\x74\151\x6f\x6e"))) {
            goto Qd;
        }
        throw new LogicException($ai . "\x20\151\163\x20\156\157\x74\40\x28\141\40\163\165\142\143\154\x61\163\x73\40\157\146\x29\x20\101\x73\163\145\x72\x74\x5c\x41\163\x73\145\162\164\x69\x6f\156");
        Qd:
        $this->assertionClassName = $ai;
        return $this;
    }
}
