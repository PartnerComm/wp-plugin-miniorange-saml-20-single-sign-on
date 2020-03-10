<?php


namespace Assert;

use LogicException;
class LazyAssertion
{
    private $currentChainFailed = false;
    private $alwaysTryAll = false;
    private $thisChainTryAll = false;
    private $currentChain;
    private $errors = array();
    private $assertClass = "\x41\x73\x73\x65\x72\x74\134\x41\163\x73\x65\x72\164";
    private $exceptionClass = "\101\x73\163\x65\x72\x74\134\x4c\141\x7a\171\x41\163\163\145\x72\x74\x69\x6f\156\x45\170\143\145\160\164\151\157\x6e";
    public function that($zw, $YK, $dx = null)
    {
        $this->currentChainFailed = false;
        $this->thisChainTryAll = false;
        $mB = $this->assertClass;
        $this->currentChain = $mB::that($zw, $dx, $YK);
        return $this;
    }
    public function tryAll()
    {
        if ($this->currentChain) {
            goto uoT;
        }
        $this->alwaysTryAll = true;
        uoT:
        $this->thisChainTryAll = true;
        return $this;
    }
    public function __call($CG, $yL)
    {
        if (!(false === $this->alwaysTryAll && false === $this->thisChainTryAll && true === $this->currentChainFailed)) {
            goto xdd;
        }
        return $this;
        xdd:
        try {
            \call_user_func_array(array($this->currentChain, $CG), $yL);
        } catch (AssertionFailedException $sL) {
            $this->errors[] = $sL;
            $this->currentChainFailed = true;
        }
        return $this;
    }
    public function verifyNow()
    {
        if (!$this->errors) {
            goto BTm;
        }
        throw \call_user_func(array($this->exceptionClass, "\146\x72\x6f\x6d\x45\162\x72\x6f\x72\163"), $this->errors);
        BTm:
        return true;
    }
    public function setAssertClass($B_)
    {
        if (\is_string($B_)) {
            goto Lc0;
        }
        throw new LogicException("\101\x73\163\145\x72\x74\40\x63\x6c\141\163\163\x20\x6e\141\155\145\40\155\x75\x73\164\40\x62\145\40\x70\141\163\x73\145\144\x20\141\x73\x20\141\40\x73\x74\x72\151\156\147");
        Lc0:
        if (!("\x41\x73\163\145\x72\x74\x5c\x41\x73\x73\145\x72\164" !== $B_ && !\is_subclass_of($B_, "\x41\x73\163\145\162\164\x5c\x41\x73\163\145\x72\x74"))) {
            goto bvU;
        }
        throw new LogicException($B_ . "\x20\151\x73\x20\156\157\164\40\x28\141\x20\163\165\142\x63\154\141\163\x73\40\x6f\146\x29\40\101\x73\163\145\162\164\134\101\163\x73\145\x72\164");
        bvU:
        $this->assertClass = $B_;
        return $this;
    }
    public function setExceptionClass($B_)
    {
        if (\is_string($B_)) {
            goto W7R;
        }
        throw new LogicException("\105\170\143\x65\160\164\x69\157\x6e\40\143\154\141\163\163\40\156\141\155\145\40\x6d\x75\x73\x74\x20\142\145\40\160\141\x73\x73\145\144\x20\141\x73\x20\x61\40\163\x74\162\151\x6e\x67");
        W7R:
        if (!("\101\163\x73\145\x72\164\x5c\114\x61\172\x79\101\163\163\145\x72\x74\x69\x6f\x6e\105\170\x63\145\x70\x74\x69\x6f\x6e" !== $B_ && !\is_subclass_of($B_, "\101\163\x73\x65\162\164\x5c\x4c\141\172\171\x41\163\163\145\162\x74\151\x6f\x6e\105\170\x63\145\160\x74\151\x6f\156"))) {
            goto Ksq;
        }
        throw new LogicException($B_ . "\x20\x69\163\40\156\157\164\x20\50\x61\40\x73\x75\x62\x63\x6c\141\163\163\x20\157\146\x29\x20\101\163\163\145\162\x74\134\x4c\x61\x7a\x79\101\163\163\145\x72\x74\151\x6f\x6e\x45\170\x63\x65\160\164\151\157\156");
        Ksq:
        $this->exceptionClass = $B_;
        return $this;
    }
}
