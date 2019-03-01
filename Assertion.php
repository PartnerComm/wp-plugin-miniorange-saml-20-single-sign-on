<?php


include_once "\x55\164\151\x6c\151\164\x69\x65\163\56\x70\x68\x70";
class SAML2SPAssertion
{
    private $id;
    private $issueInstant;
    private $issuer;
    private $nameId;
    private $encryptedNameId;
    private $encryptedAttribute;
    private $encryptionKey;
    private $notBefore;
    private $notOnOrAfter;
    private $validAudiences;
    private $sessionNotOnOrAfter;
    private $sessionIndex;
    private $authnInstant;
    private $authnContextClassRef;
    private $authnContextDecl;
    private $authnContextDeclRef;
    private $AuthenticatingAuthority;
    private $attributes;
    private $nameFormat;
    private $signatureKey;
    private $certificates;
    private $signatureData;
    private $requiredEncAttributes;
    private $SubjectConfirmation;
    protected $wasSignedAtConstruction = FALSE;
    public function __construct(DOMElement $vw = NULL)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\x72\x6e\72\x6f\141\163\151\163\72\x6e\x61\x6d\145\163\x3a\x74\x63\72\x53\101\x4d\x4c\72\x31\x2e\61\72\156\x61\x6d\x65\151\x64\x2d\146\157\162\155\x61\x74\x3a\165\156\x73\x70\x65\143\x69\x66\151\145\x64";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($vw === NULL)) {
            goto ys;
        }
        return;
        ys:
        if (!($vw->localName === "\x45\x6e\x63\162\x79\x70\164\145\x64\101\163\163\145\162\164\151\x6f\156")) {
            goto WH;
        }
        $Or = SAMLSPUtilities::xpQuery($vw, "\56\x2f\x78\x65\156\x63\72\x45\x6e\143\162\171\x70\164\145\144\104\141\x74\x61");
        $BL = SAMLSPUtilities::xpQuery($vw, "\x2e\57\170\145\156\x63\72\105\x6e\143\x72\171\x70\164\145\x64\104\x61\164\141\x2f\x64\163\72\113\x65\171\111\x6e\146\x6f\57\x78\x65\x6e\143\x3a\x45\156\x63\x72\x79\x70\x74\x65\x64\113\x65\x79");
        $lY = $BL[0]->firstChild->getAttribute("\x41\154\147\x6f\162\151\164\x68\155");
        $Zc = SAMLSPUtilities::getEncryptionAlgorithm($lY);
        if (count($Or) === 0) {
            goto ia;
        }
        if (count($Or) > 1) {
            goto jQ;
        }
        goto OT;
        ia:
        throw new Exception("\x4d\x69\163\163\151\x6e\x67\x20\x65\x6e\143\162\171\x70\x74\145\144\40\x64\x61\164\141\40\151\156\40\74\x73\141\x6d\154\x3a\105\x6e\143\x72\x79\x70\x74\145\x64\x41\163\x73\x65\162\164\x69\157\x6e\76\56");
        goto OT;
        jQ:
        throw new Exception("\x4d\157\162\145\40\x74\x68\x61\156\40\157\x6e\x65\x20\x65\x6e\143\x72\171\160\164\x65\144\40\144\141\164\141\40\145\154\x65\x6d\145\156\164\40\x69\156\40\74\x73\x61\x6d\x6c\x3a\105\156\x63\162\x79\x70\x74\145\x64\x41\x73\x73\145\x72\x74\x69\x6f\x6e\76\x2e");
        OT:
        $nz = new XMLSecurityKey($Zc, array("\x74\171\x70\x65" => "\x70\162\151\166\x61\x74\x65"));
        $wy = get_option("\155\x6f\x5f\x73\x61\155\154\137\x63\165\x72\162\145\x6e\164\x5f\143\x65\x72\x74\137\160\x72\x69\x76\x61\164\145\137\153\145\171");
        $nz->loadKey($wy, FALSE);
        $vV = new XMLSecurityKey($Zc, array("\164\x79\x70\x65" => "\160\162\x69\x76\x61\x74\145"));
        $OJ = plugin_dir_path(__FILE__) . "\162\145\163\157\x75\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\x69\157\x72\x61\x6e\147\145\x5f\163\160\x5f\x70\162\151\166\137\x6b\x65\171\56\x6b\x65\171";
        $vV->loadKey($OJ, TRUE);
        $hO = array();
        $vw = SAMLSPUtilities::decryptElement($Or[0], $nz, $hO, $vV);
        WH:
        if ($vw->hasAttribute("\111\104")) {
            goto kl;
        }
        throw new Exception("\115\x69\163\163\151\x6e\x67\x20\111\x44\x20\x61\x74\x74\x72\x69\142\165\x74\145\x20\x6f\x6e\x20\x53\101\x4d\x4c\x20\x61\x73\x73\145\x72\164\x69\157\156\56");
        kl:
        $this->id = $vw->getAttribute("\111\104");
        if (!($vw->getAttribute("\126\145\162\x73\151\x6f\156") !== "\x32\x2e\60")) {
            goto NT;
        }
        throw new Exception("\125\x6e\x73\165\160\x70\157\162\164\x65\x64\40\166\x65\162\x73\151\157\x6e\x3a\x20" . $vw->getAttribute("\126\145\x72\x73\x69\x6f\156"));
        NT:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($vw->getAttribute("\111\163\163\165\x65\111\x6e\163\x74\x61\x6e\164"));
        $Ja = SAMLSPUtilities::xpQuery($vw, "\x2e\x2f\163\141\x6d\x6c\137\141\x73\163\x65\x72\x74\x69\x6f\156\72\111\163\163\165\x65\x72");
        if (!empty($Ja)) {
            goto H9;
        }
        throw new Exception("\x4d\151\163\163\x69\156\x67\x20\x3c\x73\141\x6d\154\72\111\163\163\x75\x65\162\x3e\x20\151\x6e\x20\x61\x73\x73\145\162\x74\x69\157\x6e\x2e");
        H9:
        $this->issuer = trim($Ja[0]->textContent);
        $this->parseConditions($vw);
        $this->parseAuthnStatement($vw);
        $this->parseAttributes($vw);
        $this->parseEncryptedAttributes($vw);
        $this->parseSignature($vw);
        $this->parseSubject($vw);
    }
    private function parseSubject(DOMElement $vw)
    {
        $Tu = SAMLSPUtilities::xpQuery($vw, "\56\x2f\x73\x61\x6d\154\137\141\163\163\145\162\x74\151\157\156\72\x53\165\x62\152\145\x63\x74");
        if (empty($Tu)) {
            goto PW;
        }
        if (count($Tu) > 1) {
            goto bD;
        }
        goto hV;
        PW:
        return;
        goto hV;
        bD:
        throw new Exception("\x4d\x6f\162\145\x20\164\150\x61\x6e\40\157\156\145\x20\74\x73\141\x6d\x6c\x3a\123\165\142\152\x65\x63\164\x3e\x20\x69\156\40\x3c\163\x61\x6d\x6c\x3a\101\163\163\x65\162\x74\151\x6f\x6e\x3e\x2e");
        hV:
        $Tu = $Tu[0];
        $RM = SAMLSPUtilities::xpQuery($Tu, "\x2e\57\x73\141\x6d\154\x5f\141\163\x73\x65\x72\164\x69\x6f\x6e\72\x4e\141\155\145\111\x44\40\174\40\x2e\57\163\x61\155\x6c\x5f\141\x73\x73\145\x72\164\151\x6f\x6e\x3a\x45\156\x63\162\x79\160\164\145\x64\111\x44\57\170\145\156\x63\72\105\x6e\143\x72\171\x70\x74\x65\144\104\141\x74\141");
        if (empty($RM)) {
            goto lX;
        }
        if (count($RM) > 1) {
            goto lB;
        }
        goto Tb;
        lX:
        if ($_POST["\x52\145\154\141\x79\123\164\x61\164\145"] == "\x74\145\163\164\126\x61\x6c\151\144\x61\164\x65") {
            goto Q6;
        }
        wp_die("\x57\x65\40\143\x6f\165\x6c\x64\40\156\157\164\40\163\x69\147\156\40\x79\x6f\165\x20\151\x6e\56\x20\x50\x6c\x65\141\x73\x65\x20\143\x6f\156\x74\x61\x63\164\x20\171\157\165\162\40\141\x64\x6d\x69\156\x69\163\x74\x72\x61\164\x6f\x72");
        goto Vx;
        Q6:
        echo "\74\144\x69\166\x20\163\164\x79\154\145\x3d\42\146\157\156\x74\x2d\146\141\x6d\x69\154\171\72\103\141\x6c\151\142\x72\151\x3b\x70\141\x64\144\x69\156\147\72\60\40\x33\x25\x3b\x22\76";
        echo "\74\144\x69\x76\40\163\x74\x79\x6c\x65\75\42\x63\157\154\x6f\x72\x3a\40\43\x61\71\x34\64\64\62\x3b\142\x61\143\153\147\x72\x6f\165\156\x64\55\x63\157\x6c\x6f\162\72\40\43\x66\x32\x64\x65\144\x65\x3b\160\141\x64\x64\151\156\x67\x3a\x20\x31\x35\160\170\73\155\x61\x72\147\x69\x6e\55\x62\157\x74\x74\157\x6d\x3a\x20\62\x30\x70\170\73\164\145\x78\164\x2d\141\x6c\x69\x67\156\72\143\145\x6e\164\145\x72\73\142\157\162\144\x65\162\x3a\61\160\170\40\x73\157\x6c\x69\144\40\x23\x45\66\102\63\102\x32\73\146\x6f\156\x74\x2d\x73\151\x7a\x65\x3a\61\70\160\164\x3b\42\76\40\x45\x52\122\x4f\x52\x3c\x2f\x64\151\x76\76\12\x20\40\x20\x20\x20\x20\40\x20\40\x20\40\x3c\144\x69\x76\x20\163\x74\171\154\x65\x3d\x22\143\157\154\x6f\162\72\40\x23\x61\x39\64\x34\x34\62\73\x66\x6f\156\x74\x2d\x73\x69\172\x65\x3a\61\x34\x70\164\73\x20\x6d\x61\x72\147\151\x6e\x2d\x62\157\164\164\x6f\x6d\x3a\x32\x30\x70\170\73\x22\x3e\74\x70\76\74\163\x74\x72\157\156\147\x3e\105\x72\162\157\x72\x3a\x20\74\x2f\x73\x74\162\x6f\x6e\147\x3e\115\151\x73\163\x69\156\x67\40\x20\116\141\155\145\111\104\x20\x6f\x72\x20\x45\x6e\x63\x72\171\160\164\x65\x64\111\104\x20\x69\x6e\40\123\x41\115\114\40\x52\x65\163\x70\x6f\x6e\163\x65\x2e\74\x2f\x70\x3e\12\x20\40\x20\40\40\x20\x20\x20\x20\40\40\40\40\x20\x20\40\x3c\x70\76\120\154\145\141\163\x65\x20\x63\x6f\x6e\164\141\x63\x74\x20\171\157\165\162\40\141\x64\155\151\156\151\163\x74\x72\141\x74\x6f\162\x20\x61\156\x64\x20\x72\145\x70\157\162\x74\x20\164\x68\x65\x20\146\x6f\154\154\x6f\x77\x69\156\x67\40\145\162\x72\157\x72\x3a\x3c\57\160\76\12\40\40\40\40\x20\x20\40\40\x20\x20\40\x20\x20\x20\40\40\x3c\160\76\x3c\x73\x74\x72\157\156\x67\x3e\120\157\x73\x73\x69\x62\x6c\x65\x20\103\x61\x75\163\x65\72\74\57\163\x74\162\157\x6e\147\x3e\x20\x4e\x61\155\x65\x49\x44\40\x6e\x6f\164\40\x66\x6f\x75\x6e\144\x20\x69\156\x20\x53\101\115\x4c\x20\122\x65\x73\160\x6f\156\x73\145\40\163\x75\142\x6a\145\x63\x74\56\74\57\x70\x3e\xa\x20\x20\40\x20\x20\x20\40\40\40\x20\40\x20\x20\x20\40\x20\74\57\x64\151\166\x3e\xa\x20\40\40\40\40\x20\40\x20\x20\x20\x20\x20\40\40\x20\40\x3c\x64\151\166\40\163\164\171\x6c\x65\x3d\x22\x6d\141\x72\x67\151\x6e\x3a\63\x25\x3b\144\x69\163\160\154\141\x79\72\142\x6c\x6f\143\153\x3b\164\x65\x78\164\x2d\141\154\151\x67\156\72\143\x65\x6e\x74\145\162\x3b\42\x3e\12\40\x20\40\x20\x20\x20\x20\x20\40\x20\x20\40\40\x20\x20\x3c\x66\157\x72\155\40\x61\143\164\x69\x6f\156\75\x22\x69\156\x64\x65\x78\56\x70\150\x70\42\x3e\xa\x20\40\x20\40\x20\x20\x20\x20\x20\40\40\x20\x20\x20\x20\40\74\144\x69\x76\x20\x73\164\171\154\145\x3d\42\155\x61\x72\x67\151\x6e\72\x33\45\x3b\144\x69\163\160\x6c\141\171\x3a\x62\x6c\x6f\143\x6b\x3b\x74\145\170\x74\55\x61\154\151\147\x6e\72\x63\145\x6e\164\x65\162\x3b\42\76\x3c\151\x6e\160\165\164\x20\163\x74\x79\x6c\145\x3d\x22\160\x61\x64\144\151\156\x67\x3a\61\x25\x3b\x77\x69\x64\164\x68\x3a\x31\x30\60\x70\170\x3b\x62\141\x63\x6b\x67\x72\x6f\165\x6e\144\x3a\x20\x23\x30\60\71\61\x43\104\x20\x6e\x6f\156\x65\x20\x72\145\160\145\x61\x74\x20\163\x63\162\157\x6c\x6c\40\x30\x25\x20\x30\45\x3b\143\x75\162\163\x6f\162\x3a\x20\160\157\x69\156\164\145\x72\x3b\x66\x6f\156\x74\x2d\x73\x69\172\x65\x3a\x31\x35\160\x78\x3b\142\157\162\x64\145\x72\55\167\x69\144\164\x68\72\40\61\160\x78\x3b\x62\x6f\x72\x64\x65\x72\55\x73\x74\x79\x6c\145\72\x20\x73\157\x6c\x69\x64\73\142\157\162\x64\x65\x72\55\162\x61\x64\151\x75\163\x3a\x20\63\160\x78\73\x77\150\151\164\x65\x2d\163\160\x61\x63\x65\x3a\x20\x6e\157\167\x72\x61\x70\73\142\x6f\x78\x2d\x73\x69\172\x69\x6e\x67\x3a\40\142\157\x72\x64\x65\x72\x2d\142\157\170\73\x62\x6f\162\x64\x65\162\55\143\x6f\154\157\x72\x3a\40\x23\60\x30\67\63\101\x41\73\x62\157\170\x2d\163\x68\x61\x64\x6f\x77\72\40\60\160\x78\40\61\x70\170\40\x30\x70\170\40\162\147\142\141\50\61\x32\60\54\40\62\x30\60\x2c\x20\x32\63\x30\54\x20\60\56\66\51\x20\151\156\x73\x65\164\x3b\x63\157\x6c\x6f\x72\x3a\x20\x23\x46\x46\106\73\42\x74\171\x70\x65\75\x22\x62\x75\x74\x74\x6f\x6e\42\40\x76\141\154\165\145\75\42\x44\x6f\x6e\145\x22\40\x6f\156\x43\154\x69\143\x6b\x3d\42\x73\145\154\x66\x2e\143\154\x6f\163\x65\50\x29\x3b\x22\76\74\x2f\x64\151\x76\76";
        die;
        Vx:
        goto Tb;
        lB:
        throw new Exception("\115\157\x72\145\x20\x74\150\141\x6e\40\157\156\x65\x20\74\163\x61\155\154\x3a\x4e\141\x6d\x65\x49\x44\x3e\40\157\162\40\x3c\x73\x61\x6d\x6c\x3a\105\x6e\x63\x72\x79\x70\x74\x65\x64\104\x3e\40\151\156\40\74\x73\x61\x6d\154\x3a\x53\x75\142\152\145\x63\x74\x3e\56");
        Tb:
        $RM = $RM[0];
        if ($RM->localName === "\x45\x6e\143\x72\x79\160\164\145\144\104\x61\164\141") {
            goto hw;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($RM);
        goto ga;
        hw:
        $this->encryptedNameId = $RM;
        ga:
    }
    private function parseConditions(DOMElement $vw)
    {
        $Wx = SAMLSPUtilities::xpQuery($vw, "\x2e\57\x73\x61\x6d\154\x5f\141\x73\163\x65\x72\x74\x69\x6f\156\x3a\103\x6f\x6e\144\x69\x74\x69\157\156\163");
        if (empty($Wx)) {
            goto l7;
        }
        if (count($Wx) > 1) {
            goto bm;
        }
        goto t8;
        l7:
        return;
        goto t8;
        bm:
        throw new Exception("\115\157\162\145\x20\164\x68\x61\x6e\x20\x6f\156\x65\x20\74\163\141\155\154\x3a\103\157\156\x64\x69\164\x69\157\x6e\x73\x3e\x20\x69\x6e\40\74\x73\141\x6d\x6c\72\101\x73\x73\x65\x72\x74\x69\157\x6e\76\56");
        t8:
        $Wx = $Wx[0];
        if (!$Wx->hasAttribute("\116\157\x74\102\145\146\x6f\162\145")) {
            goto jK;
        }
        $cc = SAMLSPUtilities::xsDateTimeToTimestamp($Wx->getAttribute("\x4e\157\164\102\145\146\x6f\x72\145"));
        if (!($this->notBefore === NULL || $this->notBefore < $cc)) {
            goto su;
        }
        $this->notBefore = $cc;
        su:
        jK:
        if (!$Wx->hasAttribute("\116\x6f\x74\117\x6e\x4f\162\x41\146\164\x65\x72")) {
            goto mq;
        }
        $zn = SAMLSPUtilities::xsDateTimeToTimestamp($Wx->getAttribute("\x4e\157\164\117\x6e\117\x72\x41\x66\x74\145\x72"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $zn)) {
            goto Op;
        }
        $this->notOnOrAfter = $zn;
        Op:
        mq:
        $Ua = $Wx->firstChild;
        Jt:
        if (!($Ua !== NULL)) {
            goto o7;
        }
        if (!$Ua instanceof DOMText) {
            goto SN;
        }
        goto bZ;
        SN:
        if (!($Ua->namespaceURI !== "\165\162\x6e\x3a\x6f\141\163\x69\x73\72\156\141\155\145\x73\72\x74\x63\72\123\101\115\x4c\x3a\62\56\60\72\x61\163\163\145\162\164\151\x6f\156")) {
            goto o3;
        }
        throw new Exception("\125\x6e\x6b\x6e\157\167\x6e\40\156\x61\x6d\x65\x73\x70\x61\143\145\40\157\x66\x20\x63\x6f\x6e\x64\151\x74\x69\x6f\x6e\72\x20" . var_export($Ua->namespaceURI, TRUE));
        o3:
        switch ($Ua->localName) {
            case "\x41\165\144\x69\145\x6e\143\x65\x52\145\x73\164\x72\x69\x63\164\151\x6f\x6e":
                $ls = SAMLSPUtilities::extractStrings($Ua, "\165\x72\x6e\x3a\x6f\x61\163\x69\163\x3a\x6e\x61\x6d\x65\163\x3a\164\x63\72\123\x41\115\114\72\x32\x2e\x30\x3a\141\163\163\x65\162\x74\x69\x6f\156", "\101\x75\144\151\145\156\x63\x65");
                if ($this->validAudiences === NULL) {
                    goto D0;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $ls);
                goto p_;
                D0:
                $this->validAudiences = $ls;
                p_:
                goto Ww;
            case "\117\156\145\124\151\155\x65\x55\163\x65":
                goto Ww;
            case "\120\162\x6f\170\x79\x52\145\x73\x74\x72\151\143\x74\x69\x6f\156":
                goto Ww;
            default:
                throw new Exception("\x55\x6e\153\x6e\157\167\x6e\40\x63\157\156\144\x69\164\x69\x6f\156\x3a\x20" . var_export($Ua->localName, TRUE));
        }
        K1:
        Ww:
        bZ:
        $Ua = $Ua->nextSibling;
        goto Jt;
        o7:
    }
    private function parseAuthnStatement(DOMElement $vw)
    {
        $s8 = SAMLSPUtilities::xpQuery($vw, "\x2e\x2f\163\141\155\154\x5f\141\163\163\145\162\164\x69\x6f\x6e\72\x41\x75\x74\x68\156\123\x74\141\x74\x65\x6d\145\x6e\164");
        if (empty($s8)) {
            goto kz;
        }
        if (count($s8) > 1) {
            goto Ok;
        }
        goto C2;
        kz:
        $this->authnInstant = NULL;
        return;
        goto C2;
        Ok:
        throw new Exception("\115\x6f\x72\145\x20\164\150\141\x74\x20\x6f\156\145\40\74\x73\x61\x6d\154\x3a\101\x75\x74\150\x6e\123\164\141\x74\145\155\x65\156\x74\x3e\x20\x69\156\40\74\163\x61\155\x6c\x3a\x41\163\163\x65\x72\164\151\157\x6e\x3e\40\156\x6f\164\40\x73\x75\160\x70\x6f\162\164\145\144\x2e");
        C2:
        $Ld = $s8[0];
        if ($Ld->hasAttribute("\x41\x75\x74\x68\x6e\111\156\x73\164\141\x6e\164")) {
            goto qH;
        }
        throw new Exception("\115\151\163\x73\x69\x6e\147\x20\162\145\161\165\x69\162\x65\144\40\x41\x75\x74\150\x6e\111\x6e\x73\164\141\156\x74\x20\x61\x74\x74\x72\x69\142\x75\x74\145\x20\x6f\156\40\x3c\x73\141\155\154\x3a\101\x75\164\x68\156\x53\x74\x61\164\145\x6d\x65\156\164\x3e\56");
        qH:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($Ld->getAttribute("\101\165\164\150\x6e\111\156\163\x74\141\156\x74"));
        if (!$Ld->hasAttribute("\x53\145\x73\x73\x69\157\x6e\116\157\x74\x4f\156\x4f\x72\101\x66\164\x65\x72")) {
            goto qk;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($Ld->getAttribute("\123\145\x73\x73\151\157\x6e\116\x6f\164\117\x6e\117\x72\101\146\164\x65\x72"));
        qk:
        if (!$Ld->hasAttribute("\x53\x65\x73\x73\x69\x6f\156\x49\x6e\x64\145\x78")) {
            goto iY;
        }
        $this->sessionIndex = $Ld->getAttribute("\123\145\163\x73\151\x6f\x6e\x49\x6e\144\x65\x78");
        iY:
        $this->parseAuthnContext($Ld);
    }
    private function parseAuthnContext(DOMElement $iA)
    {
        $gr = SAMLSPUtilities::xpQuery($iA, "\56\x2f\163\141\155\154\x5f\x61\163\x73\145\162\164\x69\157\156\x3a\x41\165\x74\x68\x6e\103\x6f\x6e\164\x65\170\x74");
        if (count($gr) > 1) {
            goto Y8;
        }
        if (empty($gr)) {
            goto AD;
        }
        goto zI;
        Y8:
        throw new Exception("\115\157\162\x65\40\164\150\141\x6e\x20\157\x6e\x65\40\x3c\163\x61\155\154\72\x41\165\164\x68\x6e\103\x6f\156\164\145\x78\x74\76\40\151\156\x20\74\163\141\x6d\x6c\x3a\x41\x75\x74\150\x6e\x53\x74\x61\164\x65\155\x65\156\164\x3e\56");
        goto zI;
        AD:
        throw new Exception("\115\151\163\x73\151\x6e\x67\x20\x72\145\161\165\151\x72\x65\x64\x20\74\163\x61\x6d\154\72\101\x75\x74\150\x6e\103\x6f\156\x74\x65\x78\x74\x3e\x20\x69\x6e\40\74\163\x61\x6d\x6c\x3a\x41\165\x74\150\x6e\x53\164\x61\x74\145\x6d\x65\156\x74\76\56");
        zI:
        $hq = $gr[0];
        $f8 = SAMLSPUtilities::xpQuery($hq, "\x2e\57\x73\x61\155\x6c\137\x61\x73\163\x65\162\x74\x69\157\156\x3a\x41\165\164\150\x6e\103\x6f\x6e\x74\x65\x78\164\104\x65\x63\154\122\145\146");
        if (count($f8) > 1) {
            goto b8;
        }
        if (count($f8) === 1) {
            goto yH;
        }
        goto Dm;
        b8:
        throw new Exception("\115\x6f\162\145\40\164\150\x61\x6e\40\x6f\156\145\40\74\163\x61\x6d\x6c\72\x41\165\164\x68\x6e\103\157\x6e\164\x65\170\x74\x44\x65\143\154\x52\x65\x66\x3e\x20\146\x6f\x75\x6e\144\x3f");
        goto Dm;
        yH:
        $this->setAuthnContextDeclRef(trim($f8[0]->textContent));
        Dm:
        $Zk = SAMLSPUtilities::xpQuery($hq, "\x2e\57\x73\x61\155\154\137\x61\163\163\x65\162\164\151\157\156\x3a\101\165\164\x68\156\x43\x6f\156\x74\145\x78\x74\x44\145\143\x6c");
        if (count($Zk) > 1) {
            goto w5;
        }
        if (count($Zk) === 1) {
            goto KY;
        }
        goto cY;
        w5:
        throw new Exception("\x4d\x6f\x72\145\40\x74\x68\141\x6e\40\157\156\x65\40\x3c\163\x61\155\x6c\72\x41\x75\x74\x68\156\x43\x6f\x6e\x74\x65\170\x74\x44\x65\143\154\76\x20\x66\157\165\x6e\x64\x3f");
        goto cY;
        KY:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($Zk[0]));
        cY:
        $R2 = SAMLSPUtilities::xpQuery($hq, "\x2e\x2f\163\141\x6d\x6c\137\x61\163\x73\145\x72\164\x69\x6f\156\72\x41\165\164\x68\156\103\157\x6e\164\145\170\164\x43\154\x61\163\x73\x52\x65\146");
        if (count($R2) > 1) {
            goto B0;
        }
        if (count($R2) === 1) {
            goto jY;
        }
        goto uT;
        B0:
        throw new Exception("\x4d\157\x72\145\x20\164\x68\141\156\40\x6f\156\x65\x20\74\163\x61\x6d\154\72\101\x75\164\x68\156\x43\x6f\x6e\164\x65\x78\164\103\x6c\141\163\163\x52\145\146\76\x20\x69\156\x20\x3c\x73\x61\x6d\154\72\x41\x75\x74\x68\x6e\103\157\x6e\164\145\x78\164\76\x2e");
        goto uT;
        jY:
        $this->setAuthnContextClassRef(trim($R2[0]->textContent));
        uT:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto lY;
        }
        throw new Exception("\115\x69\x73\x73\x69\156\x67\x20\x65\151\164\150\145\162\x20\74\x73\x61\x6d\x6c\72\101\165\164\x68\156\x43\157\x6e\x74\x65\x78\x74\x43\154\x61\x73\163\122\145\x66\x3e\40\157\162\40\74\x73\141\x6d\x6c\72\101\x75\x74\x68\156\x43\x6f\x6e\x74\145\170\x74\104\x65\143\x6c\x52\x65\146\x3e\x20\157\162\x20\x3c\163\141\x6d\154\72\x41\x75\164\150\x6e\103\157\x6e\x74\145\x78\x74\x44\145\x63\154\x3e");
        lY:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($hq, "\x75\x72\x6e\72\x6f\x61\163\x69\163\72\x6e\141\155\x65\163\72\164\x63\72\123\x41\115\x4c\72\x32\x2e\x30\72\141\163\163\x65\x72\164\151\157\156", "\101\x75\164\150\145\156\x74\151\143\141\x74\151\x6e\x67\x41\x75\164\150\157\162\151\x74\171");
    }
    private function parseAttributes(DOMElement $vw)
    {
        $p0 = TRUE;
        $KM = SAMLSPUtilities::xpQuery($vw, "\56\x2f\163\141\x6d\x6c\137\141\163\163\145\162\164\151\x6f\156\72\101\164\x74\162\x69\142\x75\x74\145\x53\x74\x61\164\x65\x6d\x65\x6e\164\57\x73\141\x6d\x6c\x5f\141\x73\x73\145\162\164\x69\157\156\x3a\101\164\164\x72\x69\x62\165\x74\x65");
        foreach ($KM as $jV) {
            if ($jV->hasAttribute("\x4e\141\x6d\x65")) {
                goto zL;
            }
            throw new Exception("\x4d\151\x73\163\151\156\147\x20\x6e\141\x6d\145\x20\x6f\156\x20\x3c\x73\x61\x6d\x6c\72\101\164\164\162\x69\142\x75\164\x65\x3e\x20\145\x6c\x65\x6d\145\x6e\164\56");
            zL:
            $M7 = $jV->getAttribute("\x4e\141\x6d\x65");
            if ($jV->hasAttribute("\x4e\x61\x6d\145\106\x6f\162\x6d\x61\164")) {
                goto lW;
            }
            $EK = "\165\162\156\x3a\157\x61\x73\151\163\x3a\156\x61\155\x65\163\x3a\x74\x63\x3a\123\x41\115\114\72\x31\56\x31\x3a\x6e\x61\x6d\x65\x69\144\x2d\x66\157\x72\x6d\141\164\72\165\156\163\x70\x65\x63\151\x66\151\x65\144";
            goto S8;
            lW:
            $EK = $jV->getAttribute("\116\141\x6d\x65\106\157\162\x6d\x61\164");
            S8:
            if ($p0) {
                goto nq;
            }
            if (!($this->nameFormat !== $EK)) {
                goto uv;
            }
            $this->nameFormat = "\x75\162\x6e\72\x6f\x61\163\151\163\72\x6e\x61\x6d\x65\x73\x3a\x74\143\72\123\x41\115\x4c\x3a\61\x2e\x31\72\x6e\141\x6d\x65\x69\x64\x2d\146\157\162\x6d\141\164\72\x75\156\x73\x70\145\x63\151\146\x69\145\144";
            uv:
            goto Hz;
            nq:
            $this->nameFormat = $EK;
            $p0 = FALSE;
            Hz:
            if (array_key_exists($M7, $this->attributes)) {
                goto L_;
            }
            $this->attributes[$M7] = array();
            L_:
            $yE = SAMLSPUtilities::xpQuery($jV, "\56\57\x73\x61\155\154\137\141\163\163\x65\162\x74\x69\x6f\x6e\x3a\x41\164\164\162\151\x62\165\x74\x65\x56\x61\x6c\x75\x65");
            foreach ($yE as $q0) {
                $this->attributes[$M7][] = trim($q0->textContent);
                A8:
            }
            RA:
            jH:
        }
        Uu:
    }
    private function parseEncryptedAttributes(DOMElement $vw)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($vw, "\56\57\x73\141\155\x6c\x5f\141\163\x73\145\x72\164\x69\157\x6e\x3a\101\164\164\162\x69\x62\165\x74\145\123\164\x61\164\145\155\x65\x6e\x74\x2f\x73\141\x6d\x6c\x5f\141\163\x73\x65\162\164\151\157\156\x3a\105\x6e\143\162\171\160\x74\145\144\101\x74\164\x72\x69\142\x75\164\145");
    }
    private function parseSignature(DOMElement $vw)
    {
        $Yd = SAMLSPUtilities::validateElement($vw);
        if (!($Yd !== FALSE)) {
            goto NB;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $Yd["\103\x65\162\164\151\146\x69\143\x61\164\145\x73"];
        $this->signatureData = $Yd;
        NB:
    }
    public function validate(XMLSecurityKey $nz)
    {
        if (!($this->signatureData === NULL)) {
            goto sA;
        }
        return FALSE;
        sA:
        SAMLSPUtilities::validateSignature($this->signatureData, $nz);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($o1)
    {
        $this->id = $o1;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($J3)
    {
        $this->issueInstant = $J3;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Ja)
    {
        $this->issuer = $Ja;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto PX;
        }
        throw new Exception("\101\x74\x74\145\155\160\x74\145\x64\x20\x74\157\40\162\x65\164\x72\151\x65\166\145\x20\x65\x6e\x63\162\171\160\164\145\x64\40\x4e\x61\x6d\x65\x49\104\40\x77\x69\164\x68\157\165\x74\x20\x64\145\143\x72\171\x70\164\151\156\147\x20\151\x74\40\x66\151\x72\x73\164\56");
        PX:
        return $this->nameId;
    }
    public function setNameId($RM)
    {
        $this->nameId = $RM;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto ut;
        }
        return TRUE;
        ut:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $nz)
    {
        $oL = new DOMDocument();
        $KQ = $oL->createElement("\162\157\157\164");
        $oL->appendChild($KQ);
        SAMLSPUtilities::addNameId($KQ, $this->nameId);
        $RM = $KQ->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($RM, "\x65\156\143\x72\171\160\x74");
        $Ds = new XMLSecEnc();
        $Ds->setNode($RM);
        $Ds->type = XMLSecEnc::Element;
        $Rk = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Rk->generateSessionKey();
        $Ds->encryptKey($nz, $Rk);
        $this->encryptedNameId = $Ds->encryptNode($Rk);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $nz, array $hO = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto hq;
        }
        return;
        hq:
        $RM = SAMLSPUtilities::decryptElement($this->encryptedNameId, $nz, $hO);
        SAMLSPUtilities::getContainer()->debugMessage($RM, "\144\x65\143\162\171\x70\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($RM);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $nz, array $hO = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto D5;
        }
        return;
        D5:
        $p0 = TRUE;
        $KM = $this->encryptedAttribute;
        foreach ($KM as $wG) {
            $jV = SAMLSPUtilities::decryptElement($wG->getElementsByTagName("\x45\x6e\x63\162\171\x70\164\x65\x64\x44\141\164\141")->item(0), $nz, $hO);
            if ($jV->hasAttribute("\116\141\x6d\x65")) {
                goto eX;
            }
            throw new Exception("\115\151\163\163\x69\156\x67\40\x6e\x61\x6d\145\40\x6f\156\x20\74\x73\x61\x6d\x6c\72\x41\164\x74\162\151\x62\165\x74\x65\x3e\x20\145\154\x65\155\145\x6e\164\x2e");
            eX:
            $M7 = $jV->getAttribute("\116\141\x6d\145");
            if ($jV->hasAttribute("\116\141\155\x65\106\157\x72\155\141\164")) {
                goto Dz;
            }
            $EK = "\x75\x72\156\72\x6f\x61\163\151\x73\x3a\156\x61\x6d\145\x73\72\x74\x63\72\x53\x41\x4d\x4c\72\x32\x2e\60\72\141\x74\x74\162\156\141\155\145\x2d\x66\157\x72\155\141\x74\x3a\x75\x6e\163\160\x65\143\151\x66\x69\x65\x64";
            goto ta;
            Dz:
            $EK = $jV->getAttribute("\116\141\155\145\106\157\x72\155\x61\x74");
            ta:
            if ($p0) {
                goto bo;
            }
            if (!($this->nameFormat !== $EK)) {
                goto oe;
            }
            $this->nameFormat = "\x75\x72\156\x3a\x6f\141\163\151\x73\x3a\156\141\155\145\163\x3a\164\x63\x3a\x53\101\115\x4c\72\62\56\60\x3a\141\164\x74\x72\x6e\x61\x6d\x65\55\146\157\162\x6d\x61\164\x3a\165\x6e\x73\x70\145\x63\151\x66\x69\x65\x64";
            oe:
            goto Ri;
            bo:
            $this->nameFormat = $EK;
            $p0 = FALSE;
            Ri:
            if (array_key_exists($M7, $this->attributes)) {
                goto VR;
            }
            $this->attributes[$M7] = array();
            VR:
            $yE = SAMLSPUtilities::xpQuery($jV, "\56\57\x73\141\x6d\154\137\x61\x73\x73\145\x72\164\x69\x6f\156\72\x41\164\164\162\151\142\165\x74\x65\x56\x61\x6c\165\145");
            foreach ($yE as $q0) {
                $this->attributes[$M7][] = trim($q0->textContent);
                pn:
            }
            dd:
            i5:
        }
        E3:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($cc)
    {
        $this->notBefore = $cc;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($zn)
    {
        $this->notOnOrAfter = $zn;
    }
    public function setEncryptedAttributes($yA)
    {
        $this->requiredEncAttributes = $yA;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $hx = NULL)
    {
        $this->validAudiences = $hx;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($aG)
    {
        $this->authnInstant = $aG;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($Hx)
    {
        $this->sessionNotOnOrAfter = $Hx;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($yW)
    {
        $this->sessionIndex = $yW;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto KH;
        }
        return $this->authnContextClassRef;
        KH:
        if (empty($this->authnContextDeclRef)) {
            goto I3;
        }
        return $this->authnContextDeclRef;
        I3:
        return NULL;
    }
    public function setAuthnContext($E7)
    {
        $this->setAuthnContextClassRef($E7);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($tN)
    {
        $this->authnContextClassRef = $tN;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $Kh)
    {
        if (empty($this->authnContextDeclRef)) {
            goto Mh;
        }
        throw new Exception("\101\165\x74\150\156\x43\x6f\x6e\164\145\170\164\104\x65\143\x6c\122\x65\146\x20\151\163\40\x61\x6c\162\x65\x61\144\171\40\162\x65\x67\151\163\x74\145\x72\145\144\x21\40\115\141\171\x20\x6f\x6e\x6c\x79\x20\150\x61\166\145\x20\145\x69\164\150\x65\x72\40\141\40\x44\145\x63\x6c\x20\157\x72\x20\x61\40\104\x65\x63\x6c\122\145\146\x2c\40\x6e\x6f\x74\x20\x62\x6f\164\150\41");
        Mh:
        $this->authnContextDecl = $Kh;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($BC)
    {
        if (empty($this->authnContextDecl)) {
            goto Nn;
        }
        throw new Exception("\101\165\x74\x68\156\x43\157\156\164\145\170\x74\x44\145\143\154\x20\x69\x73\x20\141\154\x72\x65\141\144\x79\40\162\145\147\151\163\164\145\162\x65\x64\41\x20\115\141\171\x20\157\156\154\171\40\x68\x61\166\x65\40\145\151\x74\150\145\x72\40\141\40\x44\145\x63\x6c\40\x6f\162\x20\x61\40\x44\x65\143\154\x52\x65\146\x2c\40\x6e\157\164\40\x62\157\164\x68\41");
        Nn:
        $this->authnContextDeclRef = $BC;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($IQ)
    {
        $this->AuthenticatingAuthority = $IQ;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $KM)
    {
        $this->attributes = $KM;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($EK)
    {
        $this->nameFormat = $EK;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $Mf)
    {
        $this->SubjectConfirmation = $Mf;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $oI = NULL)
    {
        $this->signatureKey = $oI;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $DE = NULL)
    {
        $this->encryptionKey = $DE;
    }
    public function setCertificates(array $ZY)
    {
        $this->certificates = $ZY;
    }
    public function getCertificates()
    {
        return $this->certificates;
    }
    public function getSignatureData()
    {
        return $this->signatureData;
    }
    public function getWasSignedAtConstruction()
    {
        return $this->wasSignedAtConstruction;
    }
    public function toXML(DOMNode $ka = NULL)
    {
        if ($ka === NULL) {
            goto wU;
        }
        $L_ = $ka->ownerDocument;
        goto nG;
        wU:
        $L_ = new DOMDocument();
        $ka = $L_;
        nG:
        $KQ = $L_->createElementNS("\x75\x72\156\72\x6f\x61\163\151\163\x3a\156\141\x6d\x65\163\72\x74\x63\x3a\x53\101\115\x4c\x3a\62\x2e\60\72\141\163\x73\x65\162\x74\x69\x6f\x6e", "\163\141\x6d\x6c\x3a" . "\x41\x73\163\145\x72\x74\151\x6f\x6e");
        $ka->appendChild($KQ);
        $KQ->setAttributeNS("\x75\x72\156\x3a\x6f\141\163\x69\163\x3a\156\x61\x6d\145\x73\72\x74\x63\x3a\123\101\x4d\x4c\x3a\62\56\x30\72\x70\162\x6f\x74\x6f\143\x6f\x6c", "\x73\x61\155\x6c\160\x3a\164\155\160", "\x74\x6d\x70");
        $KQ->removeAttributeNS("\165\162\156\x3a\157\141\163\151\163\72\x6e\x61\x6d\145\x73\x3a\164\143\72\x53\x41\115\114\72\62\56\x30\x3a\x70\x72\157\x74\x6f\143\x6f\x6c", "\x74\x6d\160");
        $KQ->setAttributeNS("\x68\164\x74\160\x3a\57\x2f\167\167\167\56\167\63\x2e\157\x72\147\57\62\x30\60\x31\x2f\130\115\114\123\143\150\x65\155\x61\x2d\x69\156\163\x74\141\156\143\x65", "\170\x73\x69\72\164\x6d\x70", "\164\x6d\160");
        $KQ->removeAttributeNS("\x68\x74\x74\x70\72\57\57\167\167\x77\x2e\167\63\56\157\162\147\x2f\x32\x30\60\x31\57\130\x4d\x4c\x53\143\x68\x65\x6d\x61\x2d\x69\x6e\163\164\x61\x6e\x63\145", "\x74\x6d\160");
        $KQ->setAttributeNS("\x68\164\x74\160\72\57\x2f\x77\x77\167\x2e\x77\x33\56\x6f\162\147\x2f\x32\x30\60\61\x2f\130\115\x4c\x53\x63\150\145\155\141", "\170\x73\72\164\155\160", "\164\x6d\x70");
        $KQ->removeAttributeNS("\x68\164\164\x70\x3a\x2f\57\167\167\167\x2e\x77\63\x2e\x6f\162\x67\57\x32\60\x30\x31\x2f\x58\x4d\x4c\123\143\150\145\155\141", "\x74\155\x70");
        $KQ->setAttribute("\x49\104", $this->id);
        $KQ->setAttribute("\x56\x65\x72\x73\x69\x6f\156", "\62\56\60");
        $KQ->setAttribute("\111\163\163\x75\145\111\x6e\x73\x74\141\156\x74", gmdate("\x59\55\155\x2d\x64\x5c\x54\110\x3a\151\72\x73\134\x5a", $this->issueInstant));
        $Ja = SAMLSPUtilities::addString($KQ, "\x75\x72\x6e\72\157\x61\x73\151\163\72\x6e\141\155\x65\163\x3a\x74\143\72\x53\x41\115\x4c\x3a\x32\56\x30\x3a\x61\x73\163\145\162\x74\x69\157\156", "\163\141\155\x6c\x3a\x49\x73\x73\165\145\162", $this->issuer);
        $this->addSubject($KQ);
        $this->addConditions($KQ);
        $this->addAuthnStatement($KQ);
        if ($this->requiredEncAttributes == FALSE) {
            goto WR;
        }
        $this->addEncryptedAttributeStatement($KQ);
        goto xM;
        WR:
        $this->addAttributeStatement($KQ);
        xM:
        if (!($this->signatureKey !== NULL)) {
            goto kH;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $KQ, $Ja->nextSibling);
        kH:
        return $KQ;
    }
    private function addSubject(DOMElement $KQ)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto ra;
        }
        return;
        ra:
        $Tu = $KQ->ownerDocument->createElementNS("\x75\x72\156\72\x6f\141\163\x69\163\72\156\141\x6d\x65\163\x3a\164\143\x3a\123\101\115\114\72\62\x2e\x30\x3a\x61\163\163\145\162\164\x69\157\x6e", "\x73\141\155\x6c\x3a\123\165\x62\x6a\145\x63\x74");
        $KQ->appendChild($Tu);
        if ($this->encryptedNameId === NULL) {
            goto g0;
        }
        $fU = $Tu->ownerDocument->createElementNS("\x75\x72\156\72\157\141\163\151\163\x3a\156\141\155\145\163\x3a\164\143\x3a\123\x41\115\x4c\72\62\56\x30\x3a\141\163\163\145\162\x74\x69\157\x6e", "\x73\141\x6d\x6c\72" . "\x45\x6e\x63\x72\171\x70\x74\145\144\111\104");
        $Tu->appendChild($fU);
        $fU->appendChild($Tu->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto j4;
        g0:
        SAMLSPUtilities::addNameId($Tu, $this->nameId);
        j4:
        foreach ($this->SubjectConfirmation as $wT) {
            $wT->toXML($Tu);
            eC:
        }
        B6:
    }
    private function addConditions(DOMElement $KQ)
    {
        $L_ = $KQ->ownerDocument;
        $Wx = $L_->createElementNS("\x75\162\156\x3a\x6f\141\x73\151\x73\72\x6e\x61\x6d\x65\163\x3a\164\143\72\123\x41\115\114\x3a\62\x2e\x30\72\x61\x73\x73\x65\162\164\x69\x6f\x6e", "\x73\x61\155\154\72\103\157\x6e\144\x69\x74\151\x6f\156\x73");
        $KQ->appendChild($Wx);
        if (!($this->notBefore !== NULL)) {
            goto IJ;
        }
        $Wx->setAttribute("\x4e\157\164\x42\x65\x66\157\162\145", gmdate("\131\x2d\155\x2d\144\x5c\124\x48\x3a\151\x3a\163\134\132", $this->notBefore));
        IJ:
        if (!($this->notOnOrAfter !== NULL)) {
            goto oP;
        }
        $Wx->setAttribute("\x4e\157\164\x4f\x6e\117\x72\101\146\164\x65\x72", gmdate("\131\55\x6d\x2d\144\134\124\x48\x3a\151\72\x73\134\x5a", $this->notOnOrAfter));
        oP:
        if (!($this->validAudiences !== NULL)) {
            goto qa;
        }
        $Ut = $L_->createElementNS("\165\x72\156\72\157\141\163\151\x73\x3a\x6e\141\155\x65\163\72\164\x63\72\123\x41\115\114\72\x32\x2e\60\x3a\141\x73\x73\x65\x72\164\x69\x6f\156", "\163\x61\x6d\154\x3a\x41\165\144\x69\x65\x6e\x63\x65\122\x65\x73\x74\x72\x69\x63\x74\x69\x6f\156");
        $Wx->appendChild($Ut);
        SAMLSPUtilities::addStrings($Ut, "\x75\x72\156\x3a\157\141\x73\151\163\x3a\x6e\x61\155\145\x73\72\x74\143\72\x53\x41\115\114\72\62\56\60\72\x61\163\163\x65\162\x74\151\x6f\156", "\x73\141\x6d\154\x3a\x41\165\144\x69\145\x6e\x63\145", FALSE, $this->validAudiences);
        qa:
    }
    private function addAuthnStatement(DOMElement $KQ)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto Vj;
        }
        return;
        Vj:
        $L_ = $KQ->ownerDocument;
        $iA = $L_->createElementNS("\x75\x72\x6e\x3a\157\141\163\151\x73\x3a\156\x61\x6d\145\x73\x3a\x74\143\72\x53\x41\x4d\114\x3a\62\56\60\x3a\141\x73\163\145\x72\164\x69\157\x6e", "\163\x61\155\x6c\x3a\x41\x75\x74\150\x6e\x53\164\141\164\x65\155\145\x6e\x74");
        $KQ->appendChild($iA);
        $iA->setAttribute("\x41\165\164\150\x6e\111\156\163\x74\x61\156\x74", gmdate("\x59\x2d\155\55\x64\x5c\124\110\72\151\72\x73\134\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto aA;
        }
        $iA->setAttribute("\x53\x65\x73\163\151\x6f\x6e\116\157\164\117\x6e\117\162\101\146\164\145\x72", gmdate("\x59\x2d\x6d\55\x64\134\124\110\72\151\x3a\x73\134\132", $this->sessionNotOnOrAfter));
        aA:
        if (!($this->sessionIndex !== NULL)) {
            goto eS;
        }
        $iA->setAttribute("\123\145\x73\163\151\x6f\x6e\x49\x6e\144\145\170", $this->sessionIndex);
        eS:
        $hq = $L_->createElementNS("\x75\x72\x6e\72\x6f\141\163\151\x73\x3a\x6e\141\x6d\145\163\72\164\143\72\x53\x41\x4d\x4c\x3a\62\x2e\60\x3a\x61\163\163\x65\x72\x74\x69\x6f\x6e", "\163\141\x6d\x6c\x3a\101\x75\164\x68\x6e\x43\x6f\156\x74\145\x78\164");
        $iA->appendChild($hq);
        if (empty($this->authnContextClassRef)) {
            goto tS;
        }
        SAMLSPUtilities::addString($hq, "\x75\162\156\72\157\x61\163\151\x73\72\156\x61\x6d\x65\163\x3a\164\x63\72\123\x41\115\114\x3a\x32\x2e\x30\x3a\141\x73\x73\x65\162\164\x69\x6f\156", "\163\141\x6d\154\x3a\101\165\164\150\156\103\157\156\164\x65\x78\164\103\154\141\x73\163\x52\x65\146", $this->authnContextClassRef);
        tS:
        if (empty($this->authnContextDecl)) {
            goto E_;
        }
        $this->authnContextDecl->toXML($hq);
        E_:
        if (empty($this->authnContextDeclRef)) {
            goto XW;
        }
        SAMLSPUtilities::addString($hq, "\165\x72\x6e\x3a\157\141\163\151\x73\72\156\141\x6d\145\x73\72\164\143\72\123\101\115\114\x3a\x32\56\60\x3a\141\x73\x73\x65\x72\164\x69\157\156", "\163\x61\x6d\x6c\x3a\x41\165\164\x68\x6e\103\157\x6e\164\145\170\x74\x44\x65\x63\x6c\122\145\146", $this->authnContextDeclRef);
        XW:
        SAMLSPUtilities::addStrings($hq, "\x75\x72\156\x3a\157\x61\163\151\x73\72\156\x61\x6d\x65\163\72\x74\x63\x3a\x53\x41\x4d\114\72\x32\56\60\x3a\x61\163\x73\145\x72\164\151\157\x6e", "\x73\x61\155\x6c\x3a\x41\165\164\150\145\x6e\164\151\143\141\164\x69\156\x67\101\x75\164\150\157\162\151\164\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $KQ)
    {
        if (!empty($this->attributes)) {
            goto vW;
        }
        return;
        vW:
        $L_ = $KQ->ownerDocument;
        $wB = $L_->createElementNS("\x75\162\x6e\72\x6f\141\163\151\x73\x3a\156\x61\155\145\163\x3a\164\x63\72\123\101\x4d\x4c\72\x32\56\60\72\141\x73\163\145\162\x74\x69\157\x6e", "\x73\141\155\154\72\101\164\x74\x72\151\x62\165\x74\x65\123\164\x61\164\x65\x6d\x65\156\164");
        $KQ->appendChild($wB);
        foreach ($this->attributes as $M7 => $yE) {
            $jV = $L_->createElementNS("\165\x72\156\72\x6f\141\x73\151\x73\72\156\x61\155\x65\x73\72\164\143\72\x53\101\x4d\x4c\72\62\x2e\x30\72\141\x73\163\x65\x72\x74\x69\x6f\156", "\x73\141\155\154\x3a\101\164\x74\x72\x69\142\165\x74\145");
            $wB->appendChild($jV);
            $jV->setAttribute("\x4e\x61\x6d\x65", $M7);
            if (!($this->nameFormat !== "\165\x72\x6e\72\157\x61\x73\151\163\72\x6e\141\x6d\145\x73\x3a\x74\x63\72\x53\x41\115\x4c\x3a\62\56\60\72\x61\x74\x74\162\156\141\x6d\145\x2d\146\157\162\155\x61\x74\72\x75\x6e\163\160\145\143\x69\x66\x69\145\144")) {
                goto s_;
            }
            $jV->setAttribute("\x4e\x61\x6d\145\x46\157\162\155\x61\164", $this->nameFormat);
            s_:
            foreach ($yE as $q0) {
                if (is_string($q0)) {
                    goto vd;
                }
                if (is_int($q0)) {
                    goto Mc;
                }
                $Dr = NULL;
                goto Ns;
                vd:
                $Dr = "\170\x73\72\163\164\162\151\156\147";
                goto Ns;
                Mc:
                $Dr = "\x78\x73\72\151\x6e\x74\145\147\x65\x72";
                Ns:
                $U2 = $L_->createElementNS("\165\162\x6e\x3a\157\141\163\151\163\72\x6e\141\155\145\x73\x3a\164\x63\72\x53\x41\115\x4c\x3a\62\x2e\x30\72\141\x73\163\145\x72\164\151\x6f\x6e", "\x73\141\155\x6c\x3a\x41\164\164\x72\151\x62\x75\x74\x65\126\x61\x6c\x75\145");
                $jV->appendChild($U2);
                if (!($Dr !== NULL)) {
                    goto zt;
                }
                $U2->setAttributeNS("\150\x74\164\160\x3a\57\x2f\167\x77\x77\56\167\63\56\x6f\162\147\57\62\x30\60\61\x2f\130\115\114\x53\143\x68\145\155\141\55\x69\x6e\163\x74\141\x6e\143\145", "\170\x73\x69\72\164\x79\x70\x65", $Dr);
                zt:
                if (!is_null($q0)) {
                    goto f4;
                }
                $U2->setAttributeNS("\x68\x74\164\160\x3a\57\57\167\167\x77\56\x77\63\x2e\157\162\147\x2f\x32\60\60\61\57\x58\115\x4c\123\143\150\145\x6d\141\x2d\x69\156\x73\164\141\156\143\x65", "\170\163\151\x3a\156\151\x6c", "\x74\162\x75\x65");
                f4:
                if ($q0 instanceof DOMNodeList) {
                    goto LW;
                }
                $U2->appendChild($L_->createTextNode($q0));
                goto pi;
                LW:
                $Qj = 0;
                O5:
                if (!($Qj < $q0->length)) {
                    goto UA;
                }
                $Ua = $L_->importNode($q0->item($Qj), TRUE);
                $U2->appendChild($Ua);
                Ip:
                $Qj++;
                goto O5;
                UA:
                pi:
                ff:
            }
            hi:
            tI:
        }
        PT:
    }
    private function addEncryptedAttributeStatement(DOMElement $KQ)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto P1;
        }
        return;
        P1:
        $L_ = $KQ->ownerDocument;
        $wB = $L_->createElementNS("\x75\x72\156\72\x6f\141\163\151\x73\x3a\x6e\x61\155\145\x73\x3a\x74\143\72\123\x41\115\114\x3a\62\x2e\60\x3a\141\163\x73\145\162\x74\x69\157\156", "\163\x61\155\x6c\72\x41\x74\164\162\151\x62\165\164\145\x53\164\x61\x74\145\155\x65\x6e\164");
        $KQ->appendChild($wB);
        foreach ($this->attributes as $M7 => $yE) {
            $I2 = new DOMDocument();
            $jV = $I2->createElementNS("\165\x72\x6e\72\x6f\x61\x73\151\x73\72\156\141\155\145\163\x3a\x74\x63\x3a\123\x41\x4d\114\72\62\56\60\x3a\141\x73\x73\x65\162\164\x69\x6f\156", "\163\141\x6d\x6c\72\101\x74\164\162\151\142\x75\164\x65");
            $jV->setAttribute("\116\141\155\145", $M7);
            $I2->appendChild($jV);
            if (!($this->nameFormat !== "\165\x72\x6e\72\157\141\163\151\163\x3a\156\141\x6d\x65\x73\x3a\164\143\x3a\x53\x41\x4d\114\72\62\x2e\x30\72\x61\x74\x74\x72\x6e\x61\x6d\145\x2d\x66\157\x72\x6d\x61\164\72\x75\156\x73\x70\145\x63\x69\146\x69\x65\144")) {
                goto FD;
            }
            $jV->setAttribute("\116\x61\155\145\106\x6f\x72\155\x61\x74", $this->nameFormat);
            FD:
            foreach ($yE as $q0) {
                if (is_string($q0)) {
                    goto Fc;
                }
                if (is_int($q0)) {
                    goto xU;
                }
                $Dr = NULL;
                goto Zb;
                Fc:
                $Dr = "\170\x73\x3a\163\164\162\151\x6e\147";
                goto Zb;
                xU:
                $Dr = "\x78\x73\72\x69\x6e\x74\145\147\145\162";
                Zb:
                $U2 = $I2->createElementNS("\165\x72\156\x3a\157\x61\x73\151\163\72\x6e\x61\155\x65\163\72\x74\x63\72\123\101\x4d\x4c\72\x32\56\x30\72\x61\x73\x73\145\x72\x74\x69\157\x6e", "\x73\x61\x6d\x6c\x3a\101\164\x74\x72\x69\142\x75\x74\x65\x56\141\154\x75\x65");
                $jV->appendChild($U2);
                if (!($Dr !== NULL)) {
                    goto la;
                }
                $U2->setAttributeNS("\x68\164\x74\160\72\57\57\167\167\167\x2e\167\63\x2e\157\x72\x67\x2f\62\60\x30\x31\57\130\115\114\123\143\x68\x65\x6d\141\x2d\x69\x6e\163\164\141\156\143\x65", "\170\163\151\72\x74\171\x70\145", $Dr);
                la:
                if ($q0 instanceof DOMNodeList) {
                    goto Yd;
                }
                $U2->appendChild($I2->createTextNode($q0));
                goto Z8;
                Yd:
                $Qj = 0;
                oa:
                if (!($Qj < $q0->length)) {
                    goto j5;
                }
                $Ua = $I2->importNode($q0->item($Qj), TRUE);
                $U2->appendChild($Ua);
                yc:
                $Qj++;
                goto oa;
                j5:
                Z8:
                HG:
            }
            N_:
            $Lw = new XMLSecEnc();
            $Lw->setNode($I2->documentElement);
            $Lw->type = "\150\x74\x74\160\x3a\x2f\x2f\167\x77\x77\x2e\167\63\x2e\157\162\147\57\62\x30\60\61\57\60\x34\x2f\x78\x6d\154\145\156\143\x23\105\154\145\155\x65\x6e\164";
            $Rk = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $Rk->generateSessionKey();
            $Lw->encryptKey($this->encryptionKey, $Rk);
            $DP = $Lw->encryptNode($Rk);
            $lh = $L_->createElementNS("\x75\162\156\72\x6f\141\163\151\x73\x3a\156\141\x6d\x65\x73\x3a\164\143\x3a\123\x41\x4d\114\x3a\62\x2e\60\x3a\x61\x73\x73\145\x72\164\x69\157\156", "\x73\141\155\154\x3a\x45\x6e\143\162\171\x70\x74\145\144\x41\164\x74\x72\x69\x62\165\x74\145");
            $wB->appendChild($lh);
            $ax = $L_->importNode($DP, TRUE);
            $lh->appendChild($ax);
            GT:
        }
        tT:
    }
}
