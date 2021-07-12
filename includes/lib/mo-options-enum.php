<?php


include "\102\141\163\151\x63\105\x6e\165\x6d\x2e\160\150\160";
class mo_options_enum_sso_login extends BasicEnum
{
    const Relay_state = "\x6d\x6f\137\x73\141\155\154\137\x72\x65\x6c\141\171\137\x73\164\141\x74\x65";
    const Logout_Relay_state = "\155\157\137\x73\141\x6d\x6c\137\154\x6f\x67\x6f\165\x74\x5f\162\145\x6c\x61\x79\x5f\163\x74\x61\x74\x65";
    const Redirect_Idp = "\155\x6f\x5f\163\141\x6d\x6c\137\x72\145\x67\151\x73\x74\145\x72\145\144\137\x6f\x6e\x6c\x79\x5f\x61\143\143\145\163\163";
    const Force_authentication = "\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x66\x6f\x72\x63\x65\137\x61\x75\164\x68\x65\156\164\x69\x63\x61\164\x69\x6f\156";
    const Enable_access_RSS = "\x6d\157\x5f\163\141\x6d\x6c\137\145\x6e\141\x62\x6c\145\137\x72\163\163\x5f\141\143\143\145\x73\163";
    const Auto_redirect = "\x6d\157\x5f\163\x61\x6d\x6c\x5f\x65\156\x61\x62\154\145\137\154\x6f\147\151\x6e\x5f\162\145\144\151\162\145\143\164";
    const Allow_wp_signin = "\x6d\x6f\x5f\163\x61\x6d\154\137\x61\154\x6c\x6f\x77\x5f\x77\160\137\163\151\x67\x6e\x69\156";
    const Backdoor_URL = "\x6d\157\x5f\163\x61\155\154\x5f\x62\141\143\x6b\144\x6f\157\162\137\x75\162\154";
    const Custom_login_button = "\155\157\137\163\141\155\154\137\143\x75\163\x74\x6f\155\x5f\154\157\147\x69\x6e\137\x74\x65\x78\x74";
    const Custom_greeting_text = "\155\157\137\x73\x61\155\x6c\137\143\165\163\164\157\x6d\137\x67\x72\x65\145\x74\151\156\147\x5f\164\145\170\164";
    const Custom_greeting_name = "\x6d\157\x5f\163\141\155\x6c\137\147\162\145\145\164\x69\x6e\147\137\156\141\155\x65";
    const Custom_logout_button = "\155\157\x5f\x73\x61\x6d\154\137\x63\165\163\x74\x6f\155\x5f\x6c\157\147\x6f\165\164\137\x74\145\x78\164";
    const Redirect_to_WP_login = "\155\x6f\137\163\x61\x6d\x6c\137\162\x65\144\x69\x72\x65\143\164\x5f\x74\x6f\137\x77\160\x5f\x6c\x6f\147\151\156";
    const Add_SSO_button = "\155\157\x5f\163\141\x6d\x6c\137\141\x64\144\137\163\163\157\x5f\x62\x75\164\164\x6f\x6e\x5f\167\x70";
    const Use_Button_as_shortcode = "\x6d\x6f\x5f\x73\141\155\154\137\x75\x73\x65\137\x62\165\x74\164\157\x6e\x5f\141\163\137\163\x68\157\162\164\x63\157\x64\145";
    const Use_Button_as_widget = "\155\157\137\x73\141\x6d\154\137\165\163\x65\137\142\165\164\x74\x6f\156\x5f\x61\x73\x5f\167\x69\144\147\145\x74";
    const SSO_Button_Size = "\155\157\x5f\163\x61\155\154\x5f\142\165\164\x74\x6f\x6e\137\x73\x69\172\145";
    const SSO_Button_Width = "\155\157\x5f\x73\141\155\x6c\137\142\165\164\x74\x6f\156\137\167\x69\x64\x74\150";
    const SSO_Button_Height = "\x6d\157\137\x73\x61\x6d\154\x5f\x62\165\x74\164\x6f\156\x5f\x68\145\x69\147\x68\164";
    const SSO_Button_Curve = "\155\x6f\x5f\163\141\155\x6c\137\x62\165\164\164\157\x6e\x5f\143\165\x72\x76\145";
    const SSO_Button_Color = "\x6d\157\x5f\x73\141\155\154\x5f\142\165\164\x74\x6f\156\x5f\143\157\x6c\x6f\x72";
    const SSO_Button_Text = "\155\x6f\137\x73\x61\155\154\x5f\142\x75\164\164\157\x6e\137\x74\145\x78\164";
    const SSO_Button_font_color = "\155\x6f\137\x73\x61\x6d\154\137\x66\x6f\x6e\164\x5f\143\x6f\154\157\x72";
    const SSO_Button_font_size = "\155\157\x5f\x73\141\x6d\x6c\x5f\146\x6f\156\x74\x5f\x73\x69\x7a\145";
    const SSO_Button_position = "\163\163\x6f\137\142\x75\x74\x74\x6f\156\x5f\154\x6f\147\x69\156\137\x66\x6f\162\x6d\x5f\160\x6f\163\151\164\151\157\156";
    const Keep_Configuration_Intact = "\155\157\137\x73\141\x6d\x6c\x5f\153\x65\145\160\137\x73\x65\164\x74\x69\x6e\x67\163\137\x6f\156\137\144\145\x6c\x65\x74\151\x6f\x6e";
}
class mo_options_enum_identity_provider extends BasicEnum
{
    const Broker_service = "\x6d\157\137\x73\x61\155\x6c\x5f\x65\x6e\141\142\x6c\x65\x5f\x63\x6c\x6f\x75\x64\x5f\142\162\x6f\x6b\145\162";
    const SP_Base_Url = "\x6d\157\137\x73\x61\155\154\137\x73\160\x5f\x62\x61\x73\x65\x5f\x75\x72\x6c";
    const SP_Entity_ID = "\x6d\x6f\x5f\x73\x61\x6d\154\137\x73\x70\x5f\x65\156\x74\151\x74\x79\137\151\144";
}
class mo_options_enum_service_provider extends BasicEnum
{
    const Identity_name = "\163\x61\155\154\137\151\x64\x65\156\164\x69\x74\171\x5f\x6e\x61\x6d\x65";
    const Login_binding_type = "\163\141\x6d\154\x5f\154\157\147\151\156\137\142\151\x6e\144\151\156\147\x5f\x74\x79\160\x65";
    const Login_URL = "\x73\141\155\154\137\154\x6f\x67\151\x6e\x5f\165\162\x6c";
    const Logout_binding_type = "\x73\141\x6d\154\x5f\154\157\x67\157\x75\164\137\x62\x69\156\144\x69\x6e\147\x5f\x74\x79\160\145";
    const Logout_URL = "\163\x61\x6d\154\x5f\154\157\147\157\165\x74\137\165\x72\154";
    const Issuer = "\x73\141\155\154\x5f\151\x73\x73\x75\145\162";
    const X509_certificate = "\163\141\x6d\154\137\170\65\60\71\x5f\143\x65\x72\x74\x69\x66\151\x63\x61\164\x65";
    const Request_signed = "\163\x61\x6d\154\137\162\x65\161\165\145\x73\x74\137\x73\151\x67\156\145\x64";
    const NameID_Format = "\163\x61\155\154\137\156\x61\155\x65\x69\x64\137\146\157\162\155\141\164";
    const Guide_name = "\163\141\x6d\x6c\137\x69\144\145\156\164\x69\x74\171\137\x70\x72\x6f\166\151\144\145\162\137\x67\x75\151\x64\x65\137\156\x61\155\145";
    const Is_encoding_enabled = "\x6d\x6f\x5f\x73\x61\x6d\154\x5f\145\156\143\157\x64\151\156\x67\x5f\x65\156\141\x62\154\145\x64";
}
class mo_options_enum_test_configuration extends BasicEnum
{
    const SAML_REQUEST = "\x6d\157\137\x73\x61\x6d\154\137\x72\x65\x71\x75\x65\x73\x74";
    const SAML_RESPONSE = "\x6d\157\137\163\141\x6d\154\137\x72\145\x73\160\x6f\156\163\145";
    const TEST_CONFIG_ERROR_LOG = "\155\157\x5f\x73\x61\155\x6c\x5f\164\145\163\x74";
    const TEST_CONFIG_ATTIBUTES = "\x6d\157\x5f\x73\141\155\x6c\x5f\x74\145\x73\x74\137\143\x6f\156\x66\x69\147\137\141\164\x74\162\x73";
}
class mo_options_enum_attribute_mapping extends BasicEnum
{
    const Attribute_Username = "\163\141\x6d\x6c\x5f\141\x6d\137\x75\x73\145\162\x6e\x61\155\x65";
    const Attribute_Email = "\163\141\155\154\x5f\141\155\x5f\145\155\141\151\x6c";
    const Attribute_First_name = "\x73\141\x6d\154\x5f\x61\x6d\x5f\146\x69\x72\x73\x74\137\x6e\141\155\145";
    const Attribute_Last_name = "\x73\x61\155\154\137\141\x6d\137\x6c\141\163\x74\137\x6e\141\x6d\x65";
    const Attribute_Group_name = "\x73\x61\155\x6c\x5f\x61\x6d\x5f\147\x72\x6f\x75\160\x5f\156\141\155\145";
    const Attribute_Custom_mapping = "\155\157\x5f\163\141\155\x6c\137\143\165\x73\164\x6f\155\x5f\x61\164\x74\162\163\x5f\155\x61\160\160\151\x6e\147";
    const Attribute_Account_matcher = "\x73\x61\155\x6c\x5f\x61\155\137\141\143\x63\x6f\165\156\x74\137\155\x61\x74\x63\x68\145\x72";
    const Attribute_Display_name = "\x73\x61\155\x6c\137\141\155\137\x64\151\x73\160\154\141\x79\137\156\x61\155\x65";
    const Attribute_Show_in_User_Menu = "\x73\x61\x6d\x6c\137\x73\x68\157\x77\x5f\165\163\145\x72\137\x61\x74\164\162\151\x62\x75\164\145";
}
class mo_options_enum_domain_restriction extends BasicEnum
{
    const Email_Domains = "\x73\141\x6d\154\x5f\x61\x6d\x5f\145\x6d\141\151\154\137\x64\x6f\x6d\x61\151\156\163";
    const Enable_Domain_Restriction_Login = "\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\x65\156\141\142\154\x65\137\x64\x6f\155\141\151\x6e\137\162\x65\x73\x74\162\151\143\164\x69\x6f\156\137\x6c\x6f\147\x69\x6e";
    const Allow_deny_user_with_Domain = "\x6d\157\137\x73\x61\x6d\154\x5f\141\154\154\157\167\x5f\144\145\156\171\137\x75\x73\145\x72\137\x77\x69\x74\x68\137\x64\157\x6d\x61\x69\156";
}
class mo_options_enum_role_mapping extends BasicEnum
{
    const Role_do_not_auto_create_users = "\x6d\x6f\137\x73\x61\x6d\154\x5f\144\157\156\x74\137\143\x72\145\141\x74\145\x5f\x75\163\145\162\137\x69\x66\137\162\x6f\154\145\x5f\x6e\157\164\x5f\x6d\141\x70\160\x65\x64";
    const Role_do_not_assign_role_unlisted = "\163\x61\155\154\x5f\141\x6d\137\144\x6f\x6e\164\137\141\x6c\154\x6f\x77\x5f\165\156\154\151\x73\164\x65\144\x5f\x75\x73\145\x72\137\x72\157\x6c\145";
    const Role_do_not_update_existing_user = "\x73\x61\155\154\137\141\155\137\144\157\156\164\x5f\165\160\144\x61\x74\145\137\145\170\151\163\x74\151\156\x67\x5f\x75\x73\145\162\137\162\x6f\154\145";
    const Role_default_role = "\163\141\x6d\154\137\141\155\x5f\144\145\146\141\165\154\164\x5f\x75\163\x65\162\x5f\x72\157\154\145";
    const Role_do_not_login_with_roles = "\163\x61\x6d\x6c\137\x61\155\137\144\x6f\x6e\164\x5f\141\x6c\x6c\157\167\137\165\163\145\162\137\164\157\x6c\x6f\x67\151\x6e\137\x63\x72\145\141\x74\x65\x5f\167\151\164\x68\x5f\x67\x69\x76\x65\156\x5f\x67\162\x6f\165\160\x73";
    const Role_restrict_users_with_groups = "\155\157\x5f\x73\141\155\154\x5f\162\145\x73\x74\162\151\143\164\x5f\165\x73\x65\162\x73\137\x77\x69\x74\150\137\x67\x72\157\165\160\163";
    const Role_mapping = "\163\x61\155\x6c\x5f\x61\155\137\162\x6f\154\145\x5f\x6d\x61\160\x70\151\156\x67";
}
class mo_options_enum_custom_certificate extends BasicEnum
{
    const Custom_Public_Certificate = "\155\x6f\137\163\141\155\154\x5f\143\165\163\164\x6f\155\x5f\x63\x65\x72\164";
    const Custom_Private_Certificate = "\x6d\x6f\137\163\x61\x6d\x6c\x5f\143\x75\x73\164\157\x6d\x5f\143\145\162\x74\x5f\160\162\151\166\141\x74\145\x5f\x6b\x65\171";
    const Enable_Public_certificate = "\x6d\x6f\137\x73\141\155\x6c\x5f\x65\x6e\x61\142\x6c\145\x5f\143\x75\x73\x74\157\155\137\x63\x65\x72\x74\151\x66\151\143\141\x74\145";
}
class mo_options_enum_custom_messages extends BasicEnum
{
    const Custom_Account_Creation_Disabled_message = "\155\x6f\x5f\x73\x61\155\154\137\x61\x63\x63\157\x75\x6e\164\137\143\x72\x65\141\164\x69\157\156\137\144\151\x73\141\142\154\x65\x64\137\x6d\163\147";
    const Custom_Restricted_Domain_message = "\155\157\x5f\x73\141\x6d\x6c\x5f\x72\x65\x73\164\162\151\x63\164\x65\144\x5f\144\x6f\x6d\x61\151\156\x5f\x65\162\162\x6f\162\137\155\163\x67";
}
class mo_options_error_constants extends BasicEnum
{
    const Error_no_certificate = "\x55\156\141\142\154\x65\x20\x74\157\40\x66\151\156\x64\40\x61\40\x63\145\162\x74\151\x66\151\x63\x61\164\x65\40\56";
    const Cause_no_certificate = "\116\x6f\40\x73\151\147\x6e\141\x74\165\x72\145\40\146\157\165\x6e\144\40\x69\156\40\x53\x41\115\114\x20\x52\x65\x73\160\x6f\156\x73\145\x20\157\x72\x20\x41\163\163\x65\162\164\x69\157\x6e\x2e\x20\x50\154\145\141\163\x65\x20\163\x69\147\x6e\x20\141\x74\x20\154\145\x61\x73\164\x20\157\156\x65\x20\x6f\146\40\164\150\145\155\x2e";
    const Error_wrong_certificate = "\125\x6e\141\142\154\145\x20\164\x6f\40\x66\x69\x6e\x64\x20\x61\40\x63\145\162\164\151\x66\x69\143\x61\164\145\x20\155\x61\x74\143\x68\151\x6e\147\40\164\150\x65\x20\143\157\156\x66\151\x67\x75\162\145\x64\40\x66\x69\156\x67\145\x72\x70\162\151\x6e\164\56";
    const Cause_wrong_certificate = "\x58\x2e\x35\x30\x39\40\103\x65\x72\164\151\146\x69\143\141\164\x65\40\146\151\x65\x6c\144\40\x69\x6e\x20\x70\154\165\x67\x69\x6e\x20\x64\x6f\145\163\x20\x6e\x6f\x74\x20\x6d\141\164\143\x68\x20\164\x68\145\40\x63\x65\x72\x74\x69\146\x69\x63\141\x74\145\x20\x66\157\165\x6e\x64\40\x69\x6e\40\123\x41\115\x4c\x20\122\x65\163\160\157\156\163\x65\x2e";
    const Error_invalid_audience = "\x49\x6e\x76\141\x6c\x69\x64\x20\x41\x75\144\151\x65\156\x63\x65\x20\x55\122\x49\56";
    const Cause_invalid_audience = "\x54\x68\145\40\x76\141\x6c\165\145\x20\157\x66\x20\47\101\165\x64\x69\145\156\x63\x65\x20\x55\122\x49\47\x20\x66\x69\145\x6c\x64\x20\x6f\x6e\40\x49\144\145\x6e\x74\x69\x74\171\40\x50\x72\x6f\x76\x69\144\x65\162\47\163\x20\x73\x69\x64\x65\40\151\x73\40\x69\x6e\x63\x6f\162\162\145\143\164";
    const Error_issuer_not_verfied = "\x49\x73\x73\x75\145\x72\x20\x63\x61\x6e\156\157\x74\40\142\x65\x20\x76\x65\162\151\x66\151\x65\144\56";
    const Cause_issuer_not_verfied = "\x49\144\x50\40\105\156\164\x69\164\171\x20\111\x44\40\x63\x6f\x6e\146\x69\x67\165\162\145\144\x20\141\x6e\144\40\164\x68\145\40\x6f\x6e\x65\x20\146\157\165\156\x64\x20\151\156\x20\x53\101\x4d\114\40\122\x65\163\x70\x6f\156\x73\145\40\x64\157\40\x6e\x6f\x74\40\155\141\x74\x63\150";
}
class mo_options_enum_nameid_formats extends BasicEnum
{
    const EMAIL = "\165\162\156\72\157\141\163\151\x73\72\156\x61\155\145\163\x3a\164\143\x3a\x53\x41\x4d\114\72\x31\x2e\x31\x3a\156\x61\x6d\x65\151\x64\55\146\x6f\162\x6d\x61\x74\72\145\155\141\151\154\101\x64\144\x72\145\163\x73";
    const UNSPECIFIED = "\x75\x72\x6e\x3a\x6f\x61\x73\x69\163\72\x6e\141\x6d\x65\x73\72\164\x63\x3a\123\x41\x4d\x4c\x3a\x31\56\61\x3a\156\141\155\145\151\x64\x2d\146\157\162\x6d\x61\164\72\165\x6e\163\x70\x65\x63\151\146\151\x65\x64";
    const TRANSIENT = "\165\x72\156\72\157\141\x73\x69\x73\72\156\x61\x6d\x65\163\x3a\164\x63\72\123\101\x4d\114\x3a\x32\x2e\60\x3a\x6e\141\x6d\145\151\x64\x2d\x66\x6f\x72\x6d\141\164\72\x74\162\141\156\x73\151\x65\x6e\x74";
    const PERSISTENT = "\165\162\x6e\x3a\157\141\163\151\x73\72\x6e\x61\155\x65\x73\x3a\164\143\x3a\x53\x41\115\x4c\x3a\x32\56\60\72\156\141\x6d\x65\x69\x64\55\x66\157\162\155\x61\164\72\160\x65\162\163\x69\x73\x74\x65\156\x74";
}
class mo_options_plugin_constants extends BasicEnum
{
    const CMS_Name = "\x57\x50";
    const Application_Name = "\127\120\x20\155\x69\x6e\151\117\x72\141\x6e\147\145\40\x53\x41\115\114\40\62\56\60\x20\x53\x53\x4f\x20\120\x6c\165\147\151\156";
    const Application_type = "\123\101\x4d\114";
    const Version = "\x31\62\x2e\x30\56\x34";
    const HOSTNAME = "\150\164\164\160\163\72\x2f\57\x6c\157\147\x69\156\56\170\145\143\x75\x72\151\x66\171\56\x63\157\x6d";
    const LICENSE_TYPE = "\x57\x50\137\x53\101\x4d\114\x5f\123\120\137\x50\114\125\107\111\116";
    const LICENSE_PLAN_NAME = "\167\160\x5f\163\141\x6d\x6c\x5f\x73\163\157\x5f\142\x61\163\x69\143\x5f\160\x6c\141\156";
    const PLUGIN_CONFIG_FILENAME = "\155\x6f\137\x73\141\x6d\154\137\143\157\x6e\146\x69\x67\56\160\x68\x70";
}
class mo_options_plugin_idp extends BasicEnum
{
    public static $IDP_GUIDES = array("\101\x44\106\x53" => "\141\144\x66\163", "\101\172\x75\162\x65\40\x41\104" => "\x61\x7a\x75\x72\145\55\141\x64", "\101\x7a\165\x72\x65\x20\102\x32\x43" => "\141\x7a\165\162\x65\55\x62\x32\143", "\117\153\164\141" => "\157\153\164\x61", "\x53\x61\154\145\163\x46\x6f\162\143\145" => "\x73\x61\154\145\163\x66\x6f\162\143\x65", "\x47\x6f\157\x67\x6c\x65\x20\x41\x70\x70\163" => "\x67\x6f\x6f\x67\154\x65\55\x61\x70\160\163", "\x4f\156\x65\x4c\x6f\x67\151\x6e" => "\157\156\x65\x6c\157\147\x69\x6e", "\x4b\x65\171\x63\x6c\157\141\153" => "\x6a\x62\x6f\x73\x73\x2d\153\145\171\143\x6c\157\141\153", "\x4d\151\156\x69\x4f\162\141\x6e\x67\145" => "\155\x69\156\151\157\162\x61\x6e\x67\145", "\x50\x69\x6e\147\106\x65\x64\145\x72\141\164\x65" => "\160\x69\156\147\146\145\x64\x65\x72\x61\164\x65", "\x50\151\156\147\117\156\145" => "\160\151\x6e\x67\157\x6e\145", "\103\x65\156\x74\x72\x69\146\x79" => "\x63\x65\x6e\x74\162\151\x66\171", "\x4f\x72\x61\143\154\145" => "\157\162\x61\143\x6c\145\x2d\145\x6e\x74\145\162\160\162\x69\163\145\x2d\x6d\x61\156\141\x67\145\x72", "\x42\x69\164\x69\165\155" => "\142\x69\164\x69\x75\x6d", "\x53\x68\x69\142\142\x6f\154\145\164\x68\x20\x32" => "\163\x68\151\x62\x62\x6f\x6c\x65\164\150\x32", "\123\150\x69\x62\x62\157\154\x65\164\x68\40\63" => "\163\x68\x69\x62\142\x6f\x6c\145\x74\x68\x33", "\x53\x69\155\x70\154\x65\123\x41\x4d\x4c\x70\x68\160" => "\163\151\x6d\160\x6c\145\x73\x61\x6d\x6c", "\x4f\160\145\156\101\x4d" => "\157\x70\145\x6e\x61\x6d", "\101\x75\164\x68\x61\156\x76\151\x6c" => "\x61\165\x74\x68\x61\x6e\x76\151\x6c", "\x41\165\x74\150\x30" => "\x61\165\164\150\x30", "\x43\101\x20\x49\144\x65\156\x74\151\x74\x79" => "\143\x61\x2d\151\144\145\x6e\x74\x69\x74\x79", "\x57\x53\x4f\62" => "\x77\163\x6f\x32", "\x52\x53\101\40\x53\x65\143\165\162\x65\x49\104" => "\162\x73\141\x2d\163\145\143\x75\162\x65\x69\144", "\x4f\164\x68\145\x72" => "\117\164\x68\145\x72");
}
class mo_options_environments extends BasicEnum
{
    const Environment_Objects = "\155\157\137\x73\x61\x6d\x6c\x5f\x65\x6e\166\x69\x72\x6f\156\x6d\145\x6e\x74\x5f\x6f\x62\152\x65\143\x74\163";
    const Selected_Environments = "\155\x6f\x5f\x73\141\x6d\x6c\x5f\163\x65\x6c\x65\143\164\145\x64\137\145\x6e\x76\x69\x72\x6f\x6e\x6d\145\x6e\x74";
    const Environment_Objects_old = "\145\x6e\x76\151\x72\157\156\155\x65\x6e\x74\x5f\157\x62\152\x65\143\164\163";
    const Multiple_Licenses = "\x6d\x6f\137\145\x6e\x61\142\x6c\145\137\155\x75\x6c\x74\x69\160\x6c\145\137\x6c\151\x63\145\x6e\163\145\163";
}
class mo_options_plugin_admin extends BasicEnum
{
    const HOST_NAME = "\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x68\x6f\x73\164\137\x6e\141\x6d\145";
    const New_Registration = "\x6d\157\x5f\163\x61\x6d\x6c\137\x6e\145\167\x5f\x72\145\x67\151\x73\164\x72\x61\x74\x69\x6f\x6e";
    const Admin_Phone = "\155\157\x5f\x73\141\x6d\154\x5f\141\144\x6d\x69\x6e\137\x70\150\157\156\145";
    const Admin_Email = "\x6d\x6f\137\x73\x61\155\154\x5f\141\144\x6d\151\156\x5f\x65\155\141\x69\154";
    const Admin_Pass = "\x6d\157\x5f\163\141\x6d\154\137\141\144\x6d\151\156\137\x70\x61\x73\x73\x77\x6f\162\144";
    const Verify_Customer = "\155\157\x5f\x73\x61\x6d\x6c\x5f\x76\x65\162\151\x66\171\x5f\x63\165\x73\164\x6f\x6d\x65\x72";
    const Admin_Customer_Key = "\155\157\x5f\x73\141\155\x6c\x5f\x61\144\155\x69\x6e\x5f\x63\x75\163\164\x6f\155\x65\x72\137\153\145\171";
    const Admin_Api_Key = "\155\x6f\x5f\x73\x61\155\x6c\137\x61\x64\155\151\x6e\137\141\x70\x69\137\153\x65\x79";
    const Customer_Token = "\155\157\x5f\163\141\x6d\x6c\x5f\x63\165\163\x74\x6f\155\x65\162\137\164\x6f\153\145\x6e";
    const Admin_notices_Message = "\155\157\137\x73\x61\155\154\x5f\155\145\163\163\141\x67\145";
    const Registration_Status = "\155\157\137\163\x61\x6d\154\x5f\162\145\147\x69\x73\x74\162\141\164\151\x6f\x6e\x5f\163\x74\x61\x74\x75\163";
    const IDP_Config_ID = "\163\x61\x6d\x6c\137\x69\144\160\137\x63\157\x6e\146\x69\x67\137\x69\144";
    const IDP_Config_Complete = "\x6d\157\137\x73\x61\x6d\154\x5f\151\144\160\137\143\x6f\156\x66\151\x67\x5f\143\157\x6d\160\x6c\145\164\145";
    const Transaction_ID = "\x6d\157\137\163\141\155\x6c\137\x74\x72\141\x6e\x73\141\x63\164\151\x6f\x6e\x49\144";
    const SML_LK = "\163\x6d\154\137\x6c\x6b";
    const Site_Status = "\164\137\x73\x69\x74\145\x5f\x73\164\141\x74\x75\163";
    const Site_Check = "\x73\x69\164\145\x5f\x63\x6b\137\154";
    const Free_Version = "\155\157\x5f\163\141\x6d\x6c\137\146\162\x65\x65\x5f\x76\145\162\x73\x69\157\x6e";
    const Admin_company = "\155\x6f\x5f\x73\141\155\154\137\x61\144\155\x69\156\137\x63\157\x6d\x70\x61\156\171";
    const Admin_First_Name = "\x6d\x6f\137\163\x61\155\154\137\141\x64\155\151\156\x5f\146\151\162\163\x74\137\x6e\141\x6d\145";
    const Admin_Last_Name = "\155\157\x5f\163\x61\155\154\x5f\141\x64\x6d\151\156\137\154\141\x73\x74\x5f\156\141\155\x65";
    const License_Name = "\x6d\157\x5f\163\x61\x6d\154\x5f\x6c\151\143\x65\156\x73\145\x5f\x6e\141\155\145";
    const User_Limit = "\x6d\x6f\137\163\141\155\x6c\x5f\165\x73\162\x5f\x6c\x6d\164";
}
