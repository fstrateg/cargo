<!-- BEGIN: MAIN -->
<section class="main login">
	<div id="loginpage">
		{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
		<section class="header white">
			<span><b>{USERS_AUTH_TITLE}</b></span>
		</section>
		<section class="bd pad10">
			<form name="login" action="{USERS_AUTH_SEND}" method="post">
			<div class="pad10">
				<div class="width50 divsenter col-10 col-sm-6 col-md-4">
					<input name="rusername" type="text" placeholder="{PHP.L.users_nameormail}" class="form-control">
				</div>
			</div>
			<div class="pad10">
				<div class="width50 divsenter col-10 col-sm-6 col-md-4">
					<input name="rpassword" type="password" placeholder="{PHP.L.Password}" class="form-control">
				</div>
			</div>
			<div class="pad10">
				<div class="width50 divsenter">
					<label class="check white">{USERS_AUTH_REMEMBER}&nbsp; {PHP.L.users_rememberme}</label>
				</div>
			</div>
			<div class="row justify-content-center">
					<div class="col col-sm-4 col-md-3">
						<a class="green-link small white" href="{PHP|cot_url('users', 'm=passrecover')}">{PHP.L.users_lostpass}</a>
					</div>
					<div class="col col-sm-4 col-md-3">
						<a class="green-link small white" href="{PHP|cot_url('users','m=register')}">{PHP.L.Register}</a>
					</div>
			</div>
			<div class="pad10">
				<button type="submit" name="rlogin" class="btn btn-warning">{PHP.L.Login}</button>
			</div>
				</form>
			<div class="pad10 white">
			{USERS_SOCBUTTONS}
			</div>
		</section>
	</div>
</section>
<!-- END: MAIN -->