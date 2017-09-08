<!-- BEGIN: MAIN -->
<section class="main">
	<section class="header">
		<h2>{PHP.L.users_regcargo}</h2>
		{FILE "{PHP.cfg.themes_dir}/{PHP.usr.theme}/warnings.tpl"}
		<div class="pad5">
			<span class="small">{PHP.L.users_transpcargo} <a class="green-link" href="{PHP|cot_url('users','m=regtransp')}">{PHP.L.users_regastransp}</a></span>
		</div>
	</section>
	<section class="body">
		<form name="login" action="{USERS_REGISTER_SEND}" method="post" enctype="multipart/form-data" >
			<div class="pad5"><div class="width50 divsenter">{USERS_REGISTER_USER}</div></div>
			<div class="pad5"><div class="width50 divsenter">{USERS_REGISTER_EMAIL}</div></div>
			<div class="pad5"><div class="width50 divsenter">{USERS_REGISTER_PASSWORD}</div></div>
			<div class="pad5"><div class="width50 divsenter">{USERS_REGISTER_PASSWORDREPEAT}</div></div>
			<div id="rverify" class="pad5"><div class="width50 divsenter">
				{USERS_REGISTER_VERIFYIMG}
				{USERS_REGISTER_VERIFYINPUT}
			</div>
			</div>
            <div class="pad5"><div class="width50 divsenter small">
                    <input type="checkbox" name="ruseragreement" style="width: auto !important;" onchange="agreement(this)"/>
                    Принять <a href="{PHP|cot_url('useragreement')}">пользовательское соглашение</a>
            </div></div>
		<div class="pad">
			<button type="submit" class="btngreen" disabled style="background-color: #aaa; border: 1px solid #777;">{PHP.L.users_register}</button>
		</div>
        <script type="text/javascript">
            function agreement(ck)
            {
                if (ck.checked)
                    $('button.btngreen').removeAttr('style').removeAttr('disabled');

                else
                    $('button.btngreen').attr('style','background-color: #aaa; border: 1px solid #777;').attr('disabled');
            }
        </script>
		<!--div class="pad">
			<span><b>Быстрая регистрация в один клик</b></span>
		</div-->
			{USERS_REGISTER_GROUP}
		</form>
	</section>
</section>

		<!--div class="block">
			<h2 class="users">{USERS_REGISTER_TITLE}</h2>


				<table class="list">
					<tr>
						<td class="width30">{PHP.L.Username}:</td>
						<td class="width70">{USERS_REGISTER_USER} *</td>
					</tr>
					<tr>
						<td>{PHP.L.users_validemail}:</td>
						<td>
							{USERS_REGISTER_EMAIL} *
							<p class="small">{PHP.L.users_validemailhint}</p>
						</td>
					</tr>
					<tr>
						<td>{PHP.L.Password}:</td>
						<td>{USERS_REGISTER_PASSWORD} *</td>
					</tr>
					<tr>
						<td>{PHP.L.users_confirmpass}:</td>
						<td>{USERS_REGISTER_PASSWORDREPEAT} *</td>
					</tr>
					<tr>
						<td>{USERS_REGISTER_VERIFYIMG}</td>
						<td>{USERS_REGISTER_VERIFYINPUT} *</td>
					</tr>
					<tr>
						<td colspan="2" class="valid">
							<button type="submit">{PHP.L.Submit}</button>
						</td>
					</tr>
				</table>
			</form>
		</div-->

<!-- END: MAIN -->