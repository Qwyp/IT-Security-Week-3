# About
Development of a small web-application, written in PHP, JavaScript, HTML, CSS and Python
which is vulnerable to Cross Site Scripting and SQL Injection.

**commands to run before execution:** <br>
1. pip install pymysql <br>
2. pip install php

If you have Xampp already installed you don't need to install MYSQL

## Execution

## Executable Injections/ XSS Attack Example

```javascript
k%" UNION SELECT * FROM users ;--

%" ;--

<script> alert('XSS'); </script>
```

## Close the SQL-Injection vulnerability
```javascript
<?PHP
include('../inc/conf.php');
$item = addslashes($_GET['item']);
if (!empty($item)){
	$sql ='SELECT product_name, price, amount FROM products WHERE `product_name` like "%'.$item.'%"';
	$result = $conn->query($sql);
	}
?>
```

## Languages
* PHP
* JavaScript
* HTML/CSS
* Python

## Authors
Ashkan Es Haghi <br>
Alexander Grissinger <br>
Muddassir Hussain <br>

## Project Date
08.11.2019
