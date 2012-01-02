<?php
$this->load->view('elementy/header.php');
?>
<script src="/inc/js/start/logowanie.js" type="text/javascript"></script>

<div id="_logowanie_box" class="ui-corner-all ui-widget">
	<center>	
	<div class="ui-widget-header">Witamy w systemie</div>

	<div class="ui-widget-content">
		<form action="/uzytkownicy/akcja_zaloguj" method="post">
			<div id="_logowanie_name">
				Login:
				<input type="text" name="login" class="ui-widget-content ui-corner-all"/>
			</div>
			
			<div id="_logowanie_pass">
				Hasło:
				<input type="password" name="haslo" class="ui-widget-content ui-corner-all"/>
			</div>
			<input type="submit" value="zaloguj" />
		</form>
	</div>
</div>
