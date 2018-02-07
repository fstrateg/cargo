<!-- BEGIN: MAIN -->
<section class="main">
	{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
	<section class="header">
		<span><b>{USERS_AUTH_TITLE}</b></span>
	</section>
	<section class="body">
		<form name="login" action="{USERS_AUTH_SEND}" method="post">
		<div class="pad">
			<div class="width50 divsenter col-10 col-sm-6 col-md-4">
				<input name="rusername" type="text" placeholder="{PHP.L.users_nameormail}" class="form-control">
			</div>
		</div>
		<div class="pad">
			<div class="width50 divsenter col-10 col-sm-6 col-md-4">
				<input name="rpassword" type="password" placeholder="{PHP.L.Password}" class="form-control">
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
            <div class="col">
			<a class="green-link small" href="{PHP|cot_url('users', 'm=passrecover')}">{PHP.L.users_lostpass}</a>
            </div>
            <div class="col">
			<a class="green-link small" href="{PHP|cot_url('users','m=register')}">{PHP.L.Register}</a>
            </div>
            </div>
		<div class="pad">
		{USERS_SOCBUTTONS}
		</div>
	</section>
</section>
<!-- END: MAIN -->