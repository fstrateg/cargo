<!-- BEGIN: MAIN -->
<section class="main">
	{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
	<section class="header">
		<span><b>{USERS_AUTH_TITLE}</b></span>
	</section>
	<section class="body">
		<form name="login" action="{USERS_AUTH_SEND}" method="post">
		<div class="pad">
			<div class="width50 divsenter">
				<input name="rusername" type="text" placeholder="{PHP.L.users_nameormail}">
			</div>
		</div>
		<div class="pad">
			<div class="width50 divsenter">
				<input name="rpassword" type="password" placeholder="{PHP.L.Password}">
			</div>
		</div>
		<div class="pad">
			<div class="width50 divsenter">
				<label class="check">{USERS_AUTH_REMEMBER}&nbsp; {PHP.L.users_rememberme}</label>
			</div>
		</div>
		<div class="pad">
			<button type="submit" name="rlogin" class="btngreen">{PHP.L.Login}</button>
		</div>
			</form>
		<div class="row">
			<a class="green-link small" href="{PHP|cot_url('users', 'm=passrecover')}">{PHP.L.users_lostpass}</a>
		</div>
		<div class="row">
			<a class="green-link small" href="{PHP|cot_url('users','m=register')}">{PHP.L.Register}</a>
		</div>
		<div class="pad">
		{USERS_SOCBUTTONS}
		</div>
	</section>
</section>

		<!--div class="row">
			<div class="offset3 span5 form-signin">
				<div class="mboxHD">{USERS_AUTH_TITLE}</div>
				<form name="login" action="{USERS_AUTH_SEND}" method="post">
					<table class="main">
						<tr>
							<td class="width30">{PHP.L.users_nameormail}:</td>
							<td class="width70">{USERS_AUTH_USER}</td>
						</tr>
						<tr>
							<td>{PHP.L.Password}:</td>
							<td class="width70">{USERS_AUTH_PASSWORD}</td>
						</tr>
						<tr>
							<td></td>
							<td><label class="checkbox">{USERS_AUTH_REMEMBER}&nbsp; {PHP.L.users_rememberme}</label></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="rlogin" class="btn btn-large btn-primary" value="0">{PHP.L.Login}</button>
								<br/>
								<br/>
								<a href="{PHP|cot_url('users', 'm=passrecover')}">{PHP.L.users_lostpass}</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div-->

<!-- END: MAIN -->