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
    private $assertClass = "\101\x73\163\145\162\x74\x5c\101\x73\x73\x65\162\164";
    private $exceptionClass = "\x41\163\163\x65\162\164\x5c\114\141\x7a\x79\101\163\163\x65\x72\164\x69\x6f\156\105\x78\x63\145\160\x74\151\x6f\x6e";
    public function that($DE, $Tn, $K3 = null)
    {
        $this->currentChainFailed = false;
        $this->thisChainTryAll = false;
        $Vu = $this->assertClass;
        $this->currentChain = $Vu::that($DE, $K3, $Tn);
        return $this;
    }
    public function tryAll()
    {
        if ($this->currentChain) {
            goto jPZ;
        }
        $this->alwaysTryAll = true;
        jPZ:
        $this->thisChainTryAll = true;
        return $this;
    }
    public function __call($XC, $Ib)
    {
        if (!(false === $this->alwaysTryAll && false === $this->thisChainTryAll && true === $this->currentChainFailed)) {
            goto wiC;
        }
        return $this;
        wiC:
        try {
            \call_user_func_array(array($this->currentChain, $XC), $Ib);
        } catch (AssertionFailedException $XE) {
            $this->errors[] = $XE;
            $this->currentChainFailed = true;
        }
        return $this;
    }
    public function verifyNow()
    {
        if (!$this->errors) {
            goto mwN;
        }
        throw \call_user_func(array($this->exceptionClass, "\x66\162\x6f\x6d\105\x72\x72\x6f\162\x73"), $this->errors);
        mwN:
        return true;
    }
    public function setAssertClass($LI)
    {
        if (\is_string($LI)) {
            goto YHA;
        }
        throw new LogicException("\x41\x73\x73\x65\162\164\x20\143\x6c\141\x73\x73\40\x6e\x61\x6d\x65\40\x6d\165\163\x74\x20\142\x65\40\x70\x61\x73\x73\145\144\40\x61\163\40\x61\40\163\x74\x72\151\x6e\x67");
        YHA:
        if (!("\101\163\163\145\x72\x74\x5c\x41\163\163\x65\162\x74" !== $LI && !\is_subclass_of($LI, "\101\163\x73\145\162\x74\x5c\101\x73\163\145\x72\x74"))) {
            goto qPh;
        }
        throw new LogicException($LI . "\40\151\x73\x20\x6e\157\x74\x20\x28\141\40\x73\165\142\143\154\x61\x73\x73\40\157\146\x29\40\x41\x73\163\x65\x72\164\134\x41\x73\x73\145\x72\164");
        qPh:
        $this->assertClass = $LI;
        return $this;
    }
    public function setExceptionClass($LI)
    {
        if (\is_string($LI)) {
            goto lBr;
        }
        throw new LogicException("\105\170\143\x65\x70\x74\151\157\156\x20\143\154\141\163\x73\40\x6e\141\x6d\x65\x20\x6d\x75\163\164\x20\142\x65\40\x70\x61\x73\163\x65\x64\40\141\163\40\x61\40\x73\164\x72\151\x6e\147");
        lBr:
        if (!("\101\x73\x73\145\x72\x74\x5c\x4c\141\x7a\x79\x41\163\x73\145\162\x74\x69\157\156\x45\170\x63\145\160\164\x69\x6f\x6e" !== $LI && !\is_subclass_of($LI, "\101\x73\x73\145\162\x74\134\114\x61\x7a\x79\x41\163\x73\145\x72\x74\x69\x6f\156\105\x78\x63\145\160\x74\151\157\x6e"))) {
            goto r_p;
        }
        throw new LogicException($LI . "\x20\x69\x73\40\156\x6f\164\40\50\141\40\163\165\142\143\x6c\141\163\x73\x20\157\x66\51\40\101\x73\x73\145\x72\164\134\x4c\141\172\171\x41\x73\x73\145\162\164\151\157\156\105\x78\143\x65\x70\164\x69\x6f\156");
        r_p:
        $this->exceptionClass = $LI;
        return $this;
    }
}
