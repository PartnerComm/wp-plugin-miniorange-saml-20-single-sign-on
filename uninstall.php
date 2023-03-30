<?php


require_once dirname( __FILE__ ) . '/includes/lib/mo-options-enum.php';
require_once dirname( __FILE__ ) . '/Import-export.php';
define("\x55\x6e\151\x6e\x73\x74\141\154\154\x5f\x43\x6c\141\x73\163\x5f\116\141\x6d\x65\x73", serialize(array("\123\123\117\137\114\x6f\x67\151\x6e" => "\x6d\x6f\137\157\x70\x74\x69\x6f\x6e\x73\137\145\156\x75\x6d\x5f\x73\x73\x6f\x5f\154\157\x67\x69\156", "\111\144\x65\156\x74\151\x74\x79\137\120\162\x6f\x76\x69\144\145\x72" => "\155\157\137\x6f\x70\x74\151\x6f\x6e\x73\x5f\145\x6e\x75\x6d\x5f\x69\144\x65\x6e\164\x69\164\x79\137\x70\162\x6f\x76\151\x64\145\x72", "\x53\x65\162\166\x69\143\x65\x5f\120\162\157\x76\x69\144\x65\162" => "\155\157\x5f\157\160\x74\x69\157\156\163\137\x65\156\165\x6d\x5f\163\145\x72\x76\151\143\x65\x5f\x70\162\157\x76\151\144\145\x72", "\x41\164\x74\162\x69\142\165\164\145\x5f\x4d\141\160\160\151\156\147" => "\x6d\x6f\x5f\157\160\x74\x69\157\x6e\x73\137\x65\156\165\155\137\x61\164\164\162\x69\x62\x75\164\145\x5f\x6d\141\160\160\151\x6e\147", "\104\x6f\155\141\151\156\137\x52\145\163\x74\162\151\143\x74\x69\157\x6e" => "\155\x6f\137\x6f\160\164\151\157\156\x73\x5f\x65\x6e\x75\x6d\x5f\x64\157\155\141\x69\156\137\x72\145\x73\x74\x72\151\143\x74\x69\x6f\x6e", "\122\157\x6c\x65\137\x4d\141\160\160\x69\x6e\147" => "\x6d\157\x5f\157\160\164\151\157\x6e\163\x5f\145\x6e\165\155\x5f\162\x6f\x6c\145\x5f\155\141\160\x70\x69\156\147", "\x54\145\163\x74\137\x43\157\156\x66\x69\147\165\x72\141\164\x69\157\156" => "\155\157\137\x6f\160\x74\151\x6f\x6e\163\137\x65\156\x75\155\x5f\164\x65\x73\164\x5f\143\x6f\156\x66\151\x67\165\162\x61\164\151\157\156", "\x43\165\x73\164\157\x6d\137\x43\145\x72\164\151\146\x69\143\x61\x74\x65" => "\155\x6f\x5f\x6f\160\164\x69\x6f\156\163\x5f\145\x6e\165\x6d\137\x63\x75\x73\164\x6f\x6d\x5f\x63\145\162\x74\151\x66\151\143\141\x74\145", "\x43\x75\x73\164\157\155\x5f\x4d\145\x73\163\x61\147\145" => "\155\x6f\x5f\157\x70\x74\151\x6f\x6e\x73\x5f\145\x6e\165\x6d\137\143\165\x73\164\x6f\155\x5f\155\145\x73\163\x61\x67\x65\x73", "\120\154\165\147\x69\x6e\137\101\144\155\x69\x6e" => "\x6d\x6f\137\157\160\x74\151\x6f\x6e\163\137\160\x6c\x75\147\151\x6e\x5f\x61\x64\x6d\151\x6e", "\x45\156\166\151\x72\x6f\156\x6d\145\156\x74\163" => "\x6d\x6f\137\157\160\x74\x69\x6f\156\x73\137\145\x6e\x76\151\x72\157\156\x6d\145\x6e\164\x73")));
if (defined("\x57\x50\x5f\125\116\x49\x4e\x53\x54\x41\114\x4c\x5f\x50\x4c\125\107\111\x4e")) {
    goto p2i;
}
exit;
p2i:
if (!(get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x6b\x65\145\160\137\x73\x65\164\x74\x69\x6e\147\163\x5f\x6f\x6e\x5f\144\145\x6c\x65\164\151\157\156") !== "\164\x72\165\145")) {
    goto g5J;
}
if (!is_multisite()) {
    goto vu2;
}
global $wpdb;
$zJ = $wpdb->get_col("\x53\105\x4c\105\x43\x54\x20\x62\154\x6f\x67\x5f\151\144\x20\106\122\x4f\115\40{$wpdb->blogs}");
$ey = get_current_blog_id();
foreach ($zJ as $blog_id) {
    switch_to_blog($blog_id);
    mo_saml_delete_plugin_configuration();
    mo_saml_delete_user_meta();
    S1Z:
}
mpq:
switch_to_blog($ey);
goto I6l;
vu2:
mo_saml_delete_plugin_configuration();
mo_saml_delete_user_meta();
I6l:
g5J:
function mo_saml_delete_plugin_configuration()
{
    $Za = unserialize(Uninstall_Class_Names);
    $bz = array();
    foreach ($Za as $WO => $cK) {
        $bz[$WO] = mo_get_configuration_array($cK, true);
        KRh:
    }
    TNJ:
    foreach ($bz as $Yo => $FO) {
        foreach ($FO as $nz => $jh) {
            delete_option($jh);
            Hq_:
        }
        IDs:
        RJ8:
    }
    UU9:
}
function mo_saml_delete_user_meta()
{
    $pk = get_users(array());
    foreach ($pk as $user) {
        delete_user_meta($user->ID, "\x6d\x6f\x5f\163\141\155\x6c\x5f\x75\x73\x65\x72\137\141\164\164\x72\x69\x62\165\164\x65\x73");
        delete_user_meta($user->ID, "\155\157\x5f\163\141\x6d\x6c\x5f\163\145\163\x73\151\x6f\156\x5f\x69\156\x64\145\x78");
        delete_user_meta($user->ID, "\x6d\x6f\137\163\141\155\x6c\137\x6e\x61\155\x65\x5f\151\144");
        Uvr:
    }
    BPO:
}
