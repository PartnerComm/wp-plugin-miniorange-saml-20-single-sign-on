<?php


include_once "\x55\x74\151\154\x69\x74\x69\x65\x73\x2e\160\150\160";
include_once "\x78\155\x6c\x73\x65\x63\154\151\x62\x73\56\160\x68\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
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
    public function __construct(DOMElement $Ip = NULL)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\162\156\x3a\157\x61\x73\x69\163\72\156\141\x6d\x65\x73\x3a\164\143\72\x53\x41\115\x4c\x3a\x31\x2e\61\x3a\156\141\155\x65\151\144\55\146\157\x72\x6d\x61\164\72\x75\x6e\x73\160\145\x63\x69\146\151\x65\x64";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($Ip === NULL)) {
            goto jr;
        }
        return;
        jr:
        if (!($Ip->localName === "\x45\x6e\x63\162\x79\x70\164\145\x64\x41\x73\x73\145\162\x74\x69\x6f\x6e")) {
            goto oa;
        }
        $Qk = SAMLSPUtilities::xpQuery($Ip, "\x2e\57\170\x65\x6e\143\72\x45\x6e\x63\x72\x79\x70\164\145\x64\104\141\x74\141");
        $KL = SAMLSPUtilities::xpQuery($Ip, "\x2f\x2f\x2a\x5b\154\157\x63\x61\x6c\55\156\x61\x6d\x65\x28\51\75\47\105\x6e\143\162\171\x70\164\145\x64\113\145\171\x27\135\x2f\52\x5b\154\x6f\x63\x61\x6c\55\x6e\x61\155\145\x28\51\x3d\47\105\156\143\x72\171\x70\164\x69\x6f\x6e\115\145\x74\x68\x6f\144\x27\135\57\100\x41\x6c\147\157\x72\x69\x74\x68\155");
        $CG = $KL[0]->value;
        $sm = SAMLSPUtilities::getEncryptionAlgorithm($CG);
        if (count($Qk) === 0) {
            goto U8;
        }
        if (count($Qk) > 1) {
            goto gm;
        }
        goto Ho;
        U8:
        throw new Exception("\115\x69\163\163\x69\156\147\x20\145\x6e\143\x72\171\160\164\145\144\x20\144\141\x74\x61\x20\151\156\40\74\163\x61\155\x6c\72\x45\x6e\x63\x72\171\x70\x74\145\144\x41\163\x73\x65\x72\x74\x69\x6f\156\x3e\56");
        goto Ho;
        gm:
        throw new Exception("\x4d\157\x72\145\40\164\x68\141\x6e\40\157\156\145\x20\x65\x6e\143\162\171\160\x74\145\144\40\144\141\164\141\40\145\x6c\x65\x6d\x65\156\x74\40\151\x6e\x20\74\x73\141\155\x6c\x3a\105\156\143\x72\x79\x70\x74\x65\x64\101\x73\x73\x65\x72\164\x69\157\156\76\x2e");
        Ho:
        $k3 = new XMLSecurityKey($sm, array("\164\x79\160\x65" => "\x70\x72\x69\x76\141\x74\145"));
        $WO = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x63\x75\x72\162\145\156\x74\x5f\143\x65\162\164\x5f\160\x72\151\166\x61\164\145\x5f\x6b\145\171");
        $k3->loadKey($WO, FALSE);
        $M6 = new XMLSecurityKey($sm, array("\x74\x79\160\145" => "\x70\162\x69\166\141\x74\x65"));
        $MG = plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\165\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\155\151\156\151\157\162\x61\x6e\x67\x65\x5f\163\160\137\160\x72\x69\166\137\x6b\145\171\x2e\x6b\145\x79";
        $M6->loadKey($MG, TRUE);
        $tH = array();
        $Ip = SAMLSPUtilities::decryptElement($Qk[0], $k3, $tH, $M6);
        oa:
        if ($Ip->hasAttribute("\x49\x44")) {
            goto WQ;
        }
        throw new Exception("\115\151\163\x73\x69\x6e\147\x20\111\x44\x20\141\164\164\162\151\142\x75\x74\145\x20\x6f\x6e\x20\123\x41\x4d\x4c\x20\x61\x73\x73\145\x72\x74\151\157\x6e\56");
        WQ:
        $this->id = $Ip->getAttribute("\111\104");
        if (!($Ip->getAttribute("\126\145\x72\x73\x69\157\x6e") !== "\62\56\60")) {
            goto H4;
        }
        throw new Exception("\125\156\163\165\160\160\157\x72\x74\x65\x64\x20\x76\x65\x72\x73\x69\157\x6e\72\x20" . $Ip->getAttribute("\126\145\x72\x73\151\157\156"));
        H4:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($Ip->getAttribute("\x49\x73\163\165\145\111\156\163\164\x61\x6e\164"));
        $Z6 = SAMLSPUtilities::xpQuery($Ip, "\x2e\57\x73\141\x6d\x6c\x5f\x61\x73\163\145\162\x74\151\x6f\156\x3a\111\x73\x73\x75\145\x72");
        if (!empty($Z6)) {
            goto E7;
        }
        throw new Exception("\x4d\151\x73\163\151\156\147\x20\74\x73\141\x6d\x6c\72\x49\163\163\x75\x65\x72\x3e\40\151\x6e\x20\x61\x73\163\145\162\164\x69\157\156\56");
        E7:
        $this->issuer = trim($Z6[0]->textContent);
        $this->parseConditions($Ip);
        $this->parseAuthnStatement($Ip);
        $this->parseAttributes($Ip);
        $this->parseEncryptedAttributes($Ip);
        $this->parseSignature($Ip);
        $this->parseSubject($Ip);
    }
    private function parseSubject(DOMElement $Ip)
    {
        $dE = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\x73\x61\155\x6c\x5f\141\163\x73\x65\162\164\x69\157\x6e\72\123\x75\142\x6a\145\143\x74");
        if (empty($dE)) {
            goto Ch;
        }
        if (count($dE) > 1) {
            goto Z6;
        }
        goto qu;
        Ch:
        return;
        goto qu;
        Z6:
        throw new Exception("\115\157\162\145\40\x74\x68\x61\x6e\40\x6f\x6e\145\x20\x3c\x73\x61\155\x6c\x3a\x53\x75\x62\x6a\145\x63\164\76\40\151\156\x20\74\x73\141\x6d\x6c\72\101\x73\x73\145\162\164\151\x6f\156\76\x2e");
        qu:
        $dE = $dE[0];
        $HI = SAMLSPUtilities::xpQuery($dE, "\56\x2f\x73\141\155\x6c\137\x61\163\x73\145\x72\x74\x69\x6f\156\72\x4e\141\155\x65\111\104\x20\174\40\x2e\57\x73\141\x6d\x6c\137\x61\x73\163\x65\x72\x74\x69\157\156\x3a\x45\156\143\x72\171\160\164\x65\144\x49\104\57\170\145\x6e\143\72\x45\156\x63\x72\171\160\x74\x65\x64\104\141\164\141");
        if (empty($HI)) {
            goto P4;
        }
        if (count($HI) > 1) {
            goto J0;
        }
        goto pm;
        P4:
        if ($_POST["\122\145\154\141\171\x53\x74\141\164\x65"] == "\164\145\x73\164\126\141\154\x69\x64\141\164\145") {
            goto nP;
        }
        wp_die("\127\145\x20\143\157\165\154\x64\40\156\157\x74\x20\x73\x69\x67\x6e\40\171\x6f\x75\40\151\x6e\x2e\40\x50\154\145\x61\x73\145\40\x63\x6f\156\164\x61\143\x74\40\171\157\x75\162\x20\x61\x64\x6d\151\156\151\163\164\x72\x61\164\x6f\162");
        goto eS;
        nP:
        echo "\74\x64\x69\166\x20\x73\164\x79\x6c\145\75\42\146\x6f\156\x74\55\x66\141\155\151\154\171\x3a\x43\141\154\x69\142\x72\x69\73\160\141\144\144\x69\156\147\x3a\x30\40\63\x25\73\x22\76";
        echo "\74\144\151\x76\40\x73\164\171\x6c\145\x3d\42\143\x6f\154\x6f\162\x3a\40\43\x61\x39\x34\x34\64\62\73\x62\x61\143\153\x67\162\x6f\x75\x6e\x64\x2d\x63\157\154\157\162\72\40\43\x66\62\x64\x65\x64\x65\x3b\160\x61\144\x64\x69\x6e\x67\x3a\x20\61\65\160\x78\73\x6d\x61\162\x67\151\x6e\x2d\x62\x6f\164\164\x6f\x6d\72\x20\62\60\160\x78\73\x74\x65\x78\164\55\141\154\151\147\x6e\x3a\x63\x65\156\x74\145\162\73\142\157\x72\x64\145\x72\x3a\61\160\x78\40\x73\x6f\154\151\144\40\x23\105\66\102\63\102\x32\x3b\x66\x6f\156\164\55\163\x69\172\x65\x3a\x31\x38\x70\x74\x3b\x22\76\x20\105\122\x52\117\122\x3c\x2f\144\151\166\x3e\xa\40\x20\40\40\40\40\x20\40\x20\40\40\x3c\x64\x69\166\x20\x73\x74\x79\154\x65\75\x22\x63\157\x6c\x6f\162\72\x20\x23\x61\x39\64\64\64\62\x3b\x66\x6f\x6e\164\55\x73\151\172\145\x3a\x31\x34\160\x74\73\40\x6d\141\162\x67\151\156\x2d\x62\x6f\x74\164\x6f\155\x3a\62\60\x70\170\x3b\42\x3e\x3c\x70\76\x3c\x73\x74\162\x6f\156\x67\x3e\x45\162\162\157\x72\72\40\x3c\57\x73\164\162\157\156\147\x3e\x4d\151\163\x73\151\x6e\x67\40\x20\116\x61\155\x65\x49\x44\x20\x6f\x72\x20\105\x6e\143\x72\171\x70\164\x65\x64\x49\x44\x20\151\156\x20\123\101\x4d\x4c\40\122\x65\163\160\157\x6e\163\x65\56\x3c\x2f\x70\x3e\xa\40\40\40\40\x20\x20\40\x20\x20\x20\x20\40\40\x20\x20\x20\74\160\x3e\x50\x6c\x65\141\x73\x65\40\x63\157\156\x74\141\143\x74\40\x79\x6f\165\x72\40\141\144\155\x69\x6e\151\x73\x74\x72\141\x74\x6f\162\40\141\156\144\40\162\x65\x70\157\x72\x74\x20\164\150\145\40\x66\157\154\154\x6f\x77\151\156\x67\x20\145\x72\x72\x6f\162\x3a\x3c\57\160\x3e\xa\x20\40\x20\40\x20\x20\x20\40\x20\x20\x20\x20\x20\40\40\40\74\x70\x3e\x3c\163\x74\x72\157\x6e\147\x3e\120\157\x73\163\151\142\x6c\145\40\x43\x61\165\163\x65\72\74\x2f\163\164\x72\157\x6e\147\76\40\116\x61\x6d\145\x49\104\40\156\x6f\x74\40\146\157\x75\156\144\x20\151\x6e\x20\123\x41\x4d\x4c\x20\122\x65\163\160\x6f\x6e\163\145\x20\163\x75\142\152\x65\143\164\56\74\57\160\x3e\xa\x20\40\x20\40\40\40\x20\x20\40\x20\x20\x20\x20\x20\40\40\74\57\x64\x69\x76\x3e\xa\40\x20\x20\40\x20\40\40\40\40\40\x20\x20\40\x20\x20\x20\x3c\144\151\166\40\163\164\x79\x6c\145\75\x22\x6d\141\x72\147\151\156\x3a\63\45\73\144\x69\x73\x70\x6c\x61\171\72\142\x6c\157\x63\x6b\73\164\145\x78\164\55\x61\154\151\147\x6e\x3a\143\x65\x6e\164\x65\162\73\42\x3e\xa\40\x20\x20\x20\x20\40\x20\40\x20\40\x20\40\40\x20\40\x20\x3c\x64\x69\166\40\163\164\171\x6c\145\x3d\x22\x6d\141\162\x67\151\156\x3a\x33\x25\73\x64\151\163\x70\x6c\141\x79\72\142\x6c\x6f\x63\153\x3b\164\x65\170\x74\x2d\x61\154\x69\147\156\x3a\143\145\x6e\164\145\x72\x3b\x22\76\74\151\x6e\160\165\164\40\163\x74\171\x6c\x65\75\42\x70\x61\x64\144\151\156\x67\x3a\61\x25\73\167\x69\x64\x74\x68\72\61\x30\x30\160\170\x3b\x62\141\143\153\147\162\x6f\x75\156\144\72\x20\43\x30\60\71\61\103\104\x20\x6e\157\156\145\x20\x72\145\160\x65\x61\x74\40\x73\143\162\157\x6c\154\x20\60\x25\x20\60\45\73\x63\165\x72\x73\157\x72\x3a\40\x70\157\x69\x6e\164\x65\x72\73\x66\157\156\x74\x2d\163\151\x7a\145\72\x31\x35\x70\x78\73\x62\157\x72\144\x65\162\x2d\x77\x69\x64\164\x68\x3a\x20\x31\x70\170\73\x62\x6f\162\144\145\x72\x2d\163\164\171\x6c\x65\72\x20\x73\x6f\x6c\151\144\73\x62\x6f\x72\144\x65\x72\x2d\162\x61\x64\151\x75\163\x3a\40\x33\x70\170\x3b\167\x68\151\164\145\x2d\163\x70\141\143\x65\72\x20\156\157\x77\x72\x61\x70\x3b\x62\x6f\170\x2d\x73\151\172\x69\156\147\72\x20\142\157\x72\x64\145\x72\55\x62\157\170\73\x62\157\162\x64\x65\x72\55\143\157\x6c\157\162\72\40\x23\60\x30\x37\x33\101\101\x3b\x62\157\x78\55\163\150\141\144\x6f\167\x3a\40\60\x70\x78\40\61\x70\170\40\x30\160\x78\x20\162\x67\142\141\x28\61\62\x30\54\x20\62\x30\60\54\x20\62\x33\x30\x2c\x20\x30\x2e\x36\x29\40\x69\156\x73\145\164\73\143\157\154\157\x72\x3a\x20\43\106\x46\x46\73\x22\x74\171\160\145\75\x22\x62\x75\164\x74\x6f\156\42\x20\166\x61\154\165\x65\x3d\x22\x44\157\x6e\145\42\x20\x6f\x6e\x43\x6c\151\143\x6b\x3d\42\163\x65\x6c\146\56\143\x6c\x6f\163\145\50\51\x3b\42\76\74\57\144\x69\x76\76";
        die;
        eS:
        goto pm;
        J0:
        throw new Exception("\115\157\x72\x65\x20\x74\x68\141\x6e\x20\157\x6e\x65\x20\74\163\141\x6d\154\72\x4e\141\155\x65\x49\104\x3e\40\157\162\x20\x3c\163\x61\155\154\x3a\x45\156\x63\x72\171\x70\x74\x65\x64\104\76\x20\x69\x6e\40\74\x73\141\155\x6c\x3a\x53\x75\x62\x6a\x65\x63\164\x3e\56");
        pm:
        $HI = $HI[0];
        if ($HI->localName === "\105\x6e\x63\162\x79\x70\x74\x65\x64\104\141\164\x61") {
            goto jG;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($HI);
        goto sa;
        jG:
        $this->encryptedNameId = $HI;
        sa:
    }
    private function parseConditions(DOMElement $Ip)
    {
        $dn = SAMLSPUtilities::xpQuery($Ip, "\56\57\x73\141\155\154\x5f\141\163\163\145\x72\x74\x69\157\x6e\x3a\103\x6f\x6e\x64\x69\164\x69\x6f\x6e\x73");
        if (empty($dn)) {
            goto tu;
        }
        if (count($dn) > 1) {
            goto X6;
        }
        goto E9;
        tu:
        return;
        goto E9;
        X6:
        throw new Exception("\x4d\157\162\x65\40\164\150\x61\156\40\157\x6e\145\x20\74\163\141\155\x6c\x3a\103\x6f\156\x64\151\164\151\157\156\x73\x3e\x20\151\156\40\74\163\x61\x6d\154\72\x41\x73\163\x65\x72\164\x69\157\156\x3e\56");
        E9:
        $dn = $dn[0];
        if (!$dn->hasAttribute("\116\157\x74\x42\145\146\157\162\x65")) {
            goto BB;
        }
        $kL = SAMLSPUtilities::xsDateTimeToTimestamp($dn->getAttribute("\116\x6f\164\x42\145\146\157\x72\x65"));
        if (!($this->notBefore === NULL || $this->notBefore < $kL)) {
            goto my;
        }
        $this->notBefore = $kL;
        my:
        BB:
        if (!$dn->hasAttribute("\x4e\x6f\164\117\x6e\x4f\x72\101\x66\x74\145\x72")) {
            goto Q8;
        }
        $zl = SAMLSPUtilities::xsDateTimeToTimestamp($dn->getAttribute("\x4e\157\164\x4f\156\x4f\x72\101\x66\164\145\162"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $zl)) {
            goto SM;
        }
        $this->notOnOrAfter = $zl;
        SM:
        Q8:
        $pi = $dn->firstChild;
        SG:
        if (!($pi !== NULL)) {
            goto wx;
        }
        if (!$pi instanceof DOMText) {
            goto CI;
        }
        goto Yr;
        CI:
        if (!($pi->namespaceURI !== "\165\x72\156\72\x6f\141\x73\x69\x73\x3a\156\141\155\145\x73\72\x74\143\x3a\123\101\115\x4c\x3a\x32\56\60\x3a\141\163\x73\145\162\164\151\157\156")) {
            goto NY;
        }
        throw new Exception("\x55\156\x6b\x6e\157\167\156\x20\156\141\155\145\163\160\141\143\x65\x20\x6f\146\40\143\157\x6e\x64\x69\x74\x69\x6f\156\x3a\x20" . var_export($pi->namespaceURI, TRUE));
        NY:
        switch ($pi->localName) {
            case "\x41\x75\144\151\145\x6e\x63\x65\x52\145\x73\164\x72\x69\x63\x74\151\157\x6e":
                $IT = SAMLSPUtilities::extractStrings($pi, "\165\162\156\72\157\x61\163\x69\x73\x3a\156\x61\155\145\163\x3a\164\x63\72\x53\x41\x4d\x4c\72\62\56\60\x3a\141\x73\x73\x65\x72\x74\151\157\x6e", "\x41\x75\x64\151\x65\x6e\143\x65");
                if ($this->validAudiences === NULL) {
                    goto pb;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $IT);
                goto e4;
                pb:
                $this->validAudiences = $IT;
                e4:
                goto Vo;
            case "\117\156\x65\x54\x69\x6d\145\x55\x73\x65":
                goto Vo;
            case "\x50\162\x6f\170\x79\x52\x65\x73\x74\x72\151\x63\x74\151\157\x6e":
                goto Vo;
            default:
                throw new Exception("\x55\x6e\153\x6e\x6f\x77\x6e\40\x63\157\x6e\144\x69\x74\x69\157\156\x3a\40" . var_export($pi->localName, TRUE));
        }
        DH:
        Vo:
        Yr:
        $pi = $pi->nextSibling;
        goto SG;
        wx:
    }
    private function parseAuthnStatement(DOMElement $Ip)
    {
        $jg = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\163\x61\155\x6c\137\x61\163\x73\145\x72\164\x69\x6f\156\72\x41\x75\x74\x68\x6e\123\x74\141\x74\145\x6d\x65\x6e\164");
        if (empty($jg)) {
            goto J_;
        }
        if (count($jg) > 1) {
            goto AR;
        }
        goto wT;
        J_:
        $this->authnInstant = NULL;
        return;
        goto wT;
        AR:
        throw new Exception("\115\x6f\x72\x65\x20\164\150\x61\164\40\x6f\156\x65\40\x3c\x73\x61\155\x6c\x3a\101\x75\164\150\x6e\x53\164\141\x74\145\155\x65\156\x74\x3e\40\x69\x6e\x20\x3c\x73\x61\x6d\154\x3a\x41\163\x73\x65\162\x74\151\157\x6e\x3e\x20\x6e\157\x74\x20\163\x75\160\x70\157\x72\x74\x65\x64\x2e");
        wT:
        $Rx = $jg[0];
        if ($Rx->hasAttribute("\101\x75\164\x68\156\111\156\x73\x74\141\156\164")) {
            goto dA;
        }
        throw new Exception("\115\x69\163\163\x69\x6e\x67\x20\x72\x65\161\165\151\x72\145\x64\40\x41\165\x74\150\156\x49\156\163\x74\141\156\x74\40\x61\x74\164\162\x69\142\165\x74\x65\x20\157\156\x20\74\163\141\x6d\154\x3a\x41\x75\x74\x68\x6e\123\164\x61\x74\x65\x6d\x65\156\164\x3e\x2e");
        dA:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($Rx->getAttribute("\x41\x75\164\150\156\111\156\163\164\x61\156\x74"));
        if (!$Rx->hasAttribute("\x53\x65\x73\163\151\157\156\116\x6f\164\x4f\156\x4f\x72\101\x66\164\x65\x72")) {
            goto ir;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($Rx->getAttribute("\x53\145\x73\x73\x69\157\x6e\116\x6f\x74\x4f\156\x4f\162\101\x66\x74\145\x72"));
        ir:
        if (!$Rx->hasAttribute("\x53\145\163\x73\x69\x6f\x6e\111\156\144\145\x78")) {
            goto TG;
        }
        $this->sessionIndex = $Rx->getAttribute("\123\145\163\163\151\157\x6e\x49\x6e\x64\145\x78");
        TG:
        $this->parseAuthnContext($Rx);
    }
    private function parseAuthnContext(DOMElement $yn)
    {
        $y_ = SAMLSPUtilities::xpQuery($yn, "\56\x2f\163\x61\155\x6c\x5f\141\163\163\x65\162\x74\151\x6f\x6e\x3a\x41\x75\164\150\156\103\157\x6e\x74\145\170\x74");
        if (count($y_) > 1) {
            goto rH;
        }
        if (empty($y_)) {
            goto Og;
        }
        goto Un;
        rH:
        throw new Exception("\x4d\x6f\162\x65\x20\164\150\141\156\x20\157\x6e\145\x20\x3c\163\141\x6d\154\72\101\165\x74\x68\156\x43\x6f\156\x74\145\x78\x74\76\x20\x69\156\40\74\x73\x61\x6d\x6c\72\x41\165\x74\150\156\x53\164\x61\x74\145\x6d\145\156\164\x3e\x2e");
        goto Un;
        Og:
        throw new Exception("\115\151\x73\x73\x69\x6e\147\x20\162\145\161\x75\x69\162\x65\144\x20\74\163\141\x6d\154\72\101\x75\164\x68\x6e\103\157\156\x74\145\170\x74\76\x20\x69\156\x20\x3c\x73\141\155\x6c\72\101\x75\164\150\x6e\123\x74\141\164\145\x6d\x65\156\x74\76\x2e");
        Un:
        $Ab = $y_[0];
        $Oc = SAMLSPUtilities::xpQuery($Ab, "\x2e\57\x73\141\x6d\x6c\x5f\141\x73\163\145\x72\x74\151\x6f\x6e\x3a\x41\x75\x74\150\x6e\103\157\x6e\164\145\170\164\104\145\x63\154\x52\x65\146");
        if (count($Oc) > 1) {
            goto di;
        }
        if (count($Oc) === 1) {
            goto tA;
        }
        goto e7;
        di:
        throw new Exception("\115\x6f\x72\x65\40\164\150\x61\156\x20\x6f\156\x65\x20\74\163\141\x6d\x6c\x3a\101\x75\x74\150\x6e\103\x6f\x6e\x74\145\x78\x74\x44\x65\143\154\122\145\x66\x3e\x20\x66\x6f\165\x6e\x64\77");
        goto e7;
        tA:
        $this->setAuthnContextDeclRef(trim($Oc[0]->textContent));
        e7:
        $U6 = SAMLSPUtilities::xpQuery($Ab, "\56\57\163\141\x6d\x6c\x5f\x61\163\x73\145\162\x74\151\157\x6e\72\101\x75\164\150\x6e\x43\x6f\156\164\x65\x78\164\104\145\143\x6c");
        if (count($U6) > 1) {
            goto A_;
        }
        if (count($U6) === 1) {
            goto Zw;
        }
        goto ut;
        A_:
        throw new Exception("\x4d\157\162\x65\40\x74\150\x61\156\40\x6f\x6e\145\x20\x3c\x73\x61\155\x6c\x3a\x41\x75\164\150\x6e\103\x6f\156\164\145\x78\164\104\x65\x63\x6c\76\40\146\157\165\x6e\144\77");
        goto ut;
        Zw:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($U6[0]));
        ut:
        $a_ = SAMLSPUtilities::xpQuery($Ab, "\56\x2f\163\141\x6d\154\137\141\x73\163\x65\x72\x74\151\x6f\x6e\72\101\165\x74\x68\x6e\x43\x6f\x6e\x74\145\x78\x74\103\x6c\x61\x73\x73\122\x65\146");
        if (count($a_) > 1) {
            goto dE;
        }
        if (count($a_) === 1) {
            goto mg;
        }
        goto ON;
        dE:
        throw new Exception("\x4d\157\x72\145\40\164\x68\141\x6e\40\x6f\x6e\x65\x20\x3c\x73\x61\x6d\154\72\x41\x75\x74\150\156\x43\157\156\x74\145\x78\x74\103\154\x61\x73\163\x52\145\x66\x3e\40\151\x6e\x20\x3c\163\x61\x6d\154\x3a\x41\165\164\x68\156\x43\157\156\x74\145\x78\x74\76\56");
        goto ON;
        mg:
        $this->setAuthnContextClassRef(trim($a_[0]->textContent));
        ON:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto aM;
        }
        throw new Exception("\x4d\x69\163\163\x69\156\x67\40\145\x69\x74\150\145\x72\40\74\163\141\155\154\x3a\x41\165\x74\150\156\103\x6f\156\x74\145\x78\x74\x43\154\141\x73\163\122\x65\x66\x3e\40\157\162\40\74\163\141\155\x6c\x3a\101\165\x74\150\156\103\x6f\x6e\164\x65\x78\164\104\x65\x63\154\122\145\146\76\x20\x6f\162\40\x3c\163\141\x6d\154\x3a\x41\165\x74\150\x6e\x43\x6f\x6e\164\x65\x78\164\x44\145\x63\154\x3e");
        aM:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($Ab, "\x75\x72\156\x3a\x6f\141\x73\151\163\x3a\x6e\141\x6d\145\163\x3a\164\x63\x3a\x53\x41\x4d\x4c\72\x32\x2e\x30\72\x61\x73\x73\x65\x72\x74\x69\x6f\x6e", "\101\x75\164\x68\x65\x6e\164\x69\143\141\x74\x69\156\147\x41\165\164\x68\x6f\x72\151\x74\x79");
    }
    private function parseAttributes(DOMElement $Ip)
    {
        $Dm = TRUE;
        $z9 = SAMLSPUtilities::xpQuery($Ip, "\56\57\x73\141\155\154\137\x61\163\163\x65\162\164\x69\157\156\72\101\164\164\x72\x69\142\x75\164\x65\x53\164\141\164\145\155\145\x6e\164\x2f\163\x61\155\x6c\137\x61\163\x73\x65\x72\164\151\157\156\72\x41\164\x74\x72\151\x62\165\164\145");
        foreach ($z9 as $vh) {
            if ($vh->hasAttribute("\116\x61\x6d\145")) {
                goto N9;
            }
            throw new Exception("\115\x69\163\x73\x69\156\147\x20\x6e\141\x6d\145\40\157\156\x20\74\x73\x61\155\x6c\x3a\x41\x74\x74\x72\x69\x62\x75\164\145\76\40\x65\154\x65\155\x65\x6e\164\x2e");
            N9:
            $eB = $vh->getAttribute("\x4e\141\x6d\145");
            if ($vh->hasAttribute("\116\x61\x6d\x65\x46\x6f\162\x6d\x61\x74")) {
                goto mx;
            }
            $x2 = "\x75\162\x6e\x3a\x6f\x61\x73\x69\x73\x3a\156\x61\x6d\145\x73\72\x74\143\x3a\123\101\115\x4c\72\x31\x2e\61\x3a\156\141\x6d\x65\151\x64\x2d\146\x6f\x72\x6d\141\x74\x3a\165\x6e\x73\160\145\143\151\146\151\145\x64";
            goto Zz;
            mx:
            $x2 = $vh->getAttribute("\x4e\x61\x6d\145\106\157\x72\x6d\x61\x74");
            Zz:
            if ($Dm) {
                goto RR;
            }
            if (!($this->nameFormat !== $x2)) {
                goto p_;
            }
            $this->nameFormat = "\165\x72\156\72\x6f\141\163\x69\163\x3a\x6e\141\x6d\145\163\72\x74\143\x3a\x53\101\115\x4c\72\61\56\x31\72\x6e\x61\155\145\151\144\x2d\x66\157\162\x6d\x61\164\x3a\165\x6e\x73\160\x65\x63\x69\x66\x69\x65\144";
            p_:
            goto NB;
            RR:
            $this->nameFormat = $x2;
            $Dm = FALSE;
            NB:
            if (array_key_exists($eB, $this->attributes)) {
                goto eI;
            }
            $this->attributes[$eB] = array();
            eI:
            $Uj = SAMLSPUtilities::xpQuery($vh, "\x2e\57\x73\x61\x6d\154\x5f\x61\x73\x73\x65\162\164\x69\x6f\156\72\x41\x74\x74\162\x69\x62\x75\x74\x65\x56\141\154\165\x65");
            foreach ($Uj as $zw) {
                $this->attributes[$eB][] = trim($zw->textContent);
                cY:
            }
            ii:
            aH:
        }
        E6:
    }
    private function parseEncryptedAttributes(DOMElement $Ip)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($Ip, "\56\57\x73\141\155\x6c\x5f\141\x73\x73\145\162\164\x69\x6f\156\72\101\164\x74\x72\x69\x62\165\x74\x65\123\164\x61\164\x65\x6d\x65\156\x74\x2f\163\141\155\154\137\x61\x73\x73\x65\x72\164\151\157\156\72\105\x6e\143\162\x79\160\164\x65\144\x41\164\164\x72\x69\x62\x75\x74\x65");
    }
    private function parseSignature(DOMElement $Ip)
    {
        $qb = SAMLSPUtilities::validateElement($Ip);
        if (!($qb !== FALSE)) {
            goto Ph;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $qb["\x43\145\162\x74\x69\x66\x69\143\141\x74\145\x73"];
        $this->signatureData = $qb;
        Ph:
    }
    public function validate(XMLSecurityKey $k3)
    {
        if (!($this->signatureData === NULL)) {
            goto qg;
        }
        return FALSE;
        qg:
        SAMLSPUtilities::validateSignature($this->signatureData, $k3);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($zy)
    {
        $this->id = $zy;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($aS)
    {
        $this->issueInstant = $aS;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Z6)
    {
        $this->issuer = $Z6;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto UE;
        }
        throw new Exception("\x41\x74\164\145\155\x70\164\145\144\40\164\157\x20\x72\x65\164\x72\x69\x65\166\145\x20\145\156\143\x72\171\x70\x74\145\x64\40\x4e\x61\x6d\145\111\104\x20\167\151\164\150\x6f\x75\x74\40\x64\x65\143\162\171\160\164\151\x6e\147\40\x69\x74\40\146\x69\x72\163\164\x2e");
        UE:
        return $this->nameId;
    }
    public function setNameId($HI)
    {
        $this->nameId = $HI;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Ih;
        }
        return TRUE;
        Ih:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $k3)
    {
        $pf = new DOMDocument();
        $P2 = $pf->createElement("\x72\x6f\157\164");
        $pf->appendChild($P2);
        SAMLSPUtilities::addNameId($P2, $this->nameId);
        $HI = $P2->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($HI, "\145\156\143\x72\171\160\164");
        $fq = new XMLSecEnc();
        $fq->setNode($HI);
        $fq->type = XMLSecEnc::Element;
        $lH = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $lH->generateSessionKey();
        $fq->encryptKey($k3, $lH);
        $this->encryptedNameId = $fq->encryptNode($lH);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $k3, array $tH = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto jN;
        }
        return;
        jN:
        $HI = SAMLSPUtilities::decryptElement($this->encryptedNameId, $k3, $tH);
        SAMLSPUtilities::getContainer()->debugMessage($HI, "\x64\145\143\x72\x79\x70\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($HI);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $k3, array $tH = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto aO;
        }
        return;
        aO:
        $Dm = TRUE;
        $z9 = $this->encryptedAttribute;
        foreach ($z9 as $rR) {
            $vh = SAMLSPUtilities::decryptElement($rR->getElementsByTagName("\105\x6e\x63\x72\171\x70\x74\x65\144\x44\141\x74\x61")->item(0), $k3, $tH);
            if ($vh->hasAttribute("\x4e\141\x6d\145")) {
                goto tD;
            }
            throw new Exception("\115\x69\x73\x73\x69\x6e\147\x20\x6e\x61\155\145\x20\157\156\x20\74\x73\x61\155\154\72\101\x74\164\162\x69\x62\x75\164\x65\x3e\40\x65\154\145\x6d\145\x6e\x74\x2e");
            tD:
            $eB = $vh->getAttribute("\x4e\x61\155\145");
            if ($vh->hasAttribute("\x4e\141\155\145\106\x6f\162\155\x61\x74")) {
                goto VR;
            }
            $x2 = "\165\162\x6e\x3a\157\141\163\151\163\72\156\x61\x6d\145\x73\x3a\164\143\72\x53\x41\x4d\x4c\72\62\x2e\x30\x3a\x61\x74\x74\162\x6e\141\155\x65\55\x66\157\x72\x6d\x61\164\x3a\x75\x6e\163\160\145\143\151\146\151\x65\x64";
            goto Sz;
            VR:
            $x2 = $vh->getAttribute("\x4e\x61\x6d\x65\106\157\162\x6d\x61\164");
            Sz:
            if ($Dm) {
                goto c3;
            }
            if (!($this->nameFormat !== $x2)) {
                goto q6;
            }
            $this->nameFormat = "\165\x72\156\x3a\x6f\141\x73\x69\x73\72\156\141\x6d\145\163\72\164\143\x3a\x53\x41\x4d\114\72\62\x2e\x30\72\x61\164\164\x72\x6e\141\155\x65\55\x66\x6f\162\x6d\x61\x74\72\165\156\163\160\x65\x63\151\146\151\x65\x64";
            q6:
            goto l8;
            c3:
            $this->nameFormat = $x2;
            $Dm = FALSE;
            l8:
            if (array_key_exists($eB, $this->attributes)) {
                goto JI;
            }
            $this->attributes[$eB] = array();
            JI:
            $Uj = SAMLSPUtilities::xpQuery($vh, "\x2e\57\163\x61\155\x6c\137\141\163\163\145\x72\x74\x69\x6f\x6e\72\101\164\164\162\x69\142\165\164\x65\126\x61\x6c\x75\145");
            foreach ($Uj as $zw) {
                $this->attributes[$eB][] = trim($zw->textContent);
                pK:
            }
            Yc:
            Ag:
        }
        N2:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($kL)
    {
        $this->notBefore = $kL;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($zl)
    {
        $this->notOnOrAfter = $zl;
    }
    public function setEncryptedAttributes($gq)
    {
        $this->requiredEncAttributes = $gq;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $cD = NULL)
    {
        $this->validAudiences = $cD;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($is)
    {
        $this->authnInstant = $is;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($Xb)
    {
        $this->sessionNotOnOrAfter = $Xb;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($bP)
    {
        $this->sessionIndex = $bP;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto XU;
        }
        return $this->authnContextClassRef;
        XU:
        if (empty($this->authnContextDeclRef)) {
            goto MB;
        }
        return $this->authnContextDeclRef;
        MB:
        return NULL;
    }
    public function setAuthnContext($ol)
    {
        $this->setAuthnContextClassRef($ol);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($HJ)
    {
        $this->authnContextClassRef = $HJ;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $p7)
    {
        if (empty($this->authnContextDeclRef)) {
            goto bP;
        }
        throw new Exception("\x41\x75\164\x68\156\103\x6f\x6e\164\x65\170\x74\x44\x65\x63\x6c\x52\145\146\x20\x69\163\40\x61\x6c\x72\145\x61\x64\171\x20\x72\145\147\x69\x73\164\145\162\145\x64\41\x20\115\141\171\x20\x6f\x6e\154\171\40\150\141\166\145\x20\x65\x69\x74\150\x65\x72\x20\x61\x20\x44\145\x63\x6c\x20\157\x72\40\x61\40\104\x65\x63\154\x52\x65\146\x2c\40\x6e\157\164\40\x62\x6f\164\150\41");
        bP:
        $this->authnContextDecl = $p7;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($C0)
    {
        if (empty($this->authnContextDecl)) {
            goto uM;
        }
        throw new Exception("\101\165\164\x68\x6e\103\157\156\x74\x65\170\x74\104\x65\x63\x6c\x20\x69\x73\x20\141\154\162\x65\x61\144\x79\x20\162\x65\147\151\x73\x74\x65\162\x65\x64\x21\x20\x4d\141\x79\40\157\x6e\154\171\40\150\x61\166\145\40\145\x69\164\x68\145\x72\40\x61\40\x44\145\143\x6c\40\157\162\40\x61\40\104\145\143\154\x52\145\x66\x2c\x20\156\x6f\x74\40\142\157\164\x68\x21");
        uM:
        $this->authnContextDeclRef = $C0;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($wS)
    {
        $this->AuthenticatingAuthority = $wS;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $z9)
    {
        $this->attributes = $z9;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($x2)
    {
        $this->nameFormat = $x2;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $pv)
    {
        $this->SubjectConfirmation = $pv;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $nA = NULL)
    {
        $this->signatureKey = $nA;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $Qu = NULL)
    {
        $this->encryptionKey = $Qu;
    }
    public function setCertificates(array $li)
    {
        $this->certificates = $li;
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
    public function toXML(DOMNode $MD = NULL)
    {
        if ($MD === NULL) {
            goto od;
        }
        $X8 = $MD->ownerDocument;
        goto r1;
        od:
        $X8 = new DOMDocument();
        $MD = $X8;
        r1:
        $P2 = $X8->createElementNS("\165\x72\156\x3a\157\141\163\151\x73\72\156\141\155\145\x73\x3a\164\x63\72\x53\101\x4d\x4c\72\x32\56\60\x3a\141\163\163\x65\x72\x74\x69\157\x6e", "\163\141\155\154\72" . "\x41\x73\163\x65\162\164\x69\157\156");
        $MD->appendChild($P2);
        $P2->setAttributeNS("\165\162\x6e\72\x6f\141\x73\x69\163\72\x6e\141\155\x65\x73\x3a\164\143\x3a\x53\x41\115\x4c\72\62\56\60\x3a\160\162\x6f\164\157\x63\x6f\154", "\x73\x61\155\154\160\72\x74\155\160", "\164\155\x70");
        $P2->removeAttributeNS("\x75\162\156\72\x6f\141\x73\x69\163\72\x6e\x61\155\x65\163\72\164\x63\72\123\x41\x4d\114\72\x32\x2e\x30\72\160\162\157\x74\x6f\x63\157\x6c", "\164\155\160");
        $P2->setAttributeNS("\x68\164\x74\160\72\57\57\167\x77\x77\56\x77\63\x2e\157\x72\147\x2f\x32\x30\60\61\57\x58\x4d\x4c\123\x63\150\145\155\x61\55\x69\x6e\163\x74\141\x6e\143\145", "\170\x73\151\x3a\x74\155\160", "\164\155\160");
        $P2->removeAttributeNS("\x68\164\x74\160\72\x2f\57\x77\x77\x77\x2e\x77\x33\56\157\x72\147\x2f\x32\x30\60\x31\57\130\x4d\114\x53\143\x68\145\155\141\x2d\x69\156\x73\x74\141\x6e\x63\x65", "\164\x6d\160");
        $P2->setAttributeNS("\x68\164\x74\x70\x3a\x2f\57\x77\167\167\56\x77\x33\x2e\157\162\147\x2f\x32\x30\60\61\x2f\130\115\x4c\x53\143\150\145\155\x61", "\x78\x73\x3a\164\155\x70", "\x74\x6d\x70");
        $P2->removeAttributeNS("\150\x74\x74\x70\72\x2f\x2f\167\x77\167\x2e\x77\x33\x2e\x6f\162\x67\57\x32\60\x30\x31\x2f\x58\x4d\114\123\143\x68\145\x6d\141", "\x74\x6d\160");
        $P2->setAttribute("\x49\x44", $this->id);
        $P2->setAttribute("\126\145\x72\163\x69\x6f\x6e", "\x32\x2e\x30");
        $P2->setAttribute("\x49\163\163\x75\x65\111\156\163\164\141\156\x74", gmdate("\x59\x2d\x6d\x2d\144\134\x54\x48\x3a\151\x3a\x73\134\132", $this->issueInstant));
        $Z6 = SAMLSPUtilities::addString($P2, "\165\162\x6e\x3a\x6f\x61\163\151\163\72\156\x61\x6d\145\163\72\x74\143\72\x53\x41\115\114\72\62\56\x30\72\141\x73\x73\145\162\x74\151\157\156", "\163\x61\155\x6c\x3a\x49\163\x73\165\x65\162", $this->issuer);
        $this->addSubject($P2);
        $this->addConditions($P2);
        $this->addAuthnStatement($P2);
        if ($this->requiredEncAttributes == FALSE) {
            goto To;
        }
        $this->addEncryptedAttributeStatement($P2);
        goto A2;
        To:
        $this->addAttributeStatement($P2);
        A2:
        if (!($this->signatureKey !== NULL)) {
            goto oN;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $P2, $Z6->nextSibling);
        oN:
        return $P2;
    }
    private function addSubject(DOMElement $P2)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto rR;
        }
        return;
        rR:
        $dE = $P2->ownerDocument->createElementNS("\x75\x72\x6e\x3a\x6f\x61\x73\151\163\72\x6e\x61\x6d\145\163\72\x74\x63\72\x53\x41\115\114\72\62\x2e\x30\x3a\x61\163\163\x65\x72\164\x69\157\156", "\163\x61\155\154\72\123\x75\142\152\145\143\x74");
        $P2->appendChild($dE);
        if ($this->encryptedNameId === NULL) {
            goto Ow;
        }
        $RK = $dE->ownerDocument->createElementNS("\165\x72\156\x3a\157\141\x73\x69\x73\x3a\156\x61\x6d\x65\163\x3a\164\143\72\123\x41\x4d\x4c\72\x32\56\60\72\x61\x73\x73\x65\162\164\151\157\156", "\163\141\155\x6c\x3a" . "\x45\x6e\143\162\171\x70\x74\145\144\111\x44");
        $dE->appendChild($RK);
        $RK->appendChild($dE->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto z3;
        Ow:
        SAMLSPUtilities::addNameId($dE, $this->nameId);
        z3:
        foreach ($this->SubjectConfirmation as $qJ) {
            $qJ->toXML($dE);
            W1:
        }
        m1:
    }
    private function addConditions(DOMElement $P2)
    {
        $X8 = $P2->ownerDocument;
        $dn = $X8->createElementNS("\x75\x72\x6e\x3a\157\x61\163\151\x73\x3a\x6e\141\x6d\x65\163\72\x74\143\72\123\101\x4d\114\72\x32\56\60\72\x61\163\x73\145\162\x74\x69\x6f\156", "\163\x61\155\x6c\x3a\x43\157\156\144\x69\164\x69\157\x6e\163");
        $P2->appendChild($dn);
        if (!($this->notBefore !== NULL)) {
            goto h9;
        }
        $dn->setAttribute("\x4e\x6f\164\x42\145\146\x6f\162\x65", gmdate("\x59\55\155\x2d\x64\134\x54\x48\72\x69\72\x73\x5c\x5a", $this->notBefore));
        h9:
        if (!($this->notOnOrAfter !== NULL)) {
            goto vZ;
        }
        $dn->setAttribute("\x4e\157\x74\117\x6e\x4f\162\x41\146\164\145\x72", gmdate("\x59\55\x6d\55\x64\x5c\124\110\72\x69\x3a\163\134\132", $this->notOnOrAfter));
        vZ:
        if (!($this->validAudiences !== NULL)) {
            goto NI;
        }
        $of = $X8->createElementNS("\x75\162\156\x3a\157\141\x73\x69\163\x3a\x6e\141\x6d\x65\x73\72\164\143\x3a\123\101\115\x4c\72\62\56\60\72\x61\163\163\145\162\164\151\157\156", "\x73\141\x6d\154\72\x41\x75\x64\151\145\156\x63\145\x52\145\x73\164\162\151\143\164\151\x6f\156");
        $dn->appendChild($of);
        SAMLSPUtilities::addStrings($of, "\165\162\156\72\157\141\x73\151\x73\72\x6e\141\155\x65\163\x3a\x74\143\72\x53\x41\115\x4c\72\x32\x2e\60\x3a\141\x73\x73\145\x72\164\151\157\156", "\x73\141\155\154\x3a\x41\x75\x64\151\x65\156\143\145", FALSE, $this->validAudiences);
        NI:
    }
    private function addAuthnStatement(DOMElement $P2)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto dj;
        }
        return;
        dj:
        $X8 = $P2->ownerDocument;
        $yn = $X8->createElementNS("\x75\x72\x6e\72\x6f\x61\x73\151\163\72\156\x61\155\145\163\x3a\164\143\x3a\123\101\x4d\x4c\72\62\x2e\60\x3a\x61\163\163\145\x72\x74\151\x6f\x6e", "\163\x61\155\x6c\72\101\165\x74\x68\156\123\164\x61\164\x65\155\x65\156\164");
        $P2->appendChild($yn);
        $yn->setAttribute("\x41\165\164\x68\156\111\x6e\x73\164\141\156\164", gmdate("\131\x2d\155\55\144\x5c\124\x48\72\x69\x3a\163\134\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto EU;
        }
        $yn->setAttribute("\123\145\163\163\x69\x6f\156\x4e\157\164\x4f\x6e\x4f\162\101\146\x74\145\162", gmdate("\x59\55\x6d\x2d\x64\134\124\110\x3a\151\72\163\134\x5a", $this->sessionNotOnOrAfter));
        EU:
        if (!($this->sessionIndex !== NULL)) {
            goto px;
        }
        $yn->setAttribute("\x53\145\x73\163\151\x6f\156\111\x6e\144\145\170", $this->sessionIndex);
        px:
        $Ab = $X8->createElementNS("\x75\162\x6e\x3a\157\x61\163\151\163\72\x6e\141\155\145\x73\72\x74\x63\72\123\101\x4d\x4c\72\62\56\60\x3a\141\x73\x73\x65\x72\x74\x69\x6f\156", "\163\x61\x6d\x6c\72\x41\165\164\x68\x6e\103\x6f\x6e\164\x65\170\164");
        $yn->appendChild($Ab);
        if (empty($this->authnContextClassRef)) {
            goto qx;
        }
        SAMLSPUtilities::addString($Ab, "\165\x72\x6e\x3a\x6f\141\x73\151\163\72\156\141\x6d\x65\x73\x3a\x74\143\72\123\101\x4d\114\x3a\x32\x2e\x30\72\x61\163\163\x65\x72\x74\x69\x6f\x6e", "\163\x61\x6d\154\72\x41\165\x74\x68\x6e\x43\x6f\x6e\x74\145\x78\x74\x43\154\x61\x73\163\122\145\146", $this->authnContextClassRef);
        qx:
        if (empty($this->authnContextDecl)) {
            goto uX;
        }
        $this->authnContextDecl->toXML($Ab);
        uX:
        if (empty($this->authnContextDeclRef)) {
            goto D0;
        }
        SAMLSPUtilities::addString($Ab, "\x75\x72\156\72\157\141\163\151\x73\72\156\141\155\x65\x73\x3a\164\x63\x3a\123\x41\115\x4c\72\x32\x2e\x30\x3a\141\x73\163\x65\x72\x74\151\157\x6e", "\163\x61\x6d\x6c\72\x41\x75\164\150\x6e\103\x6f\x6e\x74\x65\170\x74\x44\x65\143\x6c\x52\x65\146", $this->authnContextDeclRef);
        D0:
        SAMLSPUtilities::addStrings($Ab, "\165\162\156\72\x6f\141\163\x69\x73\x3a\156\x61\x6d\145\163\x3a\x74\x63\72\x53\101\115\114\x3a\62\56\x30\x3a\141\163\163\145\x72\164\151\157\x6e", "\163\141\155\154\72\x41\x75\164\x68\145\x6e\x74\x69\x63\141\x74\x69\156\147\x41\x75\x74\150\x6f\162\x69\164\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $P2)
    {
        if (!empty($this->attributes)) {
            goto On;
        }
        return;
        On:
        $X8 = $P2->ownerDocument;
        $bo = $X8->createElementNS("\165\162\156\72\157\141\x73\x69\x73\72\156\x61\x6d\x65\x73\x3a\x74\143\72\x53\x41\x4d\x4c\72\x32\x2e\60\x3a\141\x73\163\x65\x72\x74\151\157\x6e", "\163\x61\155\x6c\72\101\164\x74\x72\x69\x62\x75\164\145\123\x74\x61\x74\145\x6d\x65\156\x74");
        $P2->appendChild($bo);
        foreach ($this->attributes as $eB => $Uj) {
            $vh = $X8->createElementNS("\x75\162\x6e\x3a\157\141\163\151\163\72\156\141\155\x65\x73\x3a\164\143\x3a\x53\x41\x4d\114\x3a\x32\56\x30\72\x61\163\x73\x65\162\x74\x69\157\156", "\x73\x61\x6d\x6c\x3a\x41\164\x74\x72\151\142\165\x74\x65");
            $bo->appendChild($vh);
            $vh->setAttribute("\116\x61\155\145", $eB);
            if (!($this->nameFormat !== "\x75\162\156\x3a\x6f\x61\x73\151\x73\x3a\x6e\x61\x6d\x65\x73\72\164\143\x3a\x53\101\x4d\114\x3a\x32\56\x30\72\141\164\x74\162\156\x61\155\145\55\146\157\162\x6d\141\x74\72\x75\156\163\x70\x65\143\151\x66\x69\145\144")) {
                goto oo;
            }
            $vh->setAttribute("\116\x61\x6d\x65\x46\x6f\x72\155\x61\x74", $this->nameFormat);
            oo:
            foreach ($Uj as $zw) {
                if (is_string($zw)) {
                    goto p2;
                }
                if (is_int($zw)) {
                    goto bI;
                }
                $ZL = NULL;
                goto oj;
                p2:
                $ZL = "\x78\x73\x3a\163\x74\162\151\x6e\147";
                goto oj;
                bI:
                $ZL = "\x78\163\x3a\x69\x6e\164\x65\x67\145\162";
                oj:
                $fz = $X8->createElementNS("\x75\162\x6e\x3a\x6f\141\163\151\x73\72\x6e\x61\155\145\163\72\x74\143\x3a\123\x41\x4d\x4c\x3a\x32\x2e\60\x3a\141\163\x73\x65\162\164\151\x6f\x6e", "\163\x61\x6d\154\x3a\101\x74\x74\x72\151\142\165\x74\145\126\x61\x6c\165\145");
                $vh->appendChild($fz);
                if (!($ZL !== NULL)) {
                    goto lV;
                }
                $fz->setAttributeNS("\150\164\x74\x70\72\x2f\x2f\x77\167\x77\x2e\x77\x33\56\157\162\147\57\x32\60\x30\x31\57\x58\115\114\x53\143\150\145\x6d\x61\55\x69\x6e\x73\x74\141\x6e\x63\x65", "\170\163\151\x3a\x74\x79\x70\x65", $ZL);
                lV:
                if (!is_null($zw)) {
                    goto zL;
                }
                $fz->setAttributeNS("\150\164\x74\160\72\x2f\x2f\167\x77\x77\56\167\x33\x2e\157\x72\147\x2f\x32\x30\x30\61\57\x58\x4d\114\x53\x63\150\145\155\141\55\x69\x6e\163\164\141\156\143\145", "\170\x73\x69\72\x6e\151\154", "\x74\162\x75\x65");
                zL:
                if ($zw instanceof DOMNodeList) {
                    goto JM;
                }
                $fz->appendChild($X8->createTextNode($zw));
                goto FP;
                JM:
                $lp = 0;
                C1:
                if (!($lp < $zw->length)) {
                    goto U3;
                }
                $pi = $X8->importNode($zw->item($lp), TRUE);
                $fz->appendChild($pi);
                Ah:
                $lp++;
                goto C1;
                U3:
                FP:
                YV:
            }
            Gx:
            O_:
        }
        eW:
    }
    private function addEncryptedAttributeStatement(DOMElement $P2)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto nU;
        }
        return;
        nU:
        $X8 = $P2->ownerDocument;
        $bo = $X8->createElementNS("\x75\162\156\72\x6f\141\163\x69\163\72\156\141\155\x65\163\x3a\164\x63\x3a\x53\101\115\114\72\62\x2e\60\x3a\x61\163\163\145\162\x74\151\157\x6e", "\x73\141\x6d\154\x3a\x41\x74\164\x72\x69\x62\165\164\x65\123\x74\141\x74\145\x6d\145\x6e\164");
        $P2->appendChild($bo);
        foreach ($this->attributes as $eB => $Uj) {
            $Ak = new DOMDocument();
            $vh = $Ak->createElementNS("\x75\x72\x6e\x3a\157\141\163\x69\x73\72\x6e\x61\155\145\163\x3a\164\x63\x3a\x53\x41\115\x4c\x3a\x32\x2e\x30\x3a\x61\x73\163\x65\162\164\x69\157\156", "\163\x61\x6d\154\72\101\x74\164\x72\x69\142\165\x74\x65");
            $vh->setAttribute("\116\141\155\x65", $eB);
            $Ak->appendChild($vh);
            if (!($this->nameFormat !== "\165\x72\156\x3a\157\x61\x73\x69\x73\72\156\141\x6d\145\x73\72\164\x63\x3a\123\x41\115\114\72\62\56\60\x3a\x61\164\x74\x72\x6e\141\155\x65\x2d\x66\x6f\162\x6d\x61\164\72\165\x6e\x73\160\145\143\151\146\x69\x65\x64")) {
                goto lo;
            }
            $vh->setAttribute("\116\x61\155\145\106\157\162\x6d\x61\164", $this->nameFormat);
            lo:
            foreach ($Uj as $zw) {
                if (is_string($zw)) {
                    goto SS;
                }
                if (is_int($zw)) {
                    goto t4;
                }
                $ZL = NULL;
                goto GD;
                SS:
                $ZL = "\x78\163\72\163\x74\x72\x69\x6e\147";
                goto GD;
                t4:
                $ZL = "\x78\x73\72\x69\x6e\164\x65\147\145\162";
                GD:
                $fz = $Ak->createElementNS("\165\162\156\x3a\157\x61\163\151\x73\x3a\156\141\x6d\x65\x73\72\x74\x63\72\123\101\115\x4c\x3a\62\x2e\60\x3a\141\x73\163\145\x72\x74\x69\157\156", "\163\x61\155\154\72\x41\164\x74\x72\151\142\x75\164\x65\126\141\x6c\x75\145");
                $vh->appendChild($fz);
                if (!($ZL !== NULL)) {
                    goto bd;
                }
                $fz->setAttributeNS("\150\164\164\x70\72\57\57\x77\167\167\x2e\x77\x33\56\x6f\162\x67\57\x32\60\x30\61\57\130\115\114\123\x63\150\145\x6d\x61\55\x69\156\163\x74\x61\156\x63\145", "\170\163\x69\72\164\171\160\145", $ZL);
                bd:
                if ($zw instanceof DOMNodeList) {
                    goto DN;
                }
                $fz->appendChild($Ak->createTextNode($zw));
                goto ML;
                DN:
                $lp = 0;
                ud:
                if (!($lp < $zw->length)) {
                    goto lN;
                }
                $pi = $Ak->importNode($zw->item($lp), TRUE);
                $fz->appendChild($pi);
                xR:
                $lp++;
                goto ud;
                lN:
                ML:
                It:
            }
            zS:
            $qc = new XMLSecEnc();
            $qc->setNode($Ak->documentElement);
            $qc->type = "\x68\x74\x74\x70\x3a\57\57\167\167\x77\x2e\x77\63\56\x6f\x72\147\57\x32\60\60\61\x2f\60\64\57\170\155\x6c\x65\156\143\x23\x45\154\x65\155\145\156\164";
            $lH = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $lH->generateSessionKey();
            $qc->encryptKey($this->encryptionKey, $lH);
            $tt = $qc->encryptNode($lH);
            $B3 = $X8->createElementNS("\x75\162\156\x3a\157\x61\163\x69\x73\x3a\x6e\x61\155\145\x73\x3a\x74\x63\72\123\101\115\114\x3a\62\x2e\60\72\x61\163\x73\x65\x72\x74\151\157\156", "\163\141\155\154\x3a\105\x6e\x63\162\x79\160\164\x65\x64\x41\x74\164\162\x69\x62\165\x74\145");
            $bo->appendChild($B3);
            $tU = $X8->importNode($tt, TRUE);
            $B3->appendChild($tU);
            Lh:
        }
        zF:
    }
}
