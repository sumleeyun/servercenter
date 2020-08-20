<html xmlns="https://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Please Login</title>
 <!--Made with love by Mutiullah Samim -->

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="./Pic/styles.css">
<script language="JavaScript">
<!--

function SetCookie(name, value, expires, path, domain, secure)
{
	var today = new Date();
	today.setTime(today.getTime());

	if(expires)
	{
		expires = expires * 1000 * 60 * 60 * 24;
	}

	var expires_date = new Date(today.getTime() + (expires));
	
	document.cookie = name + "=" +escape( value ) + ((expires)?";expires=" + expires_date.toGMTString():"") + ((path)? ";path=" + path : "") + ((domain)? ";domain=" + domain : "" ) + ((secure)? ";secure" : "" );
}

function GetCookie(check_name) 
{
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false;

	for(i = 0; i < a_all_cookies.length; i++)
	{
		a_temp_cookie = a_all_cookies[i].split( '=' );
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

		if(cookie_name == check_name)
		{
			b_cookie_found = true;
			
			if(a_temp_cookie.length > 1)
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
	
	if(serverIndex)
	{	
		for(i = 0; i <= document.forms[0].ldapServer.options.length - 1; i++)
		{
			if(document.forms[0].ldapServer.options[i].value == serverIndex)
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
	var sendUser=document.getElementById("userName").value;
	document.getElementById("redirectUrl").value="https://www.comm.rtaf.mi.th?idx="+sendUser;
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

	if(e && e.which)
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
// -->
</script>

</head>
<body onload="javascript:displaySections();selectLdapServer();">

 <div class="container">
            <div class="d-flex justify-content-end  ">
                <div class="card card_main">
                    <div class="card-header">
                        <h3>ระบบตรวจสอบและยืนยันผู้มีสิทธิ์ใช้งาน ทอ.</h3>
                        <!--<div class="d-flex justify-content-end social_icon">
                            <span><i class="fab  fa-envelope-square" aria-hidden="true"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>-->
                    </div>

    <div class="card-body">

        <form action="https://10.239.27.103/user_login_submit" method="POST" onsubmit="return stopSubmit()">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>

                <input type="text" id="userName" name="userName" maxlength="64" tabindex="1" class="form-control" placeholder="Email ทอ. ไม่ต้องใส่ @rtaf.mi.th">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>

                <input type="password" class="form-control" placeholder="password" id="x" name="x" maxlength="128" tabindex="2" onkeypress="checkEnter(event)">
            </div>
            <div class="row align-items-center remember">
                <p id="ldapServerList" class="hidden"><input type="hidden" id="ldapServer" name="ldapServer" value="0"></p>
            </div>
            <div class="form-group">
                <a class="btn float-right login_btn" href="javascript:login();" tabindex="3">เข้าสู่ระบบ</a>
                <!--<input type="submit" value="Login" class="btn float-right login_btn" onclick="loing();">-->
                <input type="hidden" name="action">
                <input name="redirectUrl" id="redirectUrl" type="hidden" value="https://login.rtaf.mi.th/portal/index.html">
            </div>
        </form>
    </div>
    <div class="card-footer">
        <h6> <?php   print "Your IP address is: ".$_SERVER['REMOTE_ADDR']; ?></h6>
    </div>
    <!--<div class="d-flex justify-content-center"> 
        <a href="#">Forgot your password?</a> 
    </div>-->
                </div>
  </div>

    <div class="d-flex justify-content-end  ">
        <div class="card bg-h">
         <div class="card-body bg-white font-s">
        <p>ตาม พรบ. ว่าด้วยการกระทําความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ. ๒๕๕๐ และ <a href="https://imgcdn.rtaf.mi.th/2556/admin/rtaf_25561102015313.pdf" target="_blank"> 
            นโยบายและแนวปฏิบัติในการรักษาความมั่นคงปลอดภัยด้านสารสนเทศของกองทัพอากาศ</a> </p>
        กำหนดให้ สอ.ทอ. มีหน้าที่ควบคุมการเข้าถึงใช้งานระบบสารสนเทศ โดยให้มีมาตรการและแนวปฏิบัติในการรักษาความมั่นคงปลอดภัยด้านควบคุมการเข้าถึงและการใช้งานทรัพย์สินสารสนเทศ (Access Control Policy) 
    รวมถึงสามารถเก็บบันทึกข้อมูลการเข้าใช้งานระบบสื่อสารและสารสนเทศ เพื่อใช้ในการตรวจสอบภายหลัง
    <hr style=" border-style: inset;">
    <h6>กรณีเกิดปัญหาการใช้งาน</h6>
 
		<ul>
			<li>ในวันและเวลาราชการ กรณีลืมรหัสผ่าน และคำถาม-คำตอบ กรุณาติดต่อ ผู้ดูแลระบบอีเมล์และเว็บเซิร์ฟเวอร์ กองทัพอากาศ 1155(เฉพาะโทรเบอร์ภายในกองทัพอากาศ)</li>
			<li>ต่างจังหวัดติดต่อผ่านเบอร์กลาง 02-5346000 แล้วกดเบอร์ข้างต้น</li>
			<li>นอกเวลาราชการ รับแจ้งปัญหาทางอีเมล์ โดยส่งมาที่ support@rtaf.mi.th</li>
		</ul>
                <p align="center">© โดย ศูนย์คอมพิวเตอร์ กรมสื่อสารอิเล็กทรอนิกส์ทหารอากาศ</p> 
        
    </div>
        </div>

    </div>

</div>

  

                
  <script language="javascript">
  <!--
  document.forms[0].userName.focus()
  //-->
  </script>


</body></html>

