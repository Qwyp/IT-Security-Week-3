<?PHP
include('../inc/conf.php');


$item = addslashes($_GET['item']);
if (!empty($item)){
	$sql ='SELECT product_name, price, amount FROM products WHERE `product_name` like "%'.$item.'%"';
	$result = $conn->query($sql);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Web App</title>
</head>
<script src="../resources/action.js" ></script>
<style type="text/css">
#logout{width:100px;height:46px;float:left;background:url(../images/logout.jpg) bottom no-repeat;visibility:visible;margin-left:50px;margin-top:12px;position:absolute;}
#logout:hover{width:100px;height:46px;float:left;background:url(../images/logout.jpg) top no-repeat;visibility:visible;margin-left:50px;margin-top:12px;cursor:pointer;}
#searchcontent{width:1000px;float:left;}
#resultcontent{width:1000px;float:left;}
#searchtable{float:left;direction:ltr;visibility:visible;margin-left: 40px;}
#searchresulttable{margin-left:100px;float:left;direction:ltr;visibility:visible;margin-top: 30px;margin-bottom: 35px;}
.table td{background:#C6F0FF;}
</style>
<body style="padding:0px;">
<div id="base" style="width:1000px;margin:0px auto;">
<div id="logo" style="width:1000px;height:70px;float:left;border-bottom:5px solid #00bab9;">
	<div style="width:800px;height:70px;float:left;"><p style="margin-left:130px;height:30px;margin-top:20px;font:bolder 'B Titr';">My Web APP</p></div>
	<div style="width:200px;height:70px;float:left;">
		<div id="logout" style="" ><a href="logout.php" target="_self" style="width:100px;height:46px;display:block;margin:auto;"></a></div>
    </div>
</div>
<div id="searchcontent" style="">
	<form action="index.php" method="get">
		<table width="920" border="0" id="searchtable" align="center" >
		  <tbody>
			<tr>
			  <td colspan="2"><input type="text" name="item" placeholder="Search ..." style="width: 680px;margin-left: 25px;border-radius: 18px;border: 1px solid gray;" /></td>
			  <td width="170"><input type="submit" value="Search" style="width: 130px;margin-left: 10px;border-radius: 18px;border: 1px solid gray;" /></td>
			</tr>
			<?PHP
			if(empty($item)):
			?>
			<tr>
			  <td width="244" style="text-align: right;"></td>
			  <td width="492"></td>
			  
			  <td style="text-align: left;"><?=$item?></td>
		    </tr>
		    <?PHP
			  endif;
			  ?>
			<?PHP
			if(!empty($item)):
			?>
			<tr>
			  <td width="244" style="text-align: right;">You Searched For :</td>
			  <td width="492"><span style="text-align: left;padding-left: 15px;font-weight: bolder;">
			    <?=$item?>
			  </span></td>
			  
			  <td style="text-align: left;">&nbsp;</td>
		    </tr>
		    <?PHP
			  endif;
			  ?>
		  </tbody>
		</table>
	</form>
</div>
<div id="resultcontent" style="">
	<?PHP
	if(!empty($item)):
	?>
	<table width="800" border="1" id="searchresulttable" align="center">
	  <tbody>
		<tr>
		  <td width="30" style="text-align: center;background-color: lightblue;">#</td>
		  <td width="370" style="text-align: center;background-color: lightblue;"><strong>Product Name</strong></td>
		  <td width="186" style="text-align: center;background-color: lightblue;"><strong>Price</strong></td>
		  <td width="186" style="text-align: center;background-color: lightblue;"><strong>Amount</strong></td>
		</tr>
		<?PHP
			$cnt = 1;
			while($row = $result->fetch_assoc()):
		?>
		<tr>
		  <td style="text-align: center;"><?=$cnt?></td>
		  <td style="text-align: center;"><?=$row['product_name']?></td>
		  <td style="text-align: center;"><?=$row['price']?></td>
		  <td style="text-align: center;"><?=$row['amount']?></td>
		</tr>
		<?PHP
			$cnt++;
			endwhile;
		?>
	  </tbody>
	</table>
	<?PHP
	endif;
	?>
</div>
<div id="logo" style="width:1000px;height:30px;float:left;border-top:1px #00bab9 solid;text-align:center;">&copy; All right reserved by My Web App Team ( Ashkan Es Haghi - Alexander Grissinger - Muddassir Hussain )</div>
</div>
</body>
</html>