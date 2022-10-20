<?php


class mo_saml_wp_cli_commands
{
    private function check_for_empty_or_null($aa, $U6)
    {
        if (!empty($aa)) {
            goto XC;
        }
        WP_CLI::error("\x54\150\145\x72\145\x20\150\x61\163\x20\x62\145\145\x6e\40\145\162\x72\157\162\40\160\x72\x6f\x63\x65\163\x73\x69\156\147\x20\171\x6f\x75\162\40\x72\145\161\x75\145\163\x74\56\40" . $U6 . "\40\151\x73\x20\x65\x69\x74\x68\x65\x72\x20\x65\x6d\x70\x74\x79\40\x6f\162\x20\156\165\154\154");
        XC:
    }
    private function file_checks($Fc)
    {
        if (file_exists($Fc)) {
            goto ur;
        }
        WP_CLI::error(mo_saml_cli_error::File_Not_Found);
        ur:
        $Ej = filetype($Fc);
        if (!($Ej != "\152\x73\157\x6e")) {
            goto I4;
        }
        WP_CLI::error(mo_saml_cli_error::Incorrect_File_Format);
        I4:
    }
    public function fetch($gX, $Gz)
    {
        $this->check_for_empty_or_null($Gz["\143\x6f\x6e\146\x69\147"], "\x49\156\x70\x75\164");
        $Fc = dirname(__FILE__) . "\x2f" . $Gz["\143\x6f\156\x66\x69\147"];
        $this->file_checks($Fc);
        $ID = file_get_contents($Fc);
        $ID = json_decode($ID, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto Vd;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        Vd:
        mo_update_configuration_array($ID);
        WP_CLI::success("\x53\145\x74\164\151\156\147\x73\x20\141\160\x70\x6c\151\x65\144\40\x73\165\143\143\x65\163\x73\x66\x75\154\x6c\171\56");
        exit;
    }
    public function activate($gX, $Gz)
    {
        $this->check_for_empty_or_null($Gz["\x66\151\x6c\x65"], "\x46\151\x6c\145");
        $this->check_for_empty_or_null($Gz["\144\157\x6d\x61\151\156"], "\x44\157\x6d\141\151\x6e");
        $Fc = dirname(__FILE__) . "\x2f" . $Gz["\x66\151\154\x65"];
        $this->file_checks($Fc);
        $lp = file_get_contents($Fc);
        $H2 = json_decode($lp);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto Kf;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        Kf:
        $xl = $H2->customer_key;
        $nW = $H2->customer_api_key;
        $Y_ = $H2->customer_token_key;
        $jL = $H2->admin_email;
        $this->check_for_empty_or_null($xl, "\103\165\163\164\x6f\155\145\162\40\113\x65\x79");
        $this->check_for_empty_or_null($nW, "\x43\165\163\x74\x6f\155\145\162\x20\x41\x50\111\40\113\x65\x79");
        $this->check_for_empty_or_null($Y_, "\103\165\163\164\x6f\155\x65\162\40\124\157\x6b\145\156");
        $this->check_for_empty_or_null($jL, "\101\x64\155\x69\156\40\105\155\x61\151\154");
        $VX = $Gz["\144\157\155\x61\x69\156"];
        $oU = $H2->{$VX};
        $lV = $oU->mo_saml_license_key;
        $this->check_for_empty_or_null($lV, "\x4c\x69\143\x65\x6e\x73\x65\x20\x4b\145\x79");
        $pl = new saml_mo_login();
        $pl->mo_sso_saml_deactivate();
        $pl->mo_cli_save_details($xl, $nW, $Y_, $jL, $lV);
    }
}
WP_CLI::add_command("\x73\141\x6d\x6c", "\155\x6f\137\x73\141\155\x6c\137\167\160\x5f\143\x6c\151\x5f\x63\x6f\155\155\x61\x6e\x64\x73");
