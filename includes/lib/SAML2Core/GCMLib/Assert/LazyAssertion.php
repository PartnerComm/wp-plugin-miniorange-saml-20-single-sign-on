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
    private $assertClass = "\101\x73\x73\x65\x72\x74\134\x41\x73\x73\145\162\164";
    private $exceptionClass = "\101\x73\x73\145\162\164\x5c\114\x61\x7a\171\101\x73\x73\x65\x72\164\151\x6f\x6e\105\170\x63\145\x70\164\151\x6f\x6e";
    public function that($Iy, $m7, $cx = null)
    {
        $this->currentChainFailed = false;
        $this->thisChainTryAll = false;
        $cO = $this->assertClass;
        $this->currentChain = $cO::that($Iy, $cx, $m7);
        return $this;
    }
    public function tryAll()
    {
        if ($this->currentChain) {
            goto BNP;
        }
        $this->alwaysTryAll = true;
        BNP:
        $this->thisChainTryAll = true;
        return $this;
    }
    public function __call($N0, $WK)
    {
        if (!(false === $this->alwaysTryAll && false === $this->thisChainTryAll && true === $this->currentChainFailed)) {
            goto YiD;
        }
        return $this;
        YiD:
        try {
            \call_user_func_array(array($this->currentChain, $N0), $WK);
        } catch (AssertionFailedException $xr) {
            $this->errors[] = $xr;
            $this->currentChainFailed = true;
        }
        return $this;
    }
    public function verifyNow()
    {
        if (!$this->errors) {
            goto bJO;
        }
        throw \call_user_func(array($this->exceptionClass, "\146\x72\157\155\x45\x72\162\157\162\x73"), $this->errors);
        bJO:
        return true;
    }
    public function setAssertClass($ai)
    {
        if (\is_string($ai)) {
            goto q5J;
        }
        throw new LogicException("\101\163\163\x65\x72\x74\40\143\x6c\141\x73\163\40\x6e\141\155\145\40\155\165\163\x74\40\x62\145\x20\x70\141\x73\163\145\x64\40\141\163\x20\x61\40\x73\x74\162\x69\156\x67");
        q5J:
        if (!("\x41\163\163\145\x72\x74\x5c\x41\163\x73\x65\162\x74" !== $ai && !\is_subclass_of($ai, "\x41\x73\163\145\162\x74\x5c\x41\163\x73\145\x72\164"))) {
            goto sM9;
        }
        throw new LogicException($ai . "\40\x69\x73\40\156\157\x74\x20\x28\x61\40\x73\165\142\143\154\141\x73\x73\40\157\x66\x29\40\101\x73\163\145\x72\x74\x5c\x41\x73\163\145\162\x74");
        sM9:
        $this->assertClass = $ai;
        return $this;
    }
    public function setExceptionClass($ai)
    {
        if (\is_string($ai)) {
            goto PLy;
        }
        throw new LogicException("\x45\x78\x63\x65\x70\x74\151\x6f\156\40\143\x6c\141\163\163\40\156\x61\155\x65\40\155\165\x73\x74\x20\142\145\40\160\x61\163\163\145\x64\40\x61\x73\40\141\40\163\164\x72\151\x6e\147");
        PLy:
        if (!("\101\163\163\145\x72\164\134\114\x61\x7a\x79\x41\163\x73\x65\x72\164\151\x6f\156\x45\x78\143\x65\160\164\151\157\x6e" !== $ai && !\is_subclass_of($ai, "\101\x73\x73\x65\162\x74\134\114\141\172\x79\101\x73\x73\x65\162\164\151\157\156\x45\x78\x63\x65\x70\164\151\157\x6e"))) {
            goto seU;
        }
        throw new LogicException($ai . "\x20\151\x73\x20\x6e\157\x74\40\50\x61\40\163\x75\x62\143\x6c\141\163\163\40\x6f\146\x29\40\x41\163\x73\145\x72\164\x5c\114\141\x7a\x79\101\x73\163\x65\162\x74\x69\157\x6e\105\170\x63\145\160\x74\151\x6f\156");
        seU:
        $this->exceptionClass = $ai;
        return $this;
    }
}
