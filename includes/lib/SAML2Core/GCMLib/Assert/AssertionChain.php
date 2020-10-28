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
    private $assertionClassName = "\x41\x73\163\145\162\x74\134\x41\163\x73\145\x72\x74\151\157\x6e";
    public function __construct($DE, $K3 = null, $hG = null)
    {
        $this->value = $DE;
        $this->defaultMessage = $K3;
        $this->defaultPropertyPath = $hG;
    }
    public function __call($Mx, $Ib)
    {
        if (!(true === $this->alwaysValid)) {
            goto LvA;
        }
        return $this;
        LvA:
        if (\method_exists($this->assertionClassName, $Mx)) {
            goto FyH;
        }
        throw new \RuntimeException("\x41\163\163\x65\x72\164\x69\x6f\x6e\40\x27" . $Mx . "\x27\40\144\157\145\x73\x20\x6e\157\164\40\145\x78\151\x73\164\x2e");
        FyH:
        $hL = new ReflectionClass($this->assertionClassName);
        $XC = $hL->getMethod($Mx);
        \array_unshift($Ib, $this->value);
        $Na = $XC->getParameters();
        foreach ($Na as $dx => $gs) {
            if (!isset($Ib[$dx])) {
                goto Jst;
            }
            goto wpi;
            Jst:
            if (!("\155\145\x73\163\x61\147\145" == $gs->getName())) {
                goto YLM;
            }
            $Ib[$dx] = $this->defaultMessage;
            YLM:
            if (!("\x70\162\x6f\160\x65\x72\x74\x79\120\141\x74\150" == $gs->getName())) {
                goto umo;
            }
            $Ib[$dx] = $this->defaultPropertyPath;
            umo:
            wpi:
        }
        qO5:
        if (!$this->all) {
            goto MiD;
        }
        $Mx = "\141\x6c\x6c" . $Mx;
        MiD:
        \call_user_func_array(array($this->assertionClassName, $Mx), $Ib);
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
            goto JtA;
        }
        $this->alwaysValid = true;
        JtA:
        return $this;
    }
    public function setAssertionClassName($LI)
    {
        if (\is_string($LI)) {
            goto hfJ;
        }
        throw new LogicException("\x45\170\x63\145\x70\164\151\x6f\156\x20\143\154\x61\163\x73\x20\156\141\x6d\x65\x20\155\x75\163\164\40\x62\145\40\160\141\163\x73\145\x64\x20\x61\163\x20\x61\40\x73\164\162\x69\156\147");
        hfJ:
        if (!("\x41\163\163\x65\162\164\134\x41\x73\x73\145\x72\x74\151\x6f\156" !== $LI && !\is_subclass_of($LI, "\x41\163\x73\x65\x72\164\x5c\x41\x73\163\x65\162\164\151\157\x6e"))) {
            goto ZFd;
        }
        throw new LogicException($LI . "\40\x69\163\40\156\x6f\164\x20\50\x61\x20\163\x75\x62\143\154\x61\x73\163\40\x6f\146\x29\x20\101\163\x73\145\x72\x74\x5c\101\x73\163\x65\162\x74\151\157\156");
        ZFd:
        $this->assertionClassName = $LI;
        return $this;
    }
}
