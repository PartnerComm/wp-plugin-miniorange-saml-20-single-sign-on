<?php


include "\x42\141\163\151\x63\x45\x6e\165\155\x2e\160\150\x70";
class mo_options_enum_sso_login extends BasicEnum
{
    const Relay_state = "\x6d\x6f\x5f\x73\141\x6d\154\x5f\x72\145\154\141\171\137\x73\x74\x61\164\x65";
    const Logout_Relay_state = "\x6d\157\137\x73\141\x6d\x6c\x5f\x6c\x6f\147\x6f\165\164\137\x72\145\154\x61\x79\137\163\x74\141\164\145";
    const Redirect_Idp = "\x6d\157\137\163\x61\155\x6c\137\x72\145\147\x69\x73\x74\x65\x72\x65\144\137\157\x6e\x6c\171\x5f\x61\x63\x63\x65\x73\163";
    const Force_authentication = "\155\x6f\x5f\163\x61\x6d\154\137\x66\157\162\x63\x65\x5f\141\165\x74\150\145\x6e\164\151\143\141\164\151\157\x6e";
    const Enable_access_RSS = "\155\157\x5f\163\141\155\154\137\145\x6e\141\142\154\x65\x5f\x72\163\163\137\141\143\x63\145\163\x73";
    const Auto_redirect = "\155\x6f\x5f\163\x61\x6d\x6c\x5f\x65\x6e\x61\x62\154\x65\137\154\157\147\x69\156\137\162\x65\x64\151\162\x65\x63\164";
    const Allow_wp_signin = "\x6d\157\x5f\163\x61\x6d\154\137\x61\154\x6c\x6f\167\137\x77\x70\x5f\x73\x69\147\x6e\x69\x6e";
    const Backdoor_URL = "\155\x6f\137\x73\141\x6d\154\137\142\141\143\153\x64\x6f\x6f\x72\x5f\x75\162\154";
    const Custom_login_button = "\x6d\157\137\x73\141\155\154\137\x63\165\163\164\x6f\155\x5f\154\x6f\x67\x69\156\137\164\145\170\164";
    const Custom_greeting_text = "\155\x6f\x5f\x73\x61\x6d\x6c\137\143\165\x73\164\157\155\x5f\147\162\145\145\164\151\156\147\137\164\x65\x78\x74";
    const Custom_greeting_name = "\x6d\x6f\137\x73\141\x6d\154\137\147\162\x65\x65\x74\x69\156\x67\137\156\x61\155\145";
    const Custom_logout_button = "\x6d\157\137\163\141\155\154\x5f\x63\x75\x73\x74\157\x6d\x5f\x6c\x6f\x67\157\x75\164\137\164\x65\x78\x74";
    const Redirect_to_WP_login = "\155\157\137\x73\141\155\154\137\162\x65\x64\x69\x72\145\x63\164\x5f\164\157\137\167\x70\137\x6c\157\x67\x69\156";
    const Add_SSO_button = "\155\x6f\137\163\141\x6d\x6c\137\141\x64\144\x5f\x73\x73\x6f\x5f\x62\165\164\x74\x6f\x6e\137\167\x70";
    const Use_Button_as_shortcode = "\x6d\157\137\x73\x61\x6d\x6c\x5f\165\163\x65\x5f\142\x75\x74\x74\157\156\137\141\x73\x5f\163\x68\x6f\x72\164\x63\157\144\x65";
    const Use_Button_as_widget = "\155\157\137\x73\x61\x6d\154\x5f\165\x73\145\137\142\165\x74\164\x6f\156\137\141\163\x5f\x77\x69\144\x67\x65\164";
    const SSO_Button_Size = "\x6d\x6f\x5f\x73\141\155\154\137\142\x75\164\x74\x6f\156\x5f\x73\151\172\x65";
    const SSO_Button_Width = "\x6d\x6f\x5f\163\x61\155\x6c\137\x62\x75\164\x74\157\x6e\137\167\x69\x64\164\150";
    const SSO_Button_Height = "\155\157\x5f\163\141\155\x6c\137\x62\x75\x74\164\x6f\x6e\137\150\x65\x69\x67\x68\164";
    const SSO_Button_Curve = "\x6d\157\x5f\x73\141\155\154\x5f\142\165\164\x74\157\156\x5f\143\x75\162\166\145";
    const SSO_Button_Color = "\x6d\157\x5f\x73\x61\x6d\154\137\142\x75\x74\164\x6f\156\137\143\x6f\154\x6f\x72";
    const SSO_Button_Text = "\155\x6f\137\163\141\155\x6c\137\142\165\164\x74\157\x6e\x5f\164\x65\x78\x74";
    const SSO_Button_font_color = "\x6d\x6f\137\163\x61\x6d\x6c\x5f\x66\x6f\x6e\164\x5f\x63\x6f\x6c\157\x72";
    const SSO_Button_font_size = "\x6d\157\137\163\x61\155\x6c\137\146\x6f\x6e\164\x5f\x73\151\x7a\145";
    const SSO_Button_position = "\163\x73\x6f\137\x62\165\164\x74\157\156\137\x6c\x6f\x67\151\x6e\x5f\x66\157\162\155\137\160\x6f\x73\151\164\x69\157\x6e";
    const Keep_Configuration_Intact = "\155\x6f\x5f\163\x61\155\154\x5f\153\x65\145\x70\137\x73\145\164\164\x69\x6e\x67\163\x5f\157\x6e\x5f\x64\x65\154\145\164\151\157\156";
}
class mo_options_enum_identity_provider extends BasicEnum
{
    const Broker_service = "\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x65\x6e\141\142\154\x65\x5f\x63\x6c\157\165\x64\x5f\x62\x72\x6f\153\145\162";
    const SP_Base_Url = "\155\x6f\137\x73\141\155\154\137\163\160\137\x62\141\x73\x65\137\x75\162\154";
    const SP_Entity_ID = "\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\x73\x70\x5f\145\x6e\164\x69\x74\x79\137\151\144";
}
class mo_options_enum_service_provider extends BasicEnum
{
    const Identity_name = "\x73\141\155\154\137\151\x64\145\156\164\x69\x74\171\x5f\156\x61\x6d\145";
    const Login_binding_type = "\x73\141\x6d\154\x5f\154\157\147\x69\x6e\137\x62\x69\x6e\144\x69\x6e\x67\137\164\171\160\145";
    const Login_URL = "\x73\x61\x6d\x6c\137\154\157\x67\x69\156\137\165\162\x6c";
    const Logout_binding_type = "\163\141\155\154\x5f\x6c\x6f\x67\x6f\165\164\x5f\x62\x69\x6e\144\151\156\x67\x5f\x74\x79\x70\145";
    const Logout_URL = "\x73\141\155\154\x5f\154\157\x67\x6f\165\x74\x5f\x75\162\x6c";
    const Issuer = "\163\141\x6d\154\137\151\x73\x73\165\145\x72";
    const X509_certificate = "\163\x61\155\x6c\x5f\x78\65\60\x39\x5f\x63\145\x72\164\x69\146\151\x63\x61\x74\145";
    const Request_signed = "\x73\x61\x6d\x6c\x5f\x72\x65\x71\165\x65\163\164\137\163\x69\147\x6e\145\x64";
    const NameID_Format = "\x73\x61\155\154\137\156\141\155\x65\x69\x64\137\146\x6f\x72\x6d\141\x74";
    const Guide_name = "\x73\141\155\x6c\x5f\x69\144\x65\156\164\x69\164\171\137\160\x72\x6f\x76\151\144\x65\x72\137\x67\165\x69\144\145\137\156\x61\x6d\x65";
    const Is_encoding_enabled = "\x6d\x6f\x5f\163\x61\x6d\154\137\145\x6e\143\157\x64\x69\x6e\x67\x5f\145\x6e\x61\142\154\145\x64";
}
class mo_options_enum_test_configuration extends BasicEnum
{
    const SAML_REQUEST = "\x6d\x6f\x5f\x73\x61\155\154\137\x72\145\x71\x75\145\x73\x74";
    const SAML_RESPONSE = "\x6d\157\x5f\163\x61\155\x6c\137\162\x65\163\x70\x6f\156\163\145";
    const TEST_CONFIG_ERROR_LOG = "\155\x6f\x5f\x73\141\x6d\x6c\137\164\145\163\x74";
    const TEST_CONFIG_ATTIBUTES = "\x6d\157\x5f\163\x61\x6d\154\137\x74\x65\x73\164\137\143\157\156\146\151\x67\137\141\x74\x74\162\163";
}
class mo_options_enum_attribute_mapping extends BasicEnum
{
    const Attribute_Username = "\x73\141\155\x6c\137\141\x6d\x5f\x75\x73\145\x72\156\x61\155\x65";
    const Attribute_Email = "\163\141\x6d\x6c\137\141\x6d\137\x65\x6d\141\x69\154";
    const Attribute_First_name = "\x73\x61\x6d\x6c\x5f\141\x6d\x5f\x66\x69\162\163\164\137\156\x61\x6d\145";
    const Attribute_Last_name = "\163\x61\155\x6c\137\x61\155\137\x6c\x61\x73\x74\x5f\x6e\x61\x6d\145";
    const Attribute_Group_name = "\163\x61\x6d\x6c\137\x61\x6d\x5f\x67\162\157\165\160\137\156\x61\x6d\x65";
    const Attribute_Custom_mapping = "\155\x6f\137\x73\141\155\x6c\137\143\165\x73\164\x6f\x6d\x5f\x61\x74\164\162\x73\x5f\155\141\x70\160\x69\156\147";
    const Attribute_Account_matcher = "\163\x61\x6d\x6c\x5f\x61\x6d\x5f\x61\x63\143\157\x75\156\x74\137\x6d\141\164\143\x68\x65\x72";
    const Attribute_Display_name = "\x73\x61\x6d\154\137\141\155\137\144\151\163\x70\x6c\141\171\x5f\x6e\141\155\145";
}
class mo_options_enum_domain_restriction extends BasicEnum
{
    const Email_Domains = "\x73\141\155\x6c\137\x61\155\137\145\x6d\x61\151\x6c\137\144\157\155\x61\x69\156\x73";
    const Enable_Domain_Restriction_Login = "\155\x6f\137\x73\141\155\154\x5f\145\156\x61\x62\154\145\x5f\144\157\155\x61\151\x6e\137\162\145\x73\164\x72\151\143\x74\151\x6f\x6e\x5f\154\157\x67\151\x6e";
    const Allow_deny_user_with_Domain = "\x6d\x6f\x5f\163\x61\155\154\137\x61\154\x6c\x6f\167\137\144\x65\x6e\171\x5f\165\x73\145\x72\137\x77\x69\164\x68\137\144\x6f\155\141\x69\156";
}
class mo_options_enum_role_mapping extends BasicEnum
{
    const Role_do_not_auto_create_users = "\x6d\157\137\x73\141\x6d\154\x5f\144\x6f\156\164\137\143\162\x65\141\164\x65\x5f\x75\x73\x65\162\137\151\x66\137\x72\x6f\154\145\x5f\x6e\x6f\x74\137\155\141\160\x70\x65\x64";
    const Role_do_not_assign_role_unlisted = "\163\x61\155\x6c\137\x61\155\137\x64\157\156\164\137\141\154\x6c\157\x77\137\165\156\x6c\151\163\x74\145\x64\137\165\163\145\x72\137\x72\x6f\x6c\x65";
    const Role_do_not_update_existing_user = "\x73\x61\x6d\154\x5f\141\x6d\x5f\144\x6f\x6e\164\x5f\x75\160\144\141\x74\x65\137\x65\x78\151\x73\164\151\156\x67\137\x75\163\145\162\137\162\157\154\145";
    const Role_default_role = "\x73\x61\155\x6c\137\x61\155\x5f\x64\x65\x66\x61\x75\154\164\137\x75\163\145\x72\137\162\x6f\154\x65";
    const Role_do_not_login_with_roles = "\163\141\155\154\x5f\x61\x6d\x5f\144\x6f\156\x74\137\141\154\x6c\x6f\167\x5f\165\x73\145\162\137\164\157\x6c\157\x67\151\x6e\137\143\x72\x65\141\164\145\x5f\167\x69\164\x68\137\x67\x69\x76\145\x6e\x5f\147\162\x6f\x75\x70\x73";
    const Role_restrict_users_with_groups = "\155\157\137\163\x61\x6d\x6c\x5f\162\145\x73\x74\162\x69\x63\x74\x5f\x75\163\145\162\163\137\x77\x69\x74\x68\137\x67\162\x6f\165\x70\163";
    const Role_mapping = "\163\141\155\154\x5f\x61\x6d\x5f\162\157\154\145\x5f\155\141\160\x70\151\156\147";
}
class mo_options_enum_custom_certificate extends BasicEnum
{
    const Custom_Public_Certificate = "\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x63\x75\x73\x74\157\x6d\x5f\143\145\x72\164";
    const Custom_Private_Certificate = "\155\157\x5f\163\141\155\154\137\x63\165\163\164\x6f\x6d\137\x63\145\162\x74\137\160\x72\151\166\141\164\x65\137\x6b\145\x79";
    const Enable_Public_certificate = "\155\x6f\137\x73\141\155\x6c\x5f\145\x6e\x61\142\154\145\137\x63\165\163\x74\x6f\x6d\137\143\145\x72\x74\151\146\x69\x63\x61\164\145";
}
class mo_options_enum_custom_messages extends BasicEnum
{
    const Custom_Account_Creation_Disabled_message = "\155\x6f\137\x73\141\x6d\154\137\x61\x63\x63\x6f\x75\156\x74\x5f\x63\x72\145\141\x74\151\157\156\x5f\144\151\x73\x61\x62\154\x65\144\x5f\155\163\x67";
    const Custom_Restricted_Domain_message = "\x6d\x6f\137\163\141\155\x6c\x5f\x72\x65\163\x74\x72\151\x63\164\x65\x64\137\x64\x6f\x6d\141\151\156\x5f\145\162\x72\157\x72\x5f\x6d\x73\147";
}
class mo_options_error_constants extends BasicEnum
{
    const Error_no_certificate = "\x55\x6e\141\x62\154\x65\x20\x74\x6f\40\x66\x69\156\144\x20\x61\40\143\145\162\164\151\146\x69\143\141\164\145\40\56";
    const Cause_no_certificate = "\116\x6f\40\x73\x69\x67\x6e\x61\164\165\162\x65\x20\146\x6f\x75\156\144\x20\x69\156\40\x53\101\115\114\40\122\145\x73\x70\157\x6e\x73\145\x20\157\x72\x20\101\163\163\145\162\x74\x69\x6f\x6e\x2e\x20\120\x6c\x65\141\163\145\40\x73\151\147\156\40\x61\164\40\x6c\145\141\163\x74\x20\157\x6e\145\x20\x6f\146\x20\164\150\145\155\56";
    const Error_wrong_certificate = "\125\156\141\x62\154\x65\40\164\x6f\40\146\151\156\144\x20\x61\40\x63\145\162\164\x69\x66\x69\143\141\164\x65\x20\x6d\x61\164\x63\x68\151\x6e\x67\40\164\x68\145\40\x63\157\156\x66\x69\x67\165\162\x65\144\x20\146\x69\x6e\x67\145\x72\160\x72\x69\x6e\164\x2e";
    const Cause_wrong_certificate = "\130\56\65\x30\x39\x20\103\145\x72\164\151\146\151\143\141\x74\145\x20\146\151\145\x6c\x64\40\151\x6e\x20\x70\154\x75\147\x69\156\x20\144\x6f\x65\163\40\156\x6f\x74\x20\x6d\141\164\143\150\40\x74\x68\145\x20\x63\x65\162\x74\151\x66\x69\x63\141\x74\x65\40\146\157\165\x6e\144\40\x69\156\40\x53\101\115\x4c\40\122\145\163\160\x6f\156\163\145\x2e";
    const Error_invalid_audience = "\x49\x6e\166\141\x6c\151\x64\40\x41\x75\x64\151\145\x6e\x63\x65\x20\125\122\111\x2e";
    const Cause_invalid_audience = "\124\x68\x65\40\166\x61\154\165\x65\x20\x6f\146\x20\x27\x41\165\144\151\x65\x6e\143\x65\x20\x55\122\111\x27\x20\x66\151\x65\154\144\x20\157\156\40\111\x64\x65\156\164\151\x74\x79\x20\x50\162\x6f\x76\x69\144\145\x72\x27\x73\x20\163\151\144\x65\x20\x69\x73\x20\151\x6e\143\x6f\x72\162\x65\x63\164";
    const Error_issuer_not_verfied = "\x49\163\x73\165\x65\x72\40\x63\141\x6e\x6e\x6f\164\x20\x62\x65\x20\166\145\x72\151\146\x69\x65\x64\56";
    const Cause_issuer_not_verfied = "\111\144\x50\40\105\156\164\x69\164\x79\x20\111\x44\40\x63\x6f\x6e\146\151\x67\165\162\145\x64\x20\x61\x6e\x64\40\164\x68\x65\x20\x6f\x6e\145\40\146\x6f\x75\x6e\144\x20\151\156\40\123\x41\115\x4c\x20\122\x65\x73\x70\x6f\x6e\x73\145\x20\x64\x6f\40\156\x6f\x74\40\155\141\x74\143\x68";
}
class mo_options_enum_nameid_formats extends BasicEnum
{
    const EMAIL = "\x75\x72\x6e\72\157\x61\x73\x69\163\x3a\156\141\155\145\163\72\x74\143\x3a\123\x41\115\x4c\72\x31\56\x31\x3a\156\x61\155\145\151\x64\x2d\x66\157\162\155\x61\164\72\x65\x6d\141\x69\x6c\x41\x64\144\162\145\x73\163";
    const UNSPECIFIED = "\165\162\156\72\x6f\x61\163\151\163\72\156\141\x6d\145\x73\72\164\x63\72\123\x41\115\114\x3a\61\56\x31\72\156\141\x6d\145\x69\144\55\x66\x6f\162\x6d\x61\x74\72\165\x6e\163\x70\x65\143\151\x66\151\x65\x64";
    const TRANSIENT = "\165\162\156\72\157\141\163\151\163\72\156\x61\x6d\145\x73\x3a\x74\143\72\123\101\x4d\x4c\72\62\56\60\72\x6e\x61\x6d\x65\x69\x64\x2d\146\x6f\162\155\x61\x74\72\164\x72\141\156\x73\151\x65\x6e\x74";
    const PERSISTENT = "\165\162\x6e\x3a\x6f\141\163\151\163\x3a\156\141\155\145\x73\x3a\164\143\72\123\x41\x4d\x4c\72\62\x2e\60\72\x6e\141\155\x65\x69\x64\x2d\x66\157\x72\x6d\x61\164\72\160\145\162\x73\x69\163\164\x65\x6e\164";
}
class mo_options_plugin_constants extends BasicEnum
{
    const CMS_Name = "\127\x50";
    const Application_Name = "\127\x50\x20\155\x69\156\x69\117\x72\141\x6e\147\145\x20\x53\x41\115\114\x20\x32\56\x30\40\x53\123\x4f\x20\120\154\165\147\x69\156";
    const Application_type = "\x53\x41\x4d\x4c";
    const Version = "\61\62\56\x30\x2e\62";
    const HOSTNAME = "\x68\164\x74\160\163\x3a\57\x2f\154\157\x67\151\156\56\x78\x65\143\165\x72\151\x66\x79\x2e\143\157\155";
    const LICENSE_TYPE = "\127\x50\137\x53\101\x4d\x4c\x5f\123\120\137\120\114\x55\107\x49\x4e";
    const LICENSE_PLAN_NAME = "\167\160\x5f\163\x61\155\x6c\137\x73\163\x6f\137\x62\x61\163\x69\x63\x5f\160\x6c\141\x6e";
    const PLUGIN_CONFIG_FILENAME = "\155\x6f\137\163\x61\155\x6c\137\x63\x6f\x6e\146\151\147\56\x70\x68\x70";
}
class mo_options_plugin_idp extends BasicEnum
{
    public static $IDP_GUIDES = array("\x41\104\106\123" => "\141\x64\146\x73", "\x4f\153\x74\x61" => "\157\153\164\x61", "\123\141\154\x65\x73\x46\157\x72\x63\x65" => "\163\x61\x6c\145\163\x66\x6f\x72\x63\x65", "\x47\157\157\x67\x6c\x65\40\x41\x70\160\x73" => "\x67\157\x6f\147\154\145\x2d\141\x70\160\x73", "\x41\x7a\165\162\145\x20\x41\104" => "\x61\x7a\165\x72\145\x2d\141\x64", "\x4f\x6e\x65\x4c\x6f\147\151\156" => "\157\x6e\145\154\x6f\147\x69\156", "\113\x65\171\143\154\x6f\x61\153" => "\x6a\142\x6f\x73\163\x2d\153\145\x79\x63\x6c\157\x61\153", "\x4d\x69\156\x69\117\x72\x61\156\147\x65" => "\x6d\151\x6e\151\157\162\x61\156\x67\x65", "\x50\151\156\x67\x46\145\144\145\x72\x61\x74\x65" => "\160\151\x6e\147\146\x65\144\145\162\x61\164\145", "\120\x69\x6e\x67\x4f\156\x65" => "\160\151\156\147\157\x6e\x65", "\103\x65\x6e\x74\162\x69\146\x79" => "\x63\x65\156\164\162\151\x66\x79", "\x4f\x72\x61\143\154\145" => "\157\162\x61\x63\154\x65\x2d\x65\156\164\x65\x72\160\x72\151\163\x65\x2d\155\141\x6e\141\147\145\162", "\102\x69\164\x69\x75\x6d" => "\142\151\164\x69\x75\x6d", "\123\x68\151\142\142\x6f\x6c\x65\164\x68\40\62" => "\x73\x68\x69\142\142\157\154\145\164\150\62", "\x53\x68\151\x62\142\x6f\x6c\145\164\150\x20\x33" => "\x73\150\151\142\142\x6f\154\x65\164\150\63", "\x53\x69\155\x70\x6c\x65\x53\x41\115\114\160\150\160" => "\163\x69\155\x70\154\145\163\x61\x6d\154", "\117\160\145\156\101\x4d" => "\x6f\x70\145\x6e\141\x6d", "\101\165\x74\x68\x61\156\166\x69\x6c" => "\x61\165\164\150\141\x6e\x76\x69\x6c", "\x41\x75\164\x68\x30" => "\141\x75\164\x68\x30", "\x43\101\40\111\144\x65\156\164\151\164\x79" => "\143\x61\x2d\x69\x64\145\x6e\x74\x69\x74\171", "\x57\x53\117\62" => "\x77\163\x6f\x32", "\x52\123\101\x20\123\145\x63\165\162\145\111\104" => "\162\x73\141\x2d\x73\145\143\x75\162\145\151\144", "\117\x74\x68\x65\x72" => "\x4f\x74\x68\x65\162");
}
class mo_options_plugin_admin extends BasicEnum
{
    const HOST_NAME = "\x6d\157\x5f\163\x61\x6d\x6c\137\x68\x6f\163\164\x5f\156\x61\x6d\145";
    const New_Registration = "\155\x6f\137\163\141\155\154\x5f\156\x65\167\x5f\162\145\147\151\163\x74\x72\x61\164\151\x6f\x6e";
    const Admin_Phone = "\x6d\x6f\137\x73\141\x6d\154\137\x61\144\x6d\x69\x6e\x5f\x70\x68\x6f\156\x65";
    const Admin_Email = "\155\157\137\x73\x61\x6d\x6c\137\141\144\155\x69\156\137\145\155\141\151\154";
    const Admin_Pass = "\x6d\x6f\x5f\x73\141\x6d\154\137\x61\144\x6d\151\x6e\137\x70\141\x73\x73\x77\x6f\x72\x64";
    const Verify_Customer = "\x6d\157\137\x73\x61\x6d\x6c\137\166\145\162\x69\146\171\137\143\165\163\164\157\x6d\x65\162";
    const Admin_Customer_Key = "\x6d\x6f\137\x73\x61\155\x6c\x5f\x61\144\155\x69\156\137\143\165\x73\x74\157\x6d\x65\x72\137\x6b\145\171";
    const Admin_Api_Key = "\x6d\157\137\x73\141\155\154\137\x61\144\155\x69\156\137\141\160\151\137\153\x65\x79";
    const Customer_Token = "\155\157\x5f\163\141\x6d\x6c\x5f\143\165\x73\164\x6f\x6d\145\162\137\164\x6f\153\x65\x6e";
    const Admin_notices_Message = "\x6d\157\x5f\163\141\x6d\x6c\x5f\x6d\145\163\x73\141\147\x65";
    const Registration_Status = "\155\x6f\137\163\x61\x6d\x6c\x5f\162\x65\x67\x69\163\164\x72\141\x74\x69\x6f\156\x5f\x73\164\x61\164\x75\x73";
    const IDP_Config_ID = "\163\141\155\x6c\x5f\x69\x64\x70\137\143\x6f\156\146\x69\x67\137\x69\x64";
    const IDP_Config_Complete = "\155\x6f\137\x73\x61\155\154\x5f\x69\144\x70\x5f\x63\157\x6e\x66\151\x67\x5f\143\157\x6d\x70\x6c\145\164\145";
    const Transaction_ID = "\155\x6f\137\x73\141\155\x6c\x5f\x74\162\141\156\x73\x61\x63\164\151\x6f\x6e\x49\144";
    const SML_LK = "\x73\155\x6c\137\x6c\153";
    const Site_Status = "\164\137\x73\151\164\145\137\163\x74\141\x74\x75\163";
    const Site_Check = "\163\x69\164\x65\x5f\143\153\x5f\154";
    const Free_Version = "\155\x6f\x5f\x73\141\155\x6c\x5f\146\x72\x65\145\137\x76\x65\x72\163\151\x6f\x6e";
    const Admin_company = "\155\157\137\x73\141\155\154\137\x61\144\x6d\151\x6e\137\x63\157\155\160\x61\x6e\171";
    const Admin_First_Name = "\155\x6f\137\163\x61\155\154\137\141\144\x6d\x69\156\137\146\x69\162\163\164\x5f\156\x61\155\145";
    const Admin_Last_Name = "\155\x6f\x5f\x73\x61\x6d\x6c\x5f\141\144\155\151\x6e\x5f\154\x61\163\164\x5f\x6e\141\x6d\x65";
    const License_Name = "\x6d\157\137\x73\141\x6d\154\137\x6c\151\143\145\156\x73\145\137\156\x61\x6d\145";
    const User_Limit = "\155\157\x5f\x73\x61\x6d\x6c\137\165\x73\x72\x5f\154\x6d\x74";
}
