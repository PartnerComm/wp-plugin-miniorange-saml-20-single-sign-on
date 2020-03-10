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
    private $assertionClassName = "\x41\x73\x73\145\162\164\134\101\x73\x73\x65\x72\164\x69\157\x6e";
    public function __construct($zw, $dx = null, $mi = null)
    {
        $this->value = $zw;
        $this->defaultMessage = $dx;
        $this->defaultPropertyPath = $mi;
    }
    public function __call($IQ, $yL)
    {
        if (!(true === $this->alwaysValid)) {
            goto II9;
        }
        return $this;
        II9:
        if (\method_exists($this->assertionClassName, $IQ)) {
            goto t99;
        }
        throw new \RuntimeException("\101\163\x73\x65\162\x74\151\157\156\40\x27" . $IQ . "\47\x20\x64\x6f\x65\163\40\x6e\157\164\40\145\170\151\x73\164\x2e");
        t99:
        $Ah = new ReflectionClass($this->assertionClassName);
        $CG = $Ah->getMethod($IQ);
        \array_unshift($yL, $this->value);
        $N4 = $CG->getParameters();
        foreach ($N4 as $vM => $b3) {
            if (!isset($yL[$vM])) {
                goto C1P;
            }
            goto CNY;
            C1P:
            if (!("\155\145\163\x73\141\x67\145" == $b3->getName())) {
                goto kmE;
            }
            $yL[$vM] = $this->defaultMessage;
            kmE:
            if (!("\160\162\157\160\145\x72\x74\171\x50\141\x74\x68" == $b3->getName())) {
                goto QSr;
            }
            $yL[$vM] = $this->defaultPropertyPath;
            QSr:
            CNY:
        }
        zLo:
        if (!$this->all) {
            goto EKI;
        }
        $IQ = "\141\154\x6c" . $IQ;
        EKI:
        \call_user_func_array(array($this->assertionClassName, $IQ), $yL);
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
            goto c_r;
        }
        $this->alwaysValid = true;
        c_r:
        return $this;
    }
    public function setAssertionClassName($B_)
    {
        if (\is_string($B_)) {
            goto B02;
        }
        throw new LogicException("\105\170\143\145\x70\164\x69\157\156\x20\143\x6c\141\x73\x73\40\156\141\155\145\x20\x6d\x75\x73\164\x20\x62\x65\x20\x70\141\x73\x73\145\x64\x20\141\163\x20\x61\40\x73\164\162\x69\x6e\147");
        B02:
        if (!("\x41\x73\x73\145\x72\164\134\101\163\x73\x65\162\164\x69\157\156" !== $B_ && !\is_subclass_of($B_, "\101\x73\163\145\x72\164\134\101\163\163\145\x72\x74\151\x6f\x6e"))) {
            goto y_q;
        }
        throw new LogicException($B_ . "\x20\x69\163\x20\x6e\x6f\164\x20\x28\x61\40\x73\165\x62\x63\x6c\141\x73\163\40\157\146\x29\x20\x41\163\x73\145\x72\164\134\x41\x73\x73\x65\x72\164\x69\x6f\x6e");
        y_q:
        $this->assertionClassName = $B_;
        return $this;
    }
}
