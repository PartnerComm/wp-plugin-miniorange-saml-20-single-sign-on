<?php


class mo_saml_wp_cli_commands
{
    private function check_for_empty_or_null($nw, $WO)
    {
        if (!empty($nw)) {
            goto r6;
        }
        WP_CLI::error("\124\x68\145\x72\x65\x20\x68\141\163\x20\142\x65\145\156\x20\x65\x72\x72\x6f\x72\40\x70\162\x6f\143\145\163\x73\151\x6e\x67\40\171\x6f\x75\x72\40\162\145\161\x75\x65\x73\164\56\40" . $WO . "\x20\151\163\x20\x65\151\164\150\x65\x72\40\x65\x6d\x70\164\x79\40\x6f\162\x20\156\x75\154\154");
        r6:
    }
    private function file_checks($H3)
    {
        if (file_exists($H3)) {
            goto LO;
        }
        WP_CLI::error(mo_saml_cli_error::File_Not_Found);
        LO:
        $G7 = filetype($H3);
        if (!($G7 != "\x6a\163\x6f\x6e")) {
            goto OH;
        }
        WP_CLI::error(mo_saml_cli_error::Incorrect_File_Format);
        OH:
    }
    public function fetch($h6, $sJ)
    {
        $this->check_for_empty_or_null($sJ["\x63\157\x6e\146\x69\147"], "\111\156\160\x75\x74");
        $H3 = dirname(__FILE__) . "\57" . $sJ["\143\157\156\x66\151\147"];
        $this->file_checks($H3);
        $xg = file_get_contents($H3);
        $xg = json_decode($xg, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto tm;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        tm:
        mo_update_configuration_array($xg);
        WP_CLI::success("\123\145\x74\164\151\156\x67\x73\x20\141\x70\x70\x6c\x69\145\144\x20\163\165\x63\x63\145\163\163\146\x75\154\x6c\x79\x2e");
        exit;
    }
    public function activate($h6, $sJ)
    {
        $this->check_for_empty_or_null($sJ["\146\151\x6c\x65"], "\x46\x69\x6c\x65");
        $this->check_for_empty_or_null($sJ["\144\x6f\155\x61\x69\156"], "\104\157\x6d\x61\x69\156");
        $H3 = dirname(__FILE__) . "\57" . $sJ["\146\151\154\145"];
        $this->file_checks($H3);
        $No = file_get_contents($H3);
        $NB = json_decode($No);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto CR;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        CR:
        $T1 = $NB->customer_key;
        $PS = $NB->customer_api_key;
        $NC = $NB->customer_token_key;
        $G2 = $NB->admin_email;
        $this->check_for_empty_or_null($T1, "\x43\165\x73\x74\157\x6d\145\162\x20\x4b\145\x79");
        $this->check_for_empty_or_null($PS, "\x43\165\163\x74\157\155\x65\x72\40\x41\120\x49\x20\x4b\x65\x79");
        $this->check_for_empty_or_null($NC, "\x43\165\163\x74\157\155\145\x72\x20\x54\157\153\x65\156");
        $this->check_for_empty_or_null($G2, "\101\144\155\x69\156\x20\105\155\141\x69\154");
        $hn = $sJ["\x64\157\155\x61\x69\156"];
        $m2 = $NB->{$hn};
        $H6 = $m2->mo_saml_license_key;
        $this->check_for_empty_or_null($H6, "\x4c\151\x63\145\x6e\163\145\x20\x4b\x65\171");
        $yy = new saml_mo_login();
        $yy->mo_sso_saml_deactivate();
        $yy->mo_cli_save_details($T1, $PS, $NC, $G2, $H6);
    }
}
WP_CLI::add_command("\x73\141\155\154", "\x6d\157\137\x73\141\155\x6c\137\x77\160\x5f\x63\154\151\137\143\x6f\155\155\x61\156\144\163");
