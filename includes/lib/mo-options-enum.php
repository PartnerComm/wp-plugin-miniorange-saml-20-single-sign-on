<?php


include "\102\141\163\x69\143\105\156\165\155\x2e\160\150\160";
class mo_options_enum_sso_login extends BasicEnum
{
    const Relay_state = "\x6d\x6f\137\163\x61\x6d\x6c\x5f\162\x65\x6c\141\171\137\163\x74\141\x74\145";
    const Logout_Relay_state = "\x6d\157\x5f\x73\x61\155\x6c\x5f\x6c\157\x67\157\165\x74\x5f\x72\145\154\141\x79\x5f\x73\164\141\164\x65";
    const Redirect_Idp = "\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\162\x65\147\151\163\x74\145\x72\x65\x64\x5f\x6f\156\x6c\171\137\x61\143\143\x65\163\x73";
    const Force_authentication = "\155\157\x5f\163\141\x6d\154\137\x66\157\x72\x63\145\137\141\x75\x74\150\145\156\164\151\143\141\x74\151\x6f\x6e";
    const Enable_access_RSS = "\x6d\x6f\137\x73\x61\155\154\x5f\x65\x6e\141\142\x6c\145\137\162\x73\x73\x5f\141\143\x63\x65\x73\163";
    const Auto_redirect = "\155\x6f\137\163\141\155\154\137\145\x6e\x61\142\x6c\x65\x5f\x6c\157\x67\151\156\x5f\162\145\x64\x69\162\x65\x63\164";
    const Allow_wp_signin = "\x6d\x6f\x5f\x73\x61\155\x6c\137\x61\154\154\x6f\x77\137\x77\160\137\x73\151\x67\156\151\x6e";
    const Backdoor_URL = "\155\x6f\137\163\141\x6d\x6c\x5f\142\141\143\x6b\144\x6f\x6f\x72\x5f\x75\162\154";
    const Custom_login_button = "\x6d\157\x5f\x73\141\x6d\x6c\137\143\165\x73\164\157\x6d\x5f\x6c\157\x67\151\x6e\x5f\164\x65\x78\164";
    const Custom_greeting_text = "\155\x6f\137\x73\141\x6d\154\137\143\165\x73\164\157\155\137\147\x72\145\145\x74\x69\x6e\147\137\x74\x65\170\164";
    const Custom_greeting_name = "\155\157\x5f\x73\141\x6d\154\x5f\x67\x72\145\x65\x74\x69\156\x67\137\156\141\x6d\145";
    const Custom_logout_button = "\155\x6f\x5f\x73\141\x6d\154\x5f\x63\165\163\x74\157\155\x5f\154\x6f\x67\x6f\x75\164\137\x74\145\x78\x74";
    const Redirect_to_WP_login = "\155\157\x5f\x73\x61\155\154\137\x72\145\x64\x69\162\x65\143\164\x5f\x74\x6f\137\x77\160\x5f\x6c\x6f\x67\151\156";
    const Add_SSO_button = "\x6d\x6f\x5f\x73\141\155\x6c\137\x61\144\144\x5f\163\163\157\x5f\142\165\x74\164\157\156\x5f\x77\x70";
    const Use_Button_as_shortcode = "\155\x6f\137\163\141\155\154\x5f\165\163\x65\137\x62\165\x74\164\157\x6e\137\x61\x73\x5f\163\x68\157\x72\x74\143\157\x64\145";
    const Use_Button_as_widget = "\x6d\x6f\137\163\x61\155\154\137\165\x73\x65\137\142\165\164\164\157\x6e\x5f\141\x73\x5f\x77\x69\144\x67\145\x74";
    const SSO_Button_Size = "\x6d\x6f\x5f\163\x61\x6d\x6c\137\x62\x75\164\x74\157\156\x5f\x73\151\x7a\x65";
    const SSO_Button_Width = "\x6d\157\x5f\163\141\x6d\x6c\x5f\142\x75\x74\164\157\x6e\137\167\151\x64\x74\150";
    const SSO_Button_Height = "\155\157\137\163\141\x6d\x6c\x5f\142\x75\164\x74\x6f\156\x5f\150\145\x69\x67\150\x74";
    const SSO_Button_Curve = "\x6d\x6f\137\x73\141\155\x6c\137\142\x75\x74\164\157\x6e\137\x63\x75\162\x76\145";
    const SSO_Button_Color = "\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\142\165\164\164\157\156\x5f\x63\157\154\x6f\162";
    const SSO_Button_Text = "\x6d\157\x5f\x73\x61\155\x6c\x5f\x62\x75\164\164\x6f\156\137\x74\145\170\x74";
    const SSO_Button_font_color = "\155\x6f\137\x73\x61\x6d\154\x5f\146\x6f\x6e\x74\137\143\157\x6c\x6f\x72";
    const SSO_Button_font_size = "\x6d\157\x5f\x73\x61\155\x6c\x5f\146\157\x6e\x74\x5f\163\151\172\x65";
    const SSO_Button_position = "\x73\163\157\137\x62\x75\164\164\x6f\156\x5f\154\x6f\147\x69\x6e\x5f\146\x6f\162\155\137\160\157\163\x69\x74\x69\x6f\x6e";
    const Keep_Configuration_Intact = "\155\157\x5f\x73\x61\x6d\154\137\153\x65\x65\x70\x5f\x73\145\164\164\x69\x6e\x67\163\137\x6f\x6e\137\x64\145\x6c\145\164\x69\x6f\156";
}
class mo_options_enum_identity_provider extends BasicEnum
{
    const Broker_service = "\155\x6f\x5f\x73\x61\x6d\x6c\137\145\156\x61\142\x6c\x65\x5f\x63\154\157\165\x64\137\x62\x72\x6f\153\x65\162";
    const SP_Base_Url = "\155\x6f\x5f\x73\x61\x6d\x6c\x5f\163\160\x5f\142\141\163\145\x5f\165\x72\154";
    const SP_Entity_ID = "\155\157\x5f\163\141\x6d\154\137\x73\x70\x5f\x65\156\164\151\x74\x79\137\x69\x64";
}
class mo_options_enum_service_provider extends BasicEnum
{
    const Identity_name = "\163\x61\x6d\x6c\137\151\x64\145\156\164\x69\164\x79\x5f\156\x61\155\x65";
    const Login_binding_type = "\x73\141\x6d\x6c\137\154\157\x67\151\x6e\137\142\x69\156\144\x69\156\147\137\x74\x79\x70\145";
    const Login_URL = "\163\x61\x6d\x6c\x5f\x6c\x6f\147\151\156\137\x75\162\154";
    const Logout_binding_type = "\x73\141\155\x6c\x5f\154\x6f\147\x6f\165\164\137\142\151\156\144\151\x6e\147\137\164\171\160\x65";
    const Logout_URL = "\163\141\x6d\x6c\137\x6c\157\147\157\165\164\x5f\x75\162\154";
    const Issuer = "\163\141\x6d\x6c\137\x69\163\x73\x75\145\x72";
    const X509_certificate = "\x73\x61\x6d\x6c\137\x78\x35\60\x39\x5f\x63\x65\162\x74\x69\x66\151\x63\x61\x74\x65";
    const Request_signed = "\163\x61\x6d\154\x5f\x72\145\x71\165\145\163\x74\137\163\x69\147\156\x65\144";
    const NameID_Format = "\x73\141\155\x6c\x5f\156\141\x6d\145\151\144\x5f\146\x6f\162\x6d\x61\x74";
    const Guide_name = "\x73\141\x6d\154\x5f\151\144\145\156\x74\151\x74\x79\x5f\x70\162\x6f\x76\x69\x64\145\162\137\x67\x75\151\x64\145\x5f\x6e\141\x6d\145";
    const Is_encoding_enabled = "\155\157\x5f\x73\141\x6d\x6c\x5f\145\156\143\157\x64\151\156\x67\137\x65\156\141\142\154\x65\x64";
}
class mo_options_enum_test_configuration extends BasicEnum
{
    const SAML_REQUEST = "\x6d\157\x5f\163\141\x6d\x6c\137\162\145\161\x75\145\x73\x74";
    const SAML_RESPONSE = "\155\x6f\x5f\163\141\x6d\x6c\137\162\145\x73\x70\x6f\x6e\163\x65";
    const TEST_CONFIG_ERROR_LOG = "\155\x6f\137\163\141\x6d\154\137\164\x65\x73\164";
    const TEST_CONFIG_ATTIBUTES = "\155\157\x5f\163\141\155\x6c\137\x74\x65\163\164\137\x63\x6f\156\146\151\x67\137\141\164\164\162\163";
}
class mo_options_enum_attribute_mapping extends BasicEnum
{
    const Attribute_Username = "\163\141\x6d\154\137\x61\x6d\x5f\x75\163\x65\x72\156\x61\x6d\145";
    const Attribute_Email = "\163\141\x6d\154\137\x61\155\x5f\x65\x6d\x61\x69\x6c";
    const Attribute_First_name = "\163\x61\155\x6c\x5f\x61\x6d\x5f\x66\151\x72\163\164\x5f\x6e\x61\155\145";
    const Attribute_Last_name = "\x73\141\x6d\x6c\x5f\x61\x6d\x5f\x6c\x61\x73\x74\137\156\x61\x6d\x65";
    const Attribute_Group_name = "\163\141\x6d\x6c\137\x61\x6d\x5f\147\x72\157\x75\x70\137\156\x61\155\145";
    const Attribute_Custom_mapping = "\155\x6f\137\x73\141\x6d\x6c\x5f\143\165\x73\164\157\x6d\137\141\164\x74\162\163\137\x6d\x61\x70\x70\x69\x6e\x67";
    const Attribute_Account_matcher = "\163\141\155\x6c\x5f\x61\155\x5f\141\143\143\x6f\x75\x6e\164\x5f\155\x61\164\143\150\x65\162";
    const Attribute_Display_name = "\163\141\155\x6c\137\141\155\x5f\x64\x69\163\160\154\141\x79\137\x6e\x61\x6d\x65";
}
class mo_options_enum_domain_restriction extends BasicEnum
{
    const Email_Domains = "\x73\x61\155\x6c\137\141\x6d\137\x65\155\141\151\154\x5f\144\x6f\155\141\151\156\x73";
    const Enable_Domain_Restriction_Login = "\155\x6f\x5f\x73\141\155\x6c\137\145\x6e\141\142\154\145\x5f\144\x6f\x6d\x61\151\156\137\x72\145\x73\164\x72\x69\143\x74\151\157\x6e\137\154\x6f\147\151\156";
    const Allow_deny_user_with_Domain = "\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\x61\154\154\x6f\167\137\x64\145\156\171\x5f\165\163\x65\162\137\167\151\x74\150\137\x64\157\155\x61\151\156";
}
class mo_options_enum_role_mapping extends BasicEnum
{
    const Role_do_not_auto_create_users = "\155\157\137\x73\141\x6d\154\137\x64\157\x6e\x74\137\143\162\145\x61\x74\x65\137\x75\x73\x65\x72\137\x69\146\x5f\162\x6f\154\145\x5f\156\x6f\164\x5f\155\141\160\160\145\144";
    const Role_do_not_assign_role_unlisted = "\163\141\155\154\x5f\x61\155\137\x64\x6f\156\164\137\x61\154\154\157\167\137\165\156\x6c\151\x73\x74\x65\144\x5f\165\163\145\162\137\x72\157\154\145";
    const Role_do_not_update_existing_user = "\x73\141\155\x6c\x5f\141\x6d\137\144\x6f\156\164\x5f\x75\x70\x64\141\164\x65\137\x65\x78\x69\x73\164\151\x6e\147\137\x75\x73\145\162\137\x72\157\x6c\x65";
    const Role_default_role = "\x73\x61\155\x6c\137\x61\155\x5f\x64\145\146\x61\x75\x6c\x74\137\165\163\x65\x72\137\x72\x6f\x6c\145";
    const Role_do_not_login_with_roles = "\x73\x61\155\x6c\137\x61\155\x5f\x64\157\x6e\164\x5f\x61\x6c\154\157\x77\137\165\163\x65\162\137\x74\157\154\157\147\151\x6e\x5f\143\x72\x65\141\x74\x65\137\x77\151\x74\x68\137\147\x69\x76\145\x6e\x5f\x67\162\157\165\160\163";
    const Role_restrict_users_with_groups = "\x6d\x6f\137\163\141\x6d\154\x5f\x72\145\163\x74\162\151\x63\164\137\165\x73\x65\x72\163\137\x77\151\164\150\x5f\x67\x72\x6f\x75\x70\163";
    const Role_mapping = "\163\x61\155\154\137\x61\x6d\x5f\162\157\x6c\145\x5f\155\x61\x70\x70\151\156\147";
}
class mo_options_enum_custom_certificate extends BasicEnum
{
    const Custom_Public_Certificate = "\x6d\157\x5f\x73\141\155\154\x5f\x63\165\x73\164\157\155\x5f\x63\145\x72\164";
    const Custom_Private_Certificate = "\x6d\157\137\163\x61\155\154\137\143\x75\x73\x74\157\155\137\x63\x65\x72\164\137\x70\x72\151\x76\141\x74\145\x5f\153\145\171";
}
class mo_options_enum_custom_messages extends BasicEnum
{
    const Custom_Account_Creation_Disabled_message = "\155\x6f\137\x73\141\x6d\x6c\137\x61\143\x63\157\x75\156\164\x5f\x63\162\145\141\164\151\x6f\x6e\137\x64\x69\163\141\142\154\145\x64\137\155\163\x67";
    const Custom_Restricted_Domain_message = "\155\x6f\x5f\163\x61\x6d\x6c\137\162\x65\163\x74\162\151\x63\164\x65\144\137\144\x6f\155\x61\x69\x6e\137\x65\x72\x72\x6f\162\x5f\x6d\x73\x67";
}
class mo_options_error_constants extends BasicEnum
{
    const Error_no_certificate = "\125\x6e\141\142\154\x65\x20\x74\157\x20\146\x69\x6e\x64\40\x61\x20\143\x65\162\164\x69\146\x69\143\x61\x74\145\40\56";
    const Cause_no_certificate = "\116\x6f\x20\x73\151\147\x6e\x61\164\165\x72\145\40\146\157\x75\156\144\40\151\x6e\40\x53\101\x4d\114\40\122\145\163\160\x6f\x6e\x73\x65\x20\157\162\40\101\x73\x73\145\162\164\x69\157\x6e\x2e\40\120\x6c\145\x61\x73\145\40\163\151\x67\156\x20\x61\164\x20\154\x65\141\x73\164\40\x6f\x6e\x65\40\157\146\x20\164\x68\145\155\56";
    const Error_wrong_certificate = "\x55\x6e\x61\142\154\x65\x20\x74\x6f\40\x66\151\156\x64\40\x61\x20\x63\x65\x72\164\x69\x66\151\x63\141\x74\x65\x20\155\x61\x74\143\x68\151\156\147\x20\164\150\x65\40\x63\157\x6e\x66\151\147\x75\162\x65\144\40\x66\151\156\147\x65\162\160\162\151\156\164\x2e";
    const Cause_wrong_certificate = "\130\56\65\x30\x39\x20\103\145\162\164\151\146\151\x63\141\164\145\40\146\151\145\x6c\x64\40\x69\x6e\x20\160\x6c\x75\147\151\156\40\144\157\145\x73\40\x6e\x6f\x74\x20\155\x61\164\143\x68\40\164\150\x65\40\143\145\x72\164\x69\146\151\x63\141\164\145\40\146\x6f\x75\x6e\x64\x20\x69\156\40\123\101\115\114\x20\122\145\163\160\157\156\163\145\x2e";
    const Error_invalid_audience = "\x49\x6e\x76\x61\154\151\x64\x20\x41\x75\144\151\145\156\x63\x65\x20\x55\x52\111\x2e";
    const Cause_invalid_audience = "\x54\x68\x65\40\166\x61\154\165\145\40\x6f\146\x20\x27\x41\165\144\x69\x65\156\143\145\x20\x55\x52\x49\x27\40\146\x69\x65\154\x64\x20\157\156\x20\x49\144\x65\x6e\x74\151\164\x79\x20\x50\x72\x6f\166\151\x64\145\x72\47\163\40\163\x69\144\145\x20\x69\x73\40\x69\x6e\x63\157\162\162\x65\143\164";
    const Error_issuer_not_verfied = "\111\x73\163\165\x65\x72\40\143\141\x6e\x6e\x6f\x74\40\x62\x65\40\x76\145\x72\x69\x66\x69\x65\144\56";
    const Cause_issuer_not_verfied = "\111\144\120\40\x45\156\x74\151\x74\171\x20\111\104\40\x63\157\x6e\x66\x69\x67\165\162\x65\144\x20\141\156\144\x20\x74\150\x65\x20\x6f\x6e\x65\40\x66\157\165\x6e\144\40\x69\x6e\x20\x53\101\x4d\114\40\122\145\x73\160\x6f\x6e\x73\x65\40\144\157\x20\156\x6f\x74\40\x6d\x61\x74\143\150";
}
class mo_options_enum_nameid_formats extends BasicEnum
{
    const EMAIL = "\x75\162\156\72\x6f\x61\x73\x69\x73\x3a\156\x61\x6d\x65\163\x3a\164\x63\72\123\101\x4d\114\x3a\x31\x2e\61\x3a\x6e\141\155\145\x69\144\x2d\146\x6f\162\x6d\x61\x74\x3a\145\x6d\141\x69\154\101\x64\x64\162\x65\x73\x73";
    const UNSPECIFIED = "\x75\x72\x6e\72\157\x61\x73\151\163\x3a\156\141\x6d\145\163\72\164\x63\72\x53\x41\x4d\114\x3a\x31\x2e\61\x3a\x6e\x61\x6d\x65\x69\x64\x2d\x66\157\x72\x6d\x61\164\x3a\165\156\163\x70\145\143\x69\x66\151\145\x64";
    const TRANSIENT = "\165\x72\x6e\x3a\x6f\x61\x73\151\x73\x3a\x6e\141\x6d\145\x73\x3a\x74\143\72\x53\101\x4d\x4c\72\62\x2e\x30\72\x6e\x61\155\145\x69\144\x2d\x66\x6f\x72\x6d\x61\x74\x3a\x74\162\141\156\x73\x69\x65\x6e\164";
    const PERSISTENT = "\x75\162\x6e\x3a\x6f\x61\163\151\x73\72\x6e\x61\x6d\145\163\72\x74\143\x3a\x53\x41\115\114\72\62\56\60\72\156\141\155\x65\151\144\55\x66\157\x72\155\141\164\x3a\160\145\162\x73\x69\x73\x74\145\156\x74";
}
class mo_options_plugin_constants extends BasicEnum
{
    const CMS_Name = "\x57\120";
    const Application_Name = "\127\120\40\155\x69\156\x69\x4f\x72\x61\156\x67\145\40\x53\x41\115\114\40\x32\x2e\x30\40\x53\x53\117\x20\120\154\165\x67\x69\x6e";
    const Application_type = "\123\101\x4d\114";
    const Version = "\61\x32\56\x30\56\61";
    const HOSTNAME = "\150\164\164\x70\x73\x3a\57\57\154\157\x67\x69\156\56\x78\145\x63\165\162\151\x66\x79\56\143\157\155";
    const LICENSE_TYPE = "\127\x50\137\123\x41\115\114\x5f\123\x50\137\120\x4c\125\x47\x49\116";
    const LICENSE_PLAN_NAME = "\167\160\137\x73\x61\x6d\x6c\137\x73\163\x6f\x5f\x62\x61\163\151\143\x5f\160\x6c\x61\156";
    const PLUGIN_CONFIG_FILENAME = "\x6d\x6f\137\x73\141\155\x6c\x5f\x63\x6f\x6e\x66\x69\x67\x2e\160\150\x70";
}
class mo_options_plugin_idp extends BasicEnum
{
    public static $IDP_GUIDES = array("\101\104\106\x53" => "\x61\144\x66\x73", "\117\153\x74\x61" => "\157\x6b\x74\141", "\123\141\154\x65\163\x46\x6f\x72\143\145" => "\x73\141\x6c\145\163\x66\x6f\x72\x63\x65", "\107\157\157\147\x6c\x65\40\101\160\x70\x73" => "\x67\157\x6f\x67\x6c\145\x2d\141\x70\x70\163", "\101\x7a\x75\x72\x65\40\101\x44" => "\141\172\x75\x72\x65\x2d\x61\144", "\117\x6e\x65\x4c\x6f\147\x69\156" => "\x6f\x6e\x65\x6c\157\x67\151\156", "\x4b\145\x79\143\x6c\x6f\141\153" => "\152\x62\x6f\x73\x73\55\x6b\145\171\x63\x6c\157\x61\x6b", "\115\151\156\151\x4f\x72\x61\x6e\x67\x65" => "\x6d\151\156\x69\x6f\x72\141\156\x67\145", "\x50\151\156\147\106\145\144\x65\x72\x61\164\x65" => "\160\x69\x6e\x67\x66\145\144\145\162\x61\x74\x65", "\x50\151\x6e\x67\x4f\x6e\145" => "\160\x69\156\x67\x6f\156\145", "\x43\x65\x6e\164\162\x69\146\x79" => "\143\145\x6e\164\162\x69\146\171", "\x4f\x72\141\x63\x6c\x65" => "\157\162\x61\143\x6c\145\x2d\x65\156\164\145\162\160\x72\x69\163\x65\x2d\x6d\x61\156\141\147\145\162", "\102\151\x74\151\165\x6d" => "\142\x69\x74\151\x75\155", "\x53\150\151\x62\x62\157\154\x65\164\x68\40\x32" => "\x73\150\x69\x62\x62\157\x6c\145\164\150\62", "\x53\150\x69\142\142\x6f\x6c\x65\164\x68\x20\x33" => "\163\x68\x69\142\x62\157\154\x65\x74\150\63", "\x53\x69\x6d\160\x6c\145\123\x41\x4d\x4c\x70\150\x70" => "\163\151\155\160\x6c\145\163\x61\x6d\x6c", "\117\160\x65\156\x41\x4d" => "\x6f\160\145\156\141\155", "\x41\165\164\x68\x61\156\166\x69\x6c" => "\141\165\164\150\141\x6e\x76\x69\x6c", "\101\x75\x74\x68\60" => "\x61\x75\164\x68\60", "\x43\101\x20\111\x64\145\156\x74\151\164\171" => "\x63\141\x2d\151\144\x65\x6e\x74\151\x74\x79", "\127\123\x4f\x32" => "\x77\163\157\62", "\x52\123\101\40\123\145\x63\165\162\x65\111\104" => "\162\x73\141\55\x73\x65\x63\165\162\145\x69\x64", "\x4f\x74\x68\145\x72" => "\x4f\164\x68\x65\162");
}
class mo_options_plugin_admin extends BasicEnum
{
    const HOST_NAME = "\155\157\x5f\163\141\x6d\154\137\x68\157\x73\x74\137\156\x61\155\145";
    const New_Registration = "\x6d\x6f\137\x73\x61\155\x6c\137\156\x65\167\137\162\x65\147\x69\163\164\x72\x61\164\151\x6f\156";
    const Admin_Phone = "\155\157\137\163\141\x6d\x6c\x5f\141\x64\155\x69\x6e\x5f\x70\x68\157\156\x65";
    const Admin_Email = "\x6d\x6f\137\163\141\x6d\154\x5f\141\144\x6d\x69\x6e\137\x65\x6d\x61\151\x6c";
    const Admin_Pass = "\155\157\x5f\x73\141\x6d\x6c\137\141\144\x6d\151\x6e\x5f\160\141\x73\163\x77\157\162\144";
    const Verify_Customer = "\x6d\157\x5f\x73\x61\155\154\137\x76\x65\162\x69\146\171\x5f\x63\x75\163\x74\x6f\155\145\162";
    const Admin_Customer_Key = "\155\157\137\163\x61\x6d\x6c\137\141\144\155\151\156\137\x63\165\x73\164\x6f\x6d\x65\x72\137\x6b\x65\171";
    const Admin_Api_Key = "\155\x6f\137\x73\141\x6d\154\137\x61\144\155\x69\x6e\x5f\141\160\x69\137\x6b\x65\x79";
    const Customer_Token = "\x6d\x6f\x5f\163\x61\155\154\x5f\143\165\x73\164\157\x6d\145\162\x5f\164\157\x6b\x65\x6e";
    const Admin_notices_Message = "\x6d\x6f\137\163\x61\155\x6c\x5f\155\145\x73\x73\141\147\145";
    const Registration_Status = "\155\x6f\137\163\141\155\154\x5f\x72\x65\x67\151\163\164\x72\x61\164\x69\157\x6e\137\x73\x74\141\x74\x75\163";
    const IDP_Config_ID = "\x73\x61\155\154\x5f\x69\144\x70\137\143\157\x6e\146\x69\147\x5f\x69\x64";
    const IDP_Config_Complete = "\x6d\157\x5f\163\141\x6d\154\x5f\x69\144\160\137\143\157\x6e\146\151\x67\x5f\x63\157\x6d\160\x6c\x65\164\x65";
    const Transaction_ID = "\155\157\x5f\x73\141\155\154\x5f\x74\162\141\x6e\x73\x61\x63\x74\x69\157\156\111\144";
    const SML_LK = "\x73\x6d\x6c\137\154\153";
    const Site_Status = "\x74\137\x73\151\164\x65\x5f\x73\164\141\x74\165\163";
    const Site_Check = "\163\151\x74\x65\x5f\143\153\137\154";
    const Free_Version = "\x6d\x6f\x5f\163\141\x6d\154\x5f\146\162\x65\145\x5f\166\145\162\163\151\157\x6e";
    const Admin_company = "\155\x6f\137\x73\x61\x6d\x6c\137\x61\144\x6d\x69\156\137\x63\x6f\x6d\x70\x61\x6e\171";
    const Admin_First_Name = "\x6d\157\x5f\x73\x61\155\154\137\x61\x64\155\151\156\137\x66\x69\162\163\164\x5f\x6e\x61\155\x65";
    const Admin_Last_Name = "\x6d\157\137\163\x61\155\154\137\141\144\x6d\151\156\137\x6c\x61\163\x74\137\x6e\141\x6d\145";
    const License_Name = "\x6d\x6f\137\x73\x61\x6d\154\137\154\x69\x63\145\156\x73\145\137\156\x61\x6d\x65";
    const User_Limit = "\155\x6f\137\x73\141\x6d\154\137\x75\163\x72\x5f\x6c\155\x74";
}
