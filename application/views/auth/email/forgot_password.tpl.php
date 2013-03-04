<html>
<body>
	<h1>Passwort zurücksetzen für <?php echo $identity;?></h1>
	<p>Bitte diesen Link betätigen <?php echo anchor('auth/reset_password/'. $forgotten_password_code, 'um Ihr Passwort zurückzusetzen!');?>.</p>
</body>
</html>