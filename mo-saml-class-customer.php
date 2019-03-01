<?php


class Customersaml
{
    public $email;
    public $phone;
    private $defaultCustomerKey = "\x31\66\65\x35\65";
    private $defaultApiKey = "\146\106\144\x32\130\143\x76\x54\107\x44\145\155\132\166\142\x77\61\x62\x63\x55\x65\163\116\x4a\127\x45\x71\x4b\142\x62\125\x71";
    function create_customer()
    {
        $wy = get_option("\155\x6f\x5f\163\141\x6d\x6c\137\150\x6f\163\164\x5f\156\x61\x6d\145") . "\57\155\157\x61\163\57\x72\145\x73\x74\x2f\x63\165\163\x74\x6f\155\x65\162\57\141\144\144";
        $WY = curl_init($wy);
        $current_user = wp_get_current_user();
        $this->email = get_option("\x6d\157\137\x73\141\155\x6c\x5f\141\144\x6d\x69\156\137\145\155\x61\151\x6c");
        $this->phone = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x61\144\155\151\x6e\137\x70\x68\x6f\x6e\145");
        $WZ = get_option("\155\157\137\x73\x61\155\154\137\141\x64\x6d\151\x6e\x5f\x70\141\163\x73\167\x6f\162\144");
        $c8 = array("\x63\x6f\x6d\x70\141\156\171\x4e\141\x6d\145" => $_SERVER["\x53\105\x52\126\x45\122\x5f\116\101\x4d\x45"], "\141\x72\145\x61\x4f\x66\111\156\x74\x65\162\x65\x73\164" => "\127\x50\x20\x6d\151\x6e\151\x4f\162\x61\x6e\x67\145\x20\x53\x41\x4d\x4c\40\x32\x2e\x30\x20\x53\123\117\x20\120\x6c\165\147\151\156", "\x66\x69\x72\163\164\156\x61\155\145" => $current_user->user_firstname, "\x6c\141\x73\x74\156\141\x6d\x65" => $current_user->user_lastname, "\x65\155\141\x69\154" => $this->email, "\x70\x68\157\156\145" => $this->phone, "\x70\141\x73\x73\167\x6f\x72\x64" => $WZ);
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\103\157\156\164\145\156\x74\x2d\x54\171\x70\x65\72\x20\141\160\160\154\x69\x63\141\x74\151\x6f\156\57\152\163\157\x6e", "\x63\x68\141\162\x73\145\x74\x3a\x20\125\124\x46\40\55\40\70", "\x41\165\164\150\157\162\151\x7a\141\x74\151\157\156\x3a\x20\102\x61\163\151\143"));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\155\157\x5f\x70\x72\157\x78\x79\x5f\x68\157\x73\x74");
        if (empty($Hm)) {
            goto EX;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\157\x5f\160\x72\x6f\170\171\x5f\x68\157\163\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\157\x5f\x70\x72\157\170\x79\137\x70\157\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\x6f\x5f\160\x72\157\x78\x79\137\165\x73\x65\162\x6e\141\x6d\145") . "\72" . get_option("\x6d\x6f\x5f\x70\x72\x6f\170\x79\137\x70\141\163\x73\167\x6f\162\x64"));
        EX:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto gB;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto qz;
        }
        wp_die("\x54\150\x65\x72\145\x20\167\x61\163\40\x61\156\x20\151\163\x73\165\x65\40\143\157\156\156\x65\143\x74\151\157\x6e\x20\x74\x6f\x20\x49\156\x74\145\162\x6e\145\164\56\40\103\150\145\143\153\x20\x69\x66\x20\x79\157\x75\162\40\x66\151\162\x65\x77\x61\x6c\x6c\x20\x69\163\40\x61\154\x6c\157\167\151\x6e\147\40\157\165\164\x62\x6f\x75\x6e\144\x20\143\x6f\x6e\156\145\x63\x74\x69\x6f\x6e\x20\164\157\40\160\x6f\162\x74\x20\64\64\63\x2e\x3c\142\162\76\x3c\x62\162\x3e\111\x6e\40\143\x61\x73\x65\x20\171\x6f\x75\40\141\162\145\40\165\163\x69\156\147\x20\x70\162\157\170\171\54\x20\147\157\x20\x74\x6f\x20\x70\162\x6f\x78\x79\x20\164\141\142\40\151\156\x20\160\154\165\x67\151\156\x20\141\x6e\144\x20\143\157\156\146\x69\147\x75\x72\145\x20\x70\162\157\x78\x79\40\x73\x65\164\164\151\x6e\x67\163\x2e");
        qz:
        echo "\122\145\161\x75\x65\x73\164\x20\105\x72\162\x6f\x72\x3a" . curl_error($WY);
        die;
        gB:
        curl_close($WY);
        return $YY;
    }
    function get_customer_key()
    {
        $wy = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x68\157\163\x74\x5f\156\141\x6d\x65") . "\57\x6d\157\141\163\x2f\x72\x65\163\164\57\143\x75\x73\164\x6f\155\x65\162\57\x6b\145\x79";
        $WY = curl_init($wy);
        $Mb = get_option("\x6d\157\137\x73\141\x6d\x6c\137\x61\144\x6d\x69\x6e\x5f\x65\155\141\151\x6c");
        $WZ = get_option("\155\x6f\x5f\163\x61\155\x6c\137\x61\x64\155\151\x6e\137\x70\141\x73\163\167\x6f\x72\144");
        $c8 = array("\145\x6d\x61\151\154" => $Mb, "\160\x61\x73\163\167\157\x72\144" => $WZ);
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\x6f\156\x74\145\156\164\55\124\x79\x70\145\72\40\x61\160\x70\x6c\x69\143\141\x74\151\157\x6e\57\x6a\163\x6f\x6e", "\x63\x68\141\x72\163\x65\x74\72\40\x55\124\106\40\x2d\40\x38", "\101\x75\x74\150\157\162\x69\172\x61\x74\151\157\156\72\40\102\x61\163\x69\143"));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\x6d\x6f\x5f\160\162\x6f\x78\171\137\x68\157\163\x74");
        if (empty($Hm)) {
            goto NZ;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\x6f\137\160\162\x6f\170\x79\137\150\157\163\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\157\x5f\x70\x72\x6f\x78\171\x5f\x70\157\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\137\x70\162\x6f\x78\x79\137\165\x73\x65\x72\156\141\155\x65") . "\72" . get_option("\155\157\137\160\x72\x6f\170\171\x5f\x70\141\x73\x73\x77\x6f\x72\x64"));
        NZ:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto aU;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto i0;
        }
        wp_die("\x54\150\x65\x72\x65\40\167\x61\x73\40\x61\156\x20\151\x73\163\165\x65\40\x63\x6f\156\x6e\x65\143\164\151\x6f\x6e\x20\x74\x6f\x20\x49\x6e\164\x65\162\x6e\145\x74\56\40\103\150\x65\x63\x6b\x20\x69\146\40\x79\157\x75\x72\x20\146\151\162\145\x77\141\154\x6c\x20\x69\163\x20\x61\x6c\x6c\157\x77\151\156\147\x20\157\165\x74\x62\x6f\165\x6e\x64\x20\x63\157\156\x6e\x65\x63\164\x69\x6f\x6e\40\x74\x6f\x20\160\x6f\x72\164\x20\64\x34\63\x2e\x3c\x62\x72\x3e\74\142\162\76\111\x6e\40\x63\x61\x73\x65\x20\171\157\x75\x20\x61\162\145\x20\x75\163\151\156\147\40\160\x72\x6f\170\171\54\x20\147\157\x20\164\157\x20\160\162\157\170\x79\40\164\141\142\40\x69\x6e\40\x70\x6c\165\147\x69\x6e\40\141\156\x64\40\143\157\x6e\x66\x69\x67\165\162\145\x20\160\x72\x6f\x78\x79\x20\x73\145\x74\x74\x69\156\x67\163\56");
        i0:
        echo "\x52\145\x71\165\x65\163\164\x20\105\x72\162\157\162\72" . curl_error($WY);
        die;
        aU:
        curl_close($WY);
        return $YY;
    }
    function check_customer()
    {
        $wy = get_option("\155\x6f\137\x73\141\155\x6c\137\x68\x6f\163\164\x5f\156\141\x6d\x65") . "\x2f\x6d\157\x61\x73\57\x72\145\163\x74\x2f\143\165\x73\x74\157\155\145\x72\x2f\x63\150\145\x63\x6b\x2d\x69\146\x2d\145\x78\x69\x73\164\x73";
        $WY = curl_init($wy);
        $Mb = get_option("\155\157\137\163\141\155\x6c\x5f\x61\x64\x6d\x69\156\x5f\x65\155\141\x69\154");
        $c8 = array("\145\155\x61\x69\x6c" => $Mb);
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\103\x6f\x6e\164\x65\156\x74\x2d\x54\171\160\x65\x3a\40\141\x70\x70\154\151\x63\141\164\151\x6f\x6e\x2f\152\x73\157\x6e", "\x63\x68\141\x72\x73\145\x74\x3a\40\125\x54\x46\x20\55\x20\70", "\x41\x75\164\150\x6f\x72\151\172\x61\x74\151\157\156\x3a\x20\x42\x61\x73\151\143"));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\155\157\x5f\x70\162\157\x78\x79\x5f\x68\x6f\x73\164");
        if (empty($Hm)) {
            goto Vv;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\157\137\x70\162\157\x78\171\137\x68\157\163\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\157\137\160\x72\x6f\x78\x79\137\x70\x6f\162\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\157\137\x70\x72\x6f\170\171\x5f\165\163\x65\x72\156\141\x6d\145") . "\x3a" . get_option("\x6d\x6f\137\160\x72\157\x78\x79\x5f\160\141\163\163\167\x6f\162\144"));
        Vv:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto M9;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto aK;
        }
        wp_die("\x54\150\145\x72\x65\x20\x77\x61\x73\x20\x61\156\x20\x69\163\163\x75\145\x20\143\157\x6e\x6e\x65\x63\164\151\157\x6e\x20\x74\157\40\111\x6e\164\x65\x72\156\145\164\56\x20\103\x68\x65\143\153\40\x69\146\x20\171\157\x75\162\x20\146\x69\x72\x65\x77\141\x6c\x6c\x20\151\x73\x20\141\154\154\157\x77\x69\x6e\147\40\x6f\165\164\142\x6f\165\x6e\x64\x20\x63\157\x6e\156\x65\x63\164\151\x6f\x6e\x20\x74\157\40\160\x6f\x72\164\x20\x34\64\x33\x2e\x3c\x62\x72\x3e\74\x62\x72\x3e\x49\156\40\x63\x61\163\x65\40\x79\x6f\165\40\x61\162\x65\x20\x75\x73\151\x6e\147\x20\160\x72\157\170\171\x2c\x20\147\x6f\40\164\x6f\40\160\x72\157\170\x79\x20\x74\x61\142\40\x69\x6e\40\x70\x6c\165\x67\151\x6e\x20\x61\156\x64\x20\x63\157\156\146\x69\147\x75\x72\x65\40\160\x72\x6f\x78\171\x20\163\145\x74\164\151\x6e\x67\x73\x2e");
        aK:
        echo "\122\x65\161\x75\x65\x73\164\x20\105\x72\x72\x6f\x72\x3a" . curl_error($WY);
        die;
        M9:
        curl_close($WY);
        return $YY;
    }
    function send_otp_token($Mb, $u4, $Ls = TRUE, $yo = FALSE)
    {
        $wy = get_option("\155\x6f\x5f\163\x61\155\x6c\137\150\157\x73\x74\137\x6e\141\155\145") . "\x2f\155\157\x61\x73\57\141\x70\x69\57\141\165\x74\150\x2f\x63\150\x61\154\x6c\x65\x6e\x67\x65";
        $WY = curl_init($wy);
        $VO = $this->defaultCustomerKey;
        $qt = $this->defaultApiKey;
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\x68\x61\65\x31\62", $ZT);
        $wJ = "\103\x75\x73\164\x6f\155\145\162\x2d\113\x65\171\x3a\40" . $VO;
        $Ip = "\124\x69\155\x65\x73\164\141\155\x70\x3a\40" . number_format($qI, 0, '', '');
        $wl = "\101\x75\164\150\x6f\162\x69\x7a\x61\x74\x69\157\156\72\x20" . $cP;
        if ($Ls) {
            goto YD;
        }
        $c8 = array("\x63\165\x73\x74\157\x6d\x65\162\113\x65\171" => $VO, "\x70\x68\x6f\x6e\x65" => $u4, "\x61\165\164\x68\124\x79\160\145" => "\123\115\123", "\x74\162\141\x6e\x73\x61\143\164\x69\x6f\156\116\141\x6d\145" => "\127\120\40\155\151\x6e\151\x4f\162\x61\x6e\147\x65\x20\x53\x41\x4d\114\40\62\x2e\60\x20\x53\x53\x4f\40\120\154\165\x67\151\156");
        goto P3;
        YD:
        $c8 = array("\x63\165\x73\x74\157\x6d\145\162\x4b\145\x79" => $VO, "\145\155\x61\151\154" => $Mb, "\141\165\164\150\x54\171\160\145" => "\105\115\x41\x49\x4c", "\164\x72\141\x6e\163\x61\143\164\x69\x6f\156\116\141\155\145" => "\127\x50\40\155\x69\156\151\x4f\162\x61\x6e\x67\145\x20\x53\x41\x4d\x4c\40\x32\x2e\x30\x20\x53\123\117\40\x50\154\x75\x67\151\x6e");
        P3:
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\x6f\x6e\164\x65\x6e\164\x2d\124\x79\x70\x65\x3a\x20\x61\160\x70\154\x69\x63\141\164\151\157\x6e\57\152\163\x6f\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\x6d\157\137\160\162\x6f\170\171\x5f\x68\157\x73\x74");
        if (empty($Hm)) {
            goto Io;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\157\137\160\162\x6f\170\171\x5f\x68\x6f\163\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\157\x5f\x70\162\x6f\170\171\137\160\157\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\x6f\137\160\162\x6f\x78\x79\x5f\x75\163\x65\162\156\141\155\145") . "\72" . get_option("\155\x6f\137\x70\162\157\x78\171\x5f\x70\141\163\x73\x77\157\x72\x64"));
        Io:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto t3;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto Fv;
        }
        wp_die("\x54\150\145\x72\145\40\167\141\x73\x20\x61\x6e\x20\x69\163\163\x75\x65\40\x63\x6f\156\156\x65\x63\164\x69\157\156\x20\164\x6f\x20\x49\156\x74\x65\162\x6e\x65\x74\x2e\x20\x43\150\x65\143\x6b\40\x69\146\x20\x79\x6f\x75\x72\x20\146\x69\162\145\167\141\x6c\x6c\40\151\163\40\x61\x6c\154\x6f\x77\151\x6e\147\x20\x6f\x75\x74\142\x6f\x75\x6e\144\x20\143\157\x6e\x6e\145\143\164\151\157\156\x20\164\157\40\160\x6f\x72\164\40\x34\x34\63\x2e\74\142\x72\76\74\142\162\76\x49\x6e\x20\143\141\x73\145\40\x79\x6f\x75\40\141\162\x65\x20\x75\163\151\x6e\x67\x20\160\162\x6f\x78\x79\x2c\x20\147\157\40\164\157\x20\160\x72\157\170\x79\x20\164\141\x62\40\151\156\40\160\x6c\x75\147\151\x6e\40\x61\x6e\x64\x20\143\157\156\146\151\147\x75\162\x65\40\x70\162\157\x78\x79\x20\163\x65\164\164\x69\156\x67\163\56");
        Fv:
        echo "\122\x65\x71\x75\145\163\x74\x20\x45\162\162\x6f\162\x3a" . curl_error($WY);
        die;
        t3:
        curl_close($WY);
        return $YY;
    }
    function validate_otp_token($rA, $E3)
    {
        $wy = get_option("\155\157\x5f\x73\141\x6d\154\137\150\157\163\x74\x5f\156\x61\x6d\145") . "\57\155\157\141\x73\x2f\141\160\x69\x2f\141\x75\164\150\x2f\x76\x61\154\x69\x64\x61\x74\x65";
        $WY = curl_init($wy);
        $VO = $this->defaultCustomerKey;
        $qt = $this->defaultApiKey;
        $AV = get_option("\x6d\157\137\x73\141\155\154\137\141\144\x6d\151\156\x5f\x65\155\x61\x69\154");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\x68\x61\x35\x31\x32", $ZT);
        $wJ = "\x43\165\163\164\x6f\155\145\x72\55\x4b\145\171\x3a\x20" . $VO;
        $Ip = "\124\x69\155\145\163\x74\x61\x6d\160\x3a\40" . number_format($qI, 0, '', '');
        $wl = "\x41\x75\164\150\157\162\x69\172\x61\x74\151\x6f\156\x3a\x20" . $cP;
        $c8 = '';
        $c8 = array("\164\x78\x49\144" => $rA, "\164\157\x6b\x65\x6e" => $E3);
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\103\157\156\x74\x65\x6e\x74\x2d\124\171\160\x65\72\x20\141\160\x70\154\151\143\141\164\151\x6f\x6e\57\152\x73\x6f\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\155\157\x5f\160\x72\x6f\170\171\x5f\x68\157\x73\x74");
        if (empty($Hm)) {
            goto PY;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\x6f\x5f\x70\x72\x6f\170\171\x5f\150\157\x73\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\x6f\137\160\162\x6f\x78\x79\x5f\x70\x6f\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\x5f\160\162\x6f\x78\171\137\x75\x73\145\x72\x6e\x61\x6d\x65") . "\72" . get_option("\155\x6f\x5f\160\x72\x6f\170\171\x5f\x70\141\163\x73\x77\x6f\x72\x64"));
        PY:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto y2;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto ow;
        }
        wp_die("\124\x68\x65\162\145\40\167\141\x73\40\x61\x6e\40\x69\163\163\x75\x65\x20\143\x6f\x6e\x6e\x65\x63\x74\x69\x6f\x6e\40\x74\x6f\40\111\x6e\164\x65\162\x6e\145\164\56\40\103\150\x65\143\153\40\x69\146\40\171\157\165\162\x20\146\x69\x72\x65\167\141\154\154\40\x69\163\40\141\154\x6c\157\x77\x69\156\x67\40\x6f\x75\164\x62\157\165\x6e\144\40\143\157\156\x6e\x65\x63\164\151\157\156\x20\164\x6f\40\x70\x6f\x72\164\40\x34\x34\x33\x2e\74\x62\162\x3e\x3c\x62\x72\x3e\111\x6e\x20\143\141\163\145\40\171\157\x75\40\141\162\145\x20\x75\x73\x69\x6e\147\x20\x70\x72\157\170\x79\54\x20\x67\x6f\x20\164\x6f\x20\160\x72\157\170\171\x20\x74\141\142\40\151\156\40\160\x6c\x75\x67\151\x6e\40\x61\156\x64\x20\x63\x6f\x6e\x66\151\147\x75\162\x65\x20\160\162\x6f\170\171\x20\163\x65\x74\x74\151\156\x67\163\x2e");
        ow:
        echo "\x52\145\x71\165\x65\x73\x74\40\105\x72\162\x6f\162\x3a" . curl_error($WY);
        die;
        y2:
        curl_close($WY);
        return $YY;
    }
    function submit_contact_us($Mb, $u4, $R7)
    {
        $current_user = wp_get_current_user();
        $R7 = "\133\x57\120\40\x53\101\x4d\x4c\40\62\56\60\40\x53\120\x20\123\x53\117\x20\120\x72\145\x6d\151\x75\x6d\x20\120\x6c\x75\x67\151\x6e\x5d\40" . $R7;
        $c8 = array("\146\x69\162\163\164\x4e\141\155\x65" => $current_user->user_firstname, "\154\141\x73\x74\x4e\141\155\x65" => $current_user->user_lastname, "\143\x6f\155\x70\141\x6e\x79" => $_SERVER["\123\x45\x52\x56\x45\x52\137\116\x41\115\x45"], "\145\x6d\x61\x69\154" => $Mb, "\160\x68\157\x6e\145" => $u4, "\x71\x75\x65\x72\171" => $R7);
        $sU = json_encode($c8);
        $wy = get_option("\x6d\157\x5f\163\141\155\x6c\137\x68\157\163\164\x5f\x6e\141\155\x65") . "\57\x6d\x6f\141\x73\x2f\162\x65\x73\164\x2f\x63\165\x73\x74\157\x6d\145\x72\57\143\x6f\156\164\x61\143\x74\x2d\165\163";
        $WY = curl_init($wy);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\157\x6e\x74\x65\156\164\x2d\124\171\x70\x65\x3a\40\141\x70\x70\x6c\x69\143\141\x74\151\157\156\x2f\152\x73\x6f\156", "\143\150\141\162\x73\145\164\72\40\125\x54\x46\55\70", "\x41\x75\164\150\x6f\162\151\172\141\164\x69\x6f\x6e\72\40\102\141\163\x69\x63"));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\155\x6f\137\x70\162\x6f\170\171\137\150\x6f\163\x74");
        if (empty($Hm)) {
            goto mj;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\x6f\x5f\x70\162\157\x78\x79\x5f\150\157\163\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\157\137\x70\x72\157\x78\x79\137\x70\x6f\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\x6f\x5f\x70\162\x6f\x78\x79\137\x75\x73\145\162\156\141\155\145") . "\x3a" . get_option("\x6d\157\x5f\x70\162\x6f\x78\171\x5f\160\x61\163\163\x77\157\x72\144"));
        mj:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto O0;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto XX;
        }
        wp_die("\124\x68\145\162\145\x20\167\141\163\x20\x61\x6e\x20\x69\163\163\x75\x65\x20\143\x6f\156\156\x65\143\164\151\x6f\x6e\x20\x74\157\x20\111\x6e\x74\145\x72\156\145\164\x2e\x20\103\x68\145\x63\153\40\151\146\x20\171\x6f\x75\162\x20\146\151\x72\x65\167\x61\x6c\x6c\40\151\x73\x20\141\x6c\154\157\167\x69\x6e\147\x20\157\x75\x74\x62\x6f\x75\156\144\x20\143\157\x6e\156\x65\x63\164\151\157\x6e\x20\164\x6f\40\160\157\162\164\x20\64\64\63\56\x3c\142\162\76\74\142\x72\76\111\156\x20\143\141\163\145\x20\x79\x6f\165\x20\141\162\145\x20\x75\163\151\x6e\147\40\x70\162\x6f\170\x79\54\40\x67\x6f\x20\x74\x6f\x20\x70\x72\x6f\x78\x79\x20\164\x61\x62\40\151\156\40\160\154\165\x67\x69\x6e\x20\141\156\144\40\143\157\156\146\151\147\165\x72\x65\40\160\162\157\x78\171\40\163\145\164\x74\151\156\x67\x73\x2e");
        XX:
        echo "\122\145\161\x75\x65\163\x74\40\105\x72\x72\157\x72\x3a" . curl_error($WY);
        return false;
        O0:
        curl_close($WY);
        return true;
    }
    function save_external_idp_config()
    {
        $wy = get_option("\x6d\157\137\x73\141\155\x6c\137\150\157\163\x74\x5f\x6e\x61\x6d\x65") . "\57\x6d\157\141\x73\57\162\x65\163\x74\57\x73\141\x6d\154\57\163\141\166\x65\55\x63\x6f\156\146\x69\x67\x75\162\x61\164\151\x6f\156";
        $WY = curl_init($wy);
        $current_user = wp_get_current_user();
        $this->email = get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\141\x64\155\151\156\137\145\155\x61\x69\154");
        $this->phone = get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x61\x64\x6d\151\156\137\x70\x68\157\156\145");
        $eE = "\163\x61\155\x6c";
        $Om = get_option("\163\141\x6d\x6c\137\151\x64\145\156\164\151\164\x79\137\156\141\155\145");
        $f3 = $wy;
        $WZ = get_option("\155\157\137\163\141\155\x6c\x5f\141\x64\155\151\156\137\160\141\x73\163\167\157\x72\x64");
        $vr = get_option("\155\157\137\x73\141\x6d\154\137\141\144\155\151\x6e\137\143\x75\x73\x74\157\155\145\162\x5f\153\145\x79");
        $PV = get_option("\163\141\155\x6c\137\154\157\x67\151\x6e\137\165\162\x6c");
        $lM = get_option("\x73\141\155\x6c\x5f\151\x73\163\x75\145\162");
        $Ek = maybe_unserialize(get_option("\163\x61\155\x6c\x5f\x78\65\60\x39\137\143\x65\162\164\151\146\151\143\x61\x74\145"));
        $Ek = is_array($Ek) ? $Ek[0] : $Ek;
        $Y6 = get_option("\x73\141\155\154\137\x69\144\x70\137\x63\157\x6e\146\x69\x67\137\x69\x64");
        $Xt = get_option("\x73\x61\155\x6c\x5f\141\163\x73\145\162\x74\151\x6f\x6e\x5f\x73\151\x67\x6e\145\144") == "\143\150\145\x63\x6b\x65\x64" ? "\164\162\x75\x65" : "\x66\141\x6c\x73\x65";
        $fF = get_option("\x73\141\x6d\x6c\x5f\162\x65\x73\x70\157\156\163\145\137\163\x69\147\x6e\x65\144") == "\143\150\145\x63\x6b\145\144" ? "\164\x72\x75\145" : "\146\141\154\163\x65";
        $c8 = array("\x63\x75\x73\x74\157\x6d\145\x72\x49\144" => $vr, "\151\144\x70\124\x79\x70\x65" => $eE, "\151\144\x65\x6e\164\x69\x66\x69\x65\x72" => $Om, "\163\141\x6d\x6c\x4c\x6f\x67\151\x6e\x55\162\x6c" => $PV, "\163\141\x6d\x6c\x4c\157\x67\157\x75\164\x55\162\x6c" => $PV, "\x69\144\x70\105\156\164\151\164\171\111\144" => $lM, "\x73\141\155\154\130\65\x30\x39\x43\x65\x72\164\151\x66\x69\x63\141\x74\145" => $Ek, "\x61\x73\x73\x65\162\x74\x69\x6f\x6e\x53\x69\147\x6e\x65\144" => $Xt, "\x72\x65\163\160\x6f\156\x73\145\x53\151\x67\x6e\145\x64" => $fF, "\x6f\x76\145\162\x72\151\144\145\x52\x65\x74\x75\x72\156\x55\x72\x6c" => "\164\x72\x75\145", "\x72\145\x74\x75\x72\156\x55\x72\154" => home_url() . "\x2f\77\157\x70\164\151\x6f\x6e\75\x72\x65\141\144\163\141\155\154\x6c\x6f\147\x69\156");
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\157\156\164\145\156\164\x2d\124\x79\160\x65\72\x20\141\160\160\154\151\x63\x61\164\x69\157\x6e\57\x6a\163\x6f\x6e", "\143\x68\141\162\x73\x65\164\x3a\40\125\x54\x46\40\55\40\x38", "\x41\x75\164\x68\x6f\162\151\172\x61\x74\151\x6f\156\72\40\102\141\x73\x69\x63"));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        $Hm = get_option("\155\x6f\x5f\x70\x72\157\x78\x79\137\150\x6f\x73\164");
        if (empty($Hm)) {
            goto So;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\157\137\160\162\x6f\170\171\x5f\150\x6f\x73\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\x6f\x5f\x70\162\157\x78\x79\x5f\160\x6f\162\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\137\x70\162\157\x78\x79\137\x75\163\x65\162\x6e\x61\155\145") . "\72" . get_option("\155\x6f\137\x70\162\157\x78\x79\137\x70\x61\x73\x73\x77\157\162\x64"));
        So:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto NO;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto wO;
        }
        wp_die("\x54\x68\145\x72\x65\x20\x77\141\x73\40\x61\x6e\40\151\x73\163\x75\x65\40\143\157\x6e\156\x65\x63\x74\151\x6f\156\40\164\157\x20\111\156\x74\x65\162\156\x65\x74\56\x20\103\150\x65\143\153\40\151\146\x20\x79\x6f\165\162\40\x66\151\x72\x65\x77\141\x6c\x6c\40\151\163\40\141\x6c\x6c\157\167\x69\156\x67\x20\157\165\x74\x62\157\x75\x6e\x64\40\x63\x6f\156\x6e\x65\x63\164\151\x6f\x6e\40\x74\157\x20\160\x6f\x72\164\40\64\x34\63\56\74\x62\x72\76\x3c\142\162\x3e\x49\x6e\40\143\x61\x73\x65\x20\x79\157\x75\x20\141\x72\145\x20\165\x73\x69\156\147\x20\160\162\157\x78\171\x2c\40\x67\x6f\x20\164\x6f\40\160\x72\157\x78\x79\40\164\x61\142\x20\x69\156\x20\160\154\165\x67\151\x6e\40\141\x6e\x64\40\143\157\x6e\x66\151\x67\165\x72\145\x20\160\162\157\170\171\40\163\145\164\x74\x69\x6e\147\x73\x2e");
        wO:
        echo "\122\145\x71\165\x65\x73\164\40\x45\x72\x72\157\162\72" . curl_error($WY);
        die;
        NO:
        curl_close($WY);
        return $YY;
    }
    function mo_saml_send_alert_email($vo)
    {
        $wy = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x68\157\x73\x74\137\156\141\155\x65") . "\57\x6d\x6f\141\x73\x2f\141\x70\151\x2f\156\x6f\164\151\146\171\57\x73\x65\x6e\x64";
        $WY = curl_init($wy);
        $VO = get_option("\155\x6f\137\163\x61\155\154\137\x61\144\x6d\x69\x6e\x5f\x63\165\x73\164\x6f\155\x65\162\137\153\145\171");
        $qt = get_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x61\144\x6d\151\156\x5f\x61\160\x69\x5f\153\145\x79");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\x68\141\x35\61\62", $ZT);
        $wJ = "\103\x75\163\x74\157\x6d\x65\x72\55\x4b\x65\x79\72\40" . $VO;
        $Ip = "\x54\151\155\145\x73\x74\x61\x6d\160\x3a\x20" . number_format($qI, 0, '', '');
        $wl = "\101\x75\164\x68\157\x72\151\172\x61\x74\151\x6f\156\72\x20" . $cP;
        $EG = get_option("\155\x6f\137\x73\141\155\x6c\x5f\x61\x64\155\151\156\137\145\155\x61\151\x6c");
        $YY = "\110\x65\x6c\154\157\54\74\142\162\x3e\x3c\142\162\76\131\157\x75\162\x20\x3c\142\76\106\x52\x45\105\40\x54\x72\x69\x61\154\74\57\142\x3e\40\x77\x69\154\154\x20\145\x78\x70\x69\x72\145\x20\151\156\40" . $vo . "\x20\x64\141\171\x73\x20\146\157\162\x20\155\x69\x6e\x69\x4f\x72\141\x6e\x67\145\40\x53\101\x4d\x4c\x20\x70\x6c\x75\147\151\x6e\x20\157\156\40\x79\157\x75\x72\x20\167\x65\142\x73\151\164\x65\40\x3c\x62\x3e" . get_bloginfo() . "\74\57\x62\x3e\x2e\x3c\x62\162\76\x3c\x62\x72\x3e" . addLink("\x43\x6c\151\x63\x6b\40\x68\145\x72\x65", "\150\x74\164\x70\x73\72\57\x2f\x61\x75\x74\150\x2e\155\151\x6e\151\x6f\162\x61\x6e\147\145\56\x63\x6f\x6d\x2f\155\x6f\141\163\57\154\157\x67\x69\x6e\x3f\162\145\144\x69\x72\x65\x63\164\x55\162\154\x3d\x68\164\164\x70\163\72\57\x2f\141\165\x74\150\x2e\x6d\151\x6e\151\x6f\x72\x61\156\147\x65\x2e\143\157\155\x2f\155\x6f\141\163\x2f\151\x6e\x69\164\x69\141\154\151\x7a\x65\160\141\x79\x6d\145\x6e\x74\x26\x72\145\x71\x75\x65\163\164\x4f\x72\151\147\x69\x6e\x3d\x77\160\x5f\163\141\x6d\154\137\163\x73\157\137\142\x61\x73\x69\x63\x5f\x70\x6c\x61\156") . "\x20\164\x6f\40\165\x70\x67\162\141\144\x65\40\x74\157\x20\x6f\x75\162\40\160\x72\145\155\151\165\x6d\40\160\154\x61\x6e\40\163\157\x6f\x6e\x20\151\x66\40\x79\x6f\165\40\167\141\156\164\x20\x74\x6f\x20\x63\157\156\164\151\156\165\x65\x20\165\163\x69\x6e\x67\40\157\165\162\x20\160\x6c\165\147\x69\x6e\x2e\x20\131\157\x75\40\143\141\x6e\x20\x72\x65\x66\x65\162\x20\x4c\151\143\x65\156\163\151\156\x67\x20\164\x61\x62\x20\x66\x6f\x72\40\157\165\162\40\160\x72\145\x6d\x69\x75\x6d\x20\x70\154\x61\x6e\x73\56\74\142\x72\76\x3c\142\x72\x3e\x54\x68\141\x6e\x6b\163\54\74\x62\x72\x3e\x6d\151\x6e\x69\x4f\162\141\156\x67\x65";
        $Tu = "\124\162\x69\141\x6c\40\x76\x65\x72\163\x69\x6f\156\x20\145\170\160\x69\162\x69\x6e\x67\40\x69\x6e\x20" . $vo . "\x20\x64\x61\171\163\40\146\x6f\x72\x20\x6d\151\x6e\x69\117\162\141\x6e\147\145\x20\x53\101\115\x4c\x20\x70\x6c\x75\x67\151\x6e\40\174\x20" . get_bloginfo();
        if (!($vo == 1)) {
            goto q8;
        }
        $YY = str_replace("\144\x61\171\163", "\x64\x61\171", $YY);
        $Tu = str_replace("\144\x61\x79\163", "\144\x61\171", $Tu);
        q8:
        $c8 = array("\143\165\163\164\157\x6d\145\x72\113\145\171" => $VO, "\x73\x65\x6e\144\105\x6d\141\151\154" => true, "\145\x6d\x61\x69\x6c" => array("\x63\x75\x73\x74\x6f\x6d\145\162\113\145\x79" => $VO, "\146\162\157\155\x45\155\x61\x69\154" => "\x69\156\146\157\100\155\151\x6e\x69\x6f\x72\x61\156\x67\145\x2e\x63\157\x6d", "\142\143\143\105\x6d\x61\x69\x6c" => "\x61\x6e\151\162\142\x61\156\x40\x6d\x69\156\x69\157\x72\141\156\147\145\x2e\x63\x6f\155", "\x66\x72\157\155\116\x61\x6d\x65" => "\155\x69\x6e\151\117\162\x61\x6e\x67\x65", "\x74\x6f\105\155\x61\x69\154" => $EG, "\164\157\x4e\141\x6d\145" => $EG, "\163\x75\142\152\145\143\x74" => $Tu, "\x63\x6f\156\164\145\x6e\164" => $YY));
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\157\x6e\164\145\x6e\164\55\x54\171\160\x65\72\40\141\160\160\154\151\x63\141\164\x69\x6f\156\57\x6a\163\x6f\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\x6d\157\x5f\160\162\157\170\171\137\150\x6f\x73\x74");
        if (empty($Hm)) {
            goto hF;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\157\x5f\160\162\157\170\x79\137\x68\x6f\x73\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\157\137\x70\162\x6f\170\171\x5f\160\x6f\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\157\x5f\160\x72\157\x78\x79\137\x75\163\145\x72\x6e\x61\x6d\x65") . "\72" . get_option("\155\x6f\x5f\160\162\x6f\x78\171\137\x70\141\163\163\x77\157\x72\144"));
        hF:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto cd;
        }
        return;
        cd:
        curl_close($WY);
    }
    function mo_saml_forgot_password($Mb)
    {
        $wy = get_option("\155\x6f\137\163\141\x6d\154\137\150\x6f\x73\164\137\156\x61\x6d\x65") . "\x2f\x6d\x6f\141\x73\57\162\145\x73\x74\x2f\143\x75\163\x74\157\155\x65\x72\57\x70\141\x73\163\167\x6f\162\x64\55\x72\x65\163\145\x74";
        $WY = curl_init($wy);
        $VO = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x61\x64\155\151\x6e\x5f\x63\165\163\164\x6f\155\x65\162\x5f\x6b\x65\171");
        $qt = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x61\x64\155\x69\156\x5f\141\160\151\137\x6b\x65\x79");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\x68\x61\x35\61\x32", $ZT);
        $wJ = "\103\x75\x73\x74\157\x6d\145\162\55\113\x65\x79\x3a\40" . $VO;
        $Ip = "\x54\151\x6d\x65\x73\x74\x61\155\160\x3a\40" . number_format($qI, 0, '', '');
        $wl = "\x41\165\x74\x68\x6f\162\x69\172\141\164\151\x6f\156\x3a\x20" . $cP;
        $c8 = '';
        $c8 = array("\x65\155\x61\x69\154" => $Mb);
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\103\x6f\156\164\x65\x6e\164\x2d\124\x79\160\145\x3a\x20\x61\x70\160\154\151\143\141\x74\x69\157\x6e\x2f\x6a\x73\157\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\x6d\157\x5f\160\162\x6f\170\x79\x5f\x68\x6f\163\164");
        if (empty($Hm)) {
            goto PP;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\157\x5f\x70\x72\157\170\x79\137\150\x6f\163\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\x6f\x5f\160\162\157\170\x79\x5f\160\x6f\162\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\x5f\160\x72\157\x78\171\x5f\165\163\145\x72\156\x61\155\145") . "\x3a" . get_option("\x6d\157\x5f\160\x72\157\x78\171\137\x70\141\163\163\167\x6f\162\144"));
        PP:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto IW;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto e2;
        }
        wp_die("\124\150\x65\x72\145\x20\x77\x61\x73\x20\141\x6e\x20\x69\x73\163\x75\x65\x20\143\157\156\x6e\145\x63\164\151\157\x6e\x20\x74\x6f\40\x49\x6e\x74\x65\162\x6e\145\x74\x2e\40\x43\x68\x65\x63\x6b\40\151\146\40\171\x6f\165\162\40\x66\x69\x72\x65\167\x61\x6c\154\x20\x69\x73\40\x61\x6c\x6c\157\167\x69\x6e\x67\40\x6f\x75\164\142\x6f\165\156\x64\x20\143\157\156\x6e\x65\143\164\151\x6f\156\x20\164\x6f\x20\x70\157\162\x74\x20\x34\x34\x33\x2e\x3c\142\162\76\74\142\162\76\x49\x6e\x20\143\141\x73\145\x20\x79\x6f\165\x20\141\x72\145\40\165\163\151\x6e\147\40\x70\162\x6f\x78\171\54\x20\147\x6f\x20\x74\x6f\40\x70\x72\157\170\x79\40\x74\x61\x62\40\x69\x6e\x20\160\154\x75\x67\151\x6e\x20\x61\156\144\x20\143\x6f\156\x66\151\x67\x75\162\x65\x20\x70\162\157\170\x79\x20\163\x65\x74\x74\x69\x6e\x67\x73\56");
        e2:
        echo "\122\x65\161\x75\145\163\x74\x20\105\x72\162\157\162\x3a" . curl_error($WY);
        die;
        IW:
        curl_close($WY);
        return $YY;
    }
    function mo_saml_vl($Az, $pe)
    {
        if ($this->check_internet_connection()) {
            goto F7;
        }
        return "\x7b\x22\x73\164\141\164\165\163\x22\72\42\x53\x55\103\x43\x45\123\x53\42\x7d";
        F7:
        $wy = '';
        if ($pe) {
            goto fR;
        }
        $wy = get_option("\x6d\157\137\x73\x61\155\x6c\x5f\150\157\163\164\137\156\141\x6d\x65") . "\x2f\155\x6f\x61\163\57\141\160\151\x2f\142\x61\143\x6b\165\x70\x63\157\x64\145\57\x76\x65\x72\151\x66\171";
        goto Jz;
        fR:
        $wy = get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\x68\x6f\x73\x74\x5f\156\x61\x6d\x65") . "\x2f\x6d\157\x61\163\x2f\x61\x70\151\57\x62\141\143\x6b\165\160\x63\x6f\x64\x65\x2f\143\150\145\143\x6b";
        Jz:
        $WY = curl_init($wy);
        $VO = get_option("\x6d\157\137\x73\141\x6d\154\137\141\x64\x6d\x69\x6e\137\143\165\x73\164\x6f\x6d\x65\x72\x5f\153\x65\171");
        $qt = get_option("\155\157\x5f\163\x61\155\154\137\x61\x64\155\151\156\x5f\x61\x70\151\x5f\153\x65\171");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\150\141\x35\x31\62", $ZT);
        $wJ = "\103\x75\163\164\157\x6d\x65\x72\55\113\x65\171\72\x20" . $VO;
        $Ip = "\124\151\155\x65\x73\164\x61\155\x70\x3a\40" . number_format($qI, 0, '', '');
        $wl = "\x41\165\164\150\x6f\162\151\x7a\x61\164\151\x6f\x6e\72\x20" . $cP;
        $c8 = '';
        $c8 = array("\x63\157\144\x65" => $Az, "\x63\165\163\x74\x6f\155\145\x72\113\x65\171" => $VO, "\141\x64\x64\x69\164\x69\157\x6e\141\x6c\x46\151\x65\154\144\163" => array("\146\151\145\154\x64\61" => home_url()));
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\157\x6e\x74\x65\156\x74\55\124\x79\160\x65\x3a\40\141\x70\x70\154\151\x63\141\164\x69\x6f\x6e\x2f\152\x73\157\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\155\157\x5f\160\x72\x6f\x78\171\137\x68\157\163\x74");
        if (empty($Hm)) {
            goto kC;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\x6f\137\x70\x72\x6f\x78\x79\137\x68\x6f\163\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\x6f\137\160\x72\x6f\x78\x79\x5f\160\157\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\137\x70\x72\157\170\171\137\165\163\145\162\156\x61\x6d\x65") . "\72" . get_option("\x6d\157\x5f\160\162\157\170\x79\x5f\160\x61\163\163\x77\157\162\x64"));
        kC:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto pQ;
        }
        echo "\x52\145\x71\x75\x65\163\164\x20\x45\x72\162\157\162\x3a" . curl_error($WY);
        die;
        pQ:
        curl_close($WY);
        return $YY;
    }
    function check_customer_ln()
    {
        $wy = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\150\157\163\164\x5f\156\x61\155\x65") . "\57\155\157\141\x73\x2f\162\x65\x73\164\57\143\165\163\164\x6f\155\x65\x72\x2f\x6c\151\143\145\x6e\x73\145";
        $WY = curl_init($wy);
        $VO = get_option("\x6d\x6f\137\163\x61\155\154\137\141\144\x6d\151\156\137\143\165\163\x74\x6f\155\145\162\x5f\153\x65\x79");
        $qt = get_option("\x6d\157\137\163\x61\x6d\x6c\137\141\144\x6d\x69\x6e\x5f\141\160\x69\x5f\x6b\x65\171");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\x73\x68\x61\65\61\62", $ZT);
        $wJ = "\103\x75\x73\x74\x6f\x6d\x65\x72\55\x4b\145\171\72\40" . $VO;
        $Ip = "\124\x69\x6d\x65\163\164\x61\155\x70\x3a\40" . $qI;
        $wl = "\101\165\164\150\x6f\x72\151\172\x61\x74\x69\x6f\x6e\x3a\40" . $cP;
        $c8 = '';
        $c8 = array("\143\x75\x73\164\x6f\x6d\145\x72\111\x64" => $VO, "\x61\160\160\x6c\151\x63\141\164\151\157\156\x4e\141\155\145" => "\167\160\x5f\163\141\155\x6c\x5f\163\x73\x6f\137\142\x61\163\151\x63\x5f\160\x6c\141\156");
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\103\x6f\156\x74\x65\x6e\x74\55\124\x79\160\x65\x3a\40\141\x70\x70\x6c\x69\143\141\164\151\x6f\156\57\x6a\163\x6f\x6e", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\x6d\157\137\160\162\x6f\x78\171\137\150\157\x73\164");
        if (empty($Hm)) {
            goto qE;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\x6f\x5f\x70\162\x6f\170\171\x5f\x68\157\x73\164"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\157\x5f\x70\x72\x6f\170\x79\137\x70\x6f\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\x6d\157\x5f\x70\162\x6f\x78\x79\137\165\x73\145\162\156\141\155\145") . "\x3a" . get_option("\x6d\x6f\x5f\160\162\157\170\171\137\160\x61\x73\163\x77\157\162\144"));
        qE:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto Mm;
        }
        if (!$this->is_connection_issue(curl_errno($WY))) {
            goto yh;
        }
        wp_die("\124\150\x65\x72\145\40\167\x61\x73\40\141\156\40\151\x73\x73\165\x65\40\143\x6f\156\x6e\x65\143\164\151\157\156\40\164\157\x20\x49\156\164\x65\162\x6e\145\164\56\x20\103\x68\x65\143\x6b\x20\151\x66\x20\x79\x6f\x75\x72\40\x66\151\x72\x65\x77\x61\x6c\154\40\x69\x73\40\141\x6c\x6c\157\167\151\x6e\x67\x20\x6f\165\x74\142\x6f\x75\x6e\x64\x20\x63\157\x6e\156\145\143\164\x69\157\156\40\x74\157\40\x70\157\162\164\40\64\64\x33\x2e\74\x62\x72\76\x3c\142\x72\76\x49\156\40\143\x61\163\x65\x20\171\x6f\165\x20\x61\x72\x65\x20\165\163\151\x6e\x67\40\x70\162\157\x78\x79\54\40\x67\x6f\40\164\157\x20\x70\162\x6f\170\171\40\x74\141\x62\40\x69\156\40\160\x6c\165\147\151\x6e\40\x61\x6e\144\x20\x63\x6f\x6e\146\x69\147\165\162\145\40\x70\162\x6f\170\171\40\x73\145\164\164\x69\x6e\147\x73\56");
        yh:
        return false;
        Mm:
        curl_close($WY);
        return $YY;
    }
    function mo_saml_update_status()
    {
        $wy = get_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\150\157\163\164\137\156\141\x6d\x65") . "\x2f\155\157\141\163\57\x61\x70\151\57\142\x61\143\153\x75\160\x63\x6f\144\x65\57\165\160\144\141\164\x65\x73\164\x61\164\x75\163";
        $WY = curl_init($wy);
        $VO = get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x61\x64\x6d\x69\x6e\x5f\x63\x75\x73\x74\157\155\x65\x72\137\x6b\145\x79");
        $qt = get_option("\x6d\157\137\163\141\x6d\x6c\137\x61\x64\155\x69\156\x5f\141\x70\151\x5f\x6b\145\x79");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\163\150\141\x35\x31\x32", $ZT);
        $wJ = "\103\165\163\164\x6f\155\145\x72\55\113\145\171\72\40" . $VO;
        $Ip = "\124\151\155\145\x73\164\141\x6d\x70\x3a\40" . number_format($qI, 0, '', '');
        $wl = "\x41\165\x74\x68\157\x72\x69\172\x61\164\151\x6f\x6e\72\40" . $cP;
        $nz = get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x63\x75\163\x74\157\x6d\145\x72\137\164\157\153\x65\156");
        $Az = AESEncryption::decrypt_data(get_option("\x73\x6d\154\x5f\154\x6b"), $nz);
        $c8 = array("\143\157\144\145" => $Az, "\143\165\163\164\157\155\145\x72\x4b\145\x79" => $VO, "\x61\144\x64\151\164\151\157\156\141\x6c\106\151\145\x6c\x64\163" => array("\146\x69\145\x6c\x64\x31" => home_url()));
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\x6f\x6e\x74\x65\x6e\164\x2d\x54\x79\160\x65\72\x20\141\x70\x70\154\151\143\x61\x74\151\x6f\156\x2f\152\163\157\156", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\155\x6f\137\x70\x72\157\170\171\x5f\x68\x6f\163\164");
        if (empty($Hm)) {
            goto eP;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\155\x6f\x5f\160\162\x6f\170\x79\x5f\150\157\x73\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\x6d\x6f\x5f\160\162\157\170\x79\x5f\160\157\x72\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\x6f\x5f\160\162\x6f\x78\171\137\165\163\x65\x72\156\x61\x6d\145") . "\x3a" . get_option("\155\x6f\x5f\x70\162\157\x78\171\137\160\x61\163\163\167\x6f\162\x64"));
        eP:
        $YY = curl_exec($WY);
        if (!curl_errno($WY)) {
            goto zo;
        }
        return;
        zo:
        curl_close($WY);
        return $YY;
    }
    function mo_saml_send_user_exceeded_alert_email($HX)
    {
        $wy = get_option("\x6d\157\137\163\141\x6d\154\137\150\x6f\163\x74\x5f\156\141\x6d\145") . "\57\x6d\157\x61\x73\x2f\141\160\x69\57\156\x6f\x74\151\146\x79\x2f\x73\x65\x6e\x64";
        $WY = curl_init($wy);
        $VO = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x61\x64\155\x69\x6e\137\143\x75\x73\x74\157\x6d\x65\162\137\x6b\145\171");
        $qt = get_option("\155\157\x5f\x73\x61\x6d\154\137\x61\144\155\151\156\x5f\141\x70\151\137\153\145\x79");
        $qI = round(microtime(true) * 1000);
        $ZT = $VO . number_format($qI, 0, '', '') . $qt;
        $cP = hash("\x73\x68\x61\65\x31\62", $ZT);
        $wJ = "\103\x75\x73\x74\x6f\155\145\x72\55\113\x65\x79\72\x20" . $VO;
        $Ip = "\124\x69\x6d\x65\163\x74\x61\155\160\x3a\x20" . number_format($qI, 0, '', '');
        $wl = "\101\165\164\x68\157\162\x69\172\141\x74\151\157\156\x3a\40" . $cP;
        $EG = get_option("\155\x6f\x5f\163\x61\155\154\x5f\141\x64\x6d\151\156\x5f\145\155\141\x69\154");
        $YY = "\x48\x65\x6c\x6c\x6f\54\x3c\x62\x72\76\x3c\x62\x72\x3e\x59\157\165\x20\150\x61\x76\145\x20\x70\165\x72\x63\x68\x61\163\x65\x64\x20\154\151\143\x65\x6e\x73\145\40\146\157\162\40\x53\101\x4d\x4c\x20\123\151\156\147\x6c\x65\x20\123\151\147\156\55\117\156\x20\120\154\165\x67\x69\x6e\40\x66\157\162\x20\74\x62\76" . $HX . "\x20\x75\x73\x65\x72\x73\74\x2f\x62\76\x2e\x20\x41\163\40\x6e\165\155\x62\145\162\40\x6f\x66\40\165\x73\145\162\163\x20\x6f\156\40\171\x6f\x75\x72\x20\163\x69\164\145\40\x68\x61\x76\x65\x20\147\x72\157\167\156\x20\164\157\40\x6d\157\x72\x65\x20\x74\x68\x61\156\x20" . $HX . "\40\165\163\145\162\163\x20\156\x6f\x77\56\x20\131\157\x75\40\163\x68\157\x75\x6c\144\x20\x75\160\x67\162\x61\x64\145\x20\171\x6f\x75\162\x20\154\151\143\x65\x6e\x73\145\x20\x66\x6f\162\40\x6d\x69\156\151\117\x72\x61\156\147\145\x20\x53\101\x4d\x4c\40\x70\x6c\x75\147\x69\x6e\x20\157\x6e\x20\x79\157\x75\162\40\167\145\x62\163\151\x74\x65\x20\74\142\x3e" . get_bloginfo() . "\x3c\x2f\x62\76\x2e\x3c\142\162\x3e\x3c\x62\162\x3e" . addLink("\103\154\x69\x63\x6b\40\x68\145\162\145", get_option("\155\157\137\x73\x61\x6d\154\x5f\x68\x6f\163\x74\x5f\156\x61\155\x65") . "\x2f\x6d\157\141\x73\57\x6c\x6f\x67\151\x6e\77\x72\x65\144\x69\x72\145\143\x74\125\162\154\75" . get_option("\155\157\137\x73\x61\155\x6c\137\x68\157\x73\164\137\156\141\155\145") . "\x2f\x69\x6e\151\164\x69\141\154\x69\x7a\145\x70\141\171\155\x65\156\164\x26\162\145\161\165\x65\163\164\x4f\x72\x69\x67\x69\x6e\x3d\x77\x70\137\x73\x61\x6d\x6c\137\163\x73\x6f\x5f\160\162\x65\x6d\151\x75\x6d\137\165\160\147\x72\x61\x64\145\137\160\154\x61\x6e") . "\40\x74\x6f\40\x75\x70\147\x72\x61\144\145\x20\x74\x68\x65\40\154\x69\143\145\156\163\x65\x20\164\x6f\x20\x63\x6f\x6e\x74\x69\156\165\145\40\165\163\x69\156\147\x20\x6f\165\162\x20\160\x6c\x75\x67\x69\156\56\74\142\162\x3e\74\x62\x72\76\x54\x68\141\156\x6b\x73\54\x3c\142\x72\76\x6d\x69\x6e\x69\117\x72\141\156\147\145";
        $Tu = "\105\170\x63\145\145\144\x65\x64\x20\x4c\151\x63\145\156\163\x65\40\x4c\x69\x6d\151\x74\x20\x46\157\x72\x20\116\157\x20\117\x66\x20\125\x73\145\162\163\x20\55\x20\x57\x6f\x72\x64\x50\162\145\x73\163\x20\123\101\x4d\114\40\x53\151\x6e\x67\x6c\145\40\123\151\147\156\x2d\117\x6e\40\120\154\165\x67\151\x6e\x20\174\x20" . get_bloginfo();
        update_option("\x75\x73\145\162\137\141\154\145\x72\x74\137\x65\155\x61\x69\x6c\137\163\x65\156\164", 1);
        $c8 = array("\x63\165\x73\x74\157\155\145\162\113\145\x79" => $VO, "\x73\x65\156\x64\105\155\141\x69\x6c" => true, "\145\x6d\141\151\154" => array("\143\x75\163\164\157\155\145\162\113\x65\x79" => $VO, "\146\162\157\155\x45\155\141\151\154" => "\151\x6e\146\157\100\155\x69\x6e\x69\x6f\162\x61\x6e\x67\x65\56\x63\157\x6d", "\x62\143\x63\x45\155\141\x69\154" => "\151\x6e\146\157\100\x6d\x69\x6e\151\x6f\x72\x61\x6e\x67\x65\x2e\143\157\x6d", "\x66\162\x6f\155\x4e\x61\x6d\145" => "\x6d\x69\156\x69\x4f\x72\x61\156\x67\145", "\x74\x6f\x45\155\141\151\x6c" => $EG, "\x74\157\x4e\141\x6d\145" => $EG, "\163\x75\x62\x6a\x65\x63\164" => $Tu, "\x63\x6f\x6e\x74\x65\x6e\x74" => $YY));
        $sU = json_encode($c8);
        curl_setopt($WY, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($WY, CURLOPT_ENCODING, '');
        curl_setopt($WY, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($WY, CURLOPT_AUTOREFERER, true);
        curl_setopt($WY, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($WY, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($WY, CURLOPT_MAXREDIRS, 10);
        curl_setopt($WY, CURLOPT_HTTPHEADER, array("\x43\157\156\x74\x65\156\x74\55\x54\171\x70\145\72\40\x61\x70\160\x6c\x69\143\x61\x74\x69\157\156\x2f\x6a\163\x6f\x6e", $wJ, $Ip, $wl));
        curl_setopt($WY, CURLOPT_POST, true);
        curl_setopt($WY, CURLOPT_POSTFIELDS, $sU);
        curl_setopt($WY, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($WY, CURLOPT_TIMEOUT, 20);
        $Hm = get_option("\x6d\157\137\x70\x72\x6f\x78\x79\137\x68\157\x73\164");
        if (empty($Hm)) {
            goto mX;
        }
        curl_setopt($WY, CURLOPT_PROXY, get_option("\x6d\157\x5f\x70\162\x6f\170\x79\137\x68\157\x73\x74"));
        curl_setopt($WY, CURLOPT_PROXYPORT, get_option("\155\x6f\x5f\x70\x72\x6f\x78\x79\x5f\x70\x6f\162\x74"));
        curl_setopt($WY, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($WY, CURLOPT_PROXYUSERPWD, get_option("\155\157\137\160\162\157\x78\x79\x5f\165\x73\x65\x72\156\141\x6d\x65") . "\72" . get_option("\x6d\x6f\137\x70\x72\x6f\x78\171\x5f\160\x61\x73\163\x77\157\162\x64"));
        mX:
        $YY = curl_exec($WY);
        curl_close($WY);
    }
    function is_connection_issue($wW)
    {
        if (!($wW >= 5 && $wW <= 7)) {
            goto t1;
        }
        return true;
        t1:
        return false;
    }
    function check_internet_connection()
    {
        return (bool) @fsockopen("\141\x75\x74\150\56\x6d\x69\x6e\151\x6f\x72\141\x6e\x67\x65\x2e\143\157\155", 443, $pp, $Xv, 5);
    }
}
?>
