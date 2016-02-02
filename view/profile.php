Bonjour,<br/>

changer le mot de passe : <br/>
<form method="POST" action="../controller/change_password.php" id="form">
<input id="pw1" name="pw1" type="password"/><br/><br/>
<input id="pw2" name="pw2" type="password"/><br/><br/>
<input id ="submit" class="submit" type="submit" value="Envoyer"/>
<div id="errors"></div>
</form>

<script type="text/javascript">
var pw1 = document.getElementById('pw1');
var pw2 = document.getElementById('pw2');
var submit = document.getElementById('submit');
var errors = document.getElementById('errors');
var form = document.getElementById('form');
form.onsubmit = function(event){
	console.log('tpt')
	if(pw1.value === pw2.value){
		return true;
	}
	errors.innerHTML = "mot de passe non identiques"
	return false;
}
</script>