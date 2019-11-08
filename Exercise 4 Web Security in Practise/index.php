<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Web App</title>
</head>
<script src="resources/action.js" ></script>
<style type="text/css">
#login{width:100px;height:21px;float:left;background:url(images/login.jpg) bottom no-repeat;visibility:hidden;margin-left:50px;margin-top:14px;position:absolute;}
#login:hover{width:100px;height:21px;float:left;background:url(images/login.jpg) top no-repeat;visibility:visible;margin-left:50px;margin-top:14px;cursor:pointer;}
#signup{width:100px;height:21px;float:left;background:url(images/Signup.jpg) bottom no-repeat;visibility:visible;margin-left:50px;margin-top:14px;position:absolute;}
#signup:hover{width:100px;height:21px;float:left;background:url(images/Signup.jpg) top no-repeat;visibility:visible;margin-left:50px;margin-top:14px;cursor:pointer;}
#logincontent{width:1000px;float:left;height:200px;}
#signupcontent{width:1000px;float:left;height:0px;}
#logintable{width:300px;margin-left:350px;float:left;direction:ltr;visibility:visible;}
#signuptable{width:300px;margin-left:250px;float:left;direction:ltr;visibility:hidden;}
.table td{background:#C6F0FF;}
</style>
<body style="padding:0px;">
<div id="base" style="width:1000px;margin:0px auto;">
<div id="logo" style="width:1000px;height:70px;float:left;border-bottom:5px solid #00bab9;">
	<div style="width:800px;height:70px;float:left;"><p style="margin-left:130px;height:30px;margin-top:20px;font:bolder 'B Titr';">My Web APP</p></div>
	<div style="width:200px;height:70px;float:left;">
		<div id="signup" style="" onclick="signup();"></div>
		<div id="login" style="" onclick="login()"></div>
    </div>
</div>
<div id="logincontent" style="">
	<div id="logintable" style="">
        <form action="login_action.php" method="post">
        <table class="table" width="295" border="0" cellpadding="2" cellspacing="2" align="center" style="margin-top:40px;">
            <tr valign="middle">
                <td width="80" align="right" style="background:white;">Username :</td>
                <td width="190" align="center"><input type="text" name="username" style="width:190px;text-align:center;"/></td>
            </tr>
            <tr valign="middle">
                <td align="right" style="background:white;">Password :</td>
                <td align="center"><input type="password" name="password" style="width:190px;text-align:center;"/></td>
            </tr>
            <tr>
                <td style="background:white;">&nbsp;</td>
                <td align="right" valign="middle" style="background:white;"><input type="submit" value="Sign In" style="margin-right:20px;width:80px;"  /></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<div id="signupcontent" style="">
	<div id="signuptable" style="">
        <form action="signup_action.php" method="post">
        <table class="table" width="433" border="0" cellpadding="2" cellspacing="2" align="center" style="margin-top:40px;">
            <tr valign="middle">
                <td width="176" align="right">Username :</td>
                <td width="243" align="center"><input type="text" name="username" style="width:190px;text-align:center;"/></td>
            </tr>
            <tr valign="middle">
                <td width="176" align="right">Password :</td>
                <td width="243" align="center"><input type="password" name="password" style="width:190px;text-align:center;"/></td>
            </tr>
	            <tr>
                <td style="background:white;">&nbsp;</td>
                <td align="right" valign="middle" style="background:white;"><input type="submit" value="Sign Up" style="margin-right:20px;width:80px;"  /></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<div id="logo" style="width:1000px;height:30px;float:left;border-top:1px #00bab9 solid;text-align:center;">&copy; All right reserved by My Web App Team ( Ashkan Es Haghi - Alexander Grissinger - Muddassir Hussain )</div>
</div>
</body>
</html>