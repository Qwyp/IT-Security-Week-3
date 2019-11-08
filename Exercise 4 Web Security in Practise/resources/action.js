function $(id){return document.getElementById(id);}
function signup()
{
	$('signup').style.visibility = 'hidden';
	$('login').style.visibility = 'visible';
	$('logincontent').style.height = '0px';
	$('signupcontent').style.height = '200px';
	$('signuptable').style.visibility = 'visible';
	$('logintable').style.visibility = 'hidden';
}
function login()
{
	$('login').style.visibility = 'hidden';
	$('signup').style.visibility = 'visible';
	$('logincontent').style.height = '200px';
	$('signupcontent').style.height = '0px';
	$('logintable').style.visibility = 'visible';
	$('signuptable').style.visibility = 'hidden';
}