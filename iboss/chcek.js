<script language="JavaScript">

function SetCookie(name, value, expires, path, domain, secure)
{
        var today = new Date();
        today.setTime(today.getTime());
        if (expires)
{
expires = expires * 1000 * 60 * 60 * 24;
        }

        var expires_date = new Date(today.getTime() + (expires));
        
        document.cookie = name + "=" +escape( value ) + ((expires)?";expires=" + expires_date.toGMTString():"") + ((path)? ";path=" + path : "") + ((domain)? ";domain=" + domain : "" ) + ((secure)? ";secure" : "" );
}

function GetCookie(check_name) 
{
        var a_all_cookies = document.cookie.split(';');
        var a_temp_cookie = '';
        var cookie_name = '';
        var cookie_value = '';
        var b_cookie_found = false;
        for (i = 0; i < a_all_cookies.length; i++)
{
a_temp_cookie = a_all_cookies[i].split('=');
        cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
        if (cookie_name == check_name)
{
b_cookie_found = true;
        if (a_temp_cookie.length > 1)
{
cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
                        }

                        return cookie_value;
                        break;
                }

                a_temp_cookie = null;
                cookie_name = '';
        }

        if(!b_cookie_found)
        {
        return null;
        }
}

function selectLdapServer()
{
        var serverIndex = GetCookie('defaultLdapServer');
        if (serverIndex)
{
for (i = 0; i <= document.forms[0].ldapServer.options.length - 1; i++)
{
if (document.forms[0].ldapServer.options[i].value == serverIndex)
{
document.forms[0].ldapServer.options[i].selected = "1";
                        }
                }
        }
}

function submitForm(actionValue)
{
        document.forms[0].action.value = actionValue;
        document.forms[0].submit();
}

function login()
{
        SetCookie('defaultLdapServer', document.forms[0].ldapServer.value, 300, '/', null, null);
        var sendUser = document.getElementById("userName").value;
        document.getElementById("redirectUrl").value = "https://www.comm.rtaf.mi.th?idx=" + sendUser;
        //alert(document.getElementById("redirectUrl").value);
        document.forms[0].action.value = 'login';
        document.forms[0].submit();
}

function stopSubmit()
{
        return false;
}

function checkEnter(e)
{
        var characterCode;
        if (e && e.which)
{
e = e;
        characterCode = e.which;
        }
        else
        {
        e = event;
        characterCode = e.keyCode;
        }

        if(characterCode == 13)
        {
        login();
        return false;
        }
        else
        {
        return true;
        }
}

function setFocus()
{
        document.forms[0].userName.focus();
}

</script>
