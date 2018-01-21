<!-- BEGIN: MAIN -->
<h2 class="users">{USERS_PROFILE_TITLE}</h2>
		<div id="content">

			{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
			{USER_VERIF}
			<form action="{USERS_PROFILE_FORM_SEND}" method="post" enctype="multipart/form-data" name="profile">
				<input type="hidden" name="userid" value="{USERS_PROFILE_ID}" />
                <div class="form-group row">
                    <div class="col-12 col-sm-4">{PHP.L.Username}:</div>
                    <div class="col-12 col-sm-8 col-md-4">{USERS_PROFILE_NAME}</div>
                </div>
            <div class="form-group row">
                <div class="col-12 col-sm-4">
                {NEED} {PHP.L.Fio}:
                    <p><small class="text-muted">{PHP.L.FioOrFirm}</small></p>
                </div>
                <div class="col-12 col-sm-8 col-md-4">
                {USERS_FIOFIRM}
                </div>
            </div>
                <div class="form-group row">
                <div class="col-12 col-sm-4">
                {NEED} {PHP.L.Phone} №1:
                    <p><small class="text-muted">{PHP.L.users_mainphone}</small></p>
                </div>
                <div class="col-12 col-sm-8">
                {USERS_PHONE1}
                </div>
            </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {NEED} {PHP.L.Phone} №2:
                        <p><small class="text-muted">{PHP.L.users_addphone}</small></p>
                    </div>
                    <div class="col-12 col-sm-8">
                    {USERS_PHONE2}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {NEED} {PHP.L.Phone} №3:
                        <p><small class="text-muted">{PHP.L.users_addphone}</small></p>
                    </div>
                    <div class="col-12 col-sm-8">
                    {USERS_PHONE3}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Groupsmembership}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_GROUPS}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Registered}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_REGDATE}
                    </div>
                </div>
                <!-- BEGIN: USERS_PROFILE_EMAILCHANGE -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Email}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_EMAIL}
                    </div>
                </div>
                <!-- END: USERS_PROFILE_EMAILCHANGE -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.users_hideemail}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_HIDEEMAIL}
                    </div>
                </div>
                <!-- IF {PHP.cot_modules.pm} -->

                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.users_pmnotify}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_PMNOTIFY}
                     <p class="small text-muted">{PHP.L.users_pmnotifyhint}</p>
                    </div>
                </div>
                <!-- ENDIF -->
                <!-- IF {PHP.cot_plugins_active.locationselector} -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {NEED} {PHP.L.Location}:
                    </div>
                    <div class="col-12 col-sm-8">
                    {USERS_PROFILE_LOCATION}
                     </div>
                </div>
                <!-- ELSE -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {NEED} {PHP.L.Country}:
                    </div>
                    <div class="col-12 col-sm-8">
                    {USERS_PROFILE_LOCATION}
                    </div>

                </div>
                <!-- ENDIF -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Birthdate}:
                    </div>
                    <div class="doformcontrol col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_BIRTHDATE}
                    </div>
                </div>
                <!-- IF {USERS_PROFILE_AVATAR} -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Avatar}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_AVATAR}
                    </div>
                </div>
                <!-- ENDIF -->
                <!-- IF {USERS_PROFILE_PHOTO} -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.Photo}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_PHOTO}
                    </div>
                </div>
                <!-- ENDIF -->
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.users_newpass}:
                        <p class="small">{PHP.L.users_newpasshint1}
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {USERS_PROFILE_OLDPASS}
                        <p class="small">{PHP.L.users_oldpasshint}</p>
                    {USERS_PROFILE_NEWPASS1} {USERS_PROFILE_NEWPASS2}
                        <p class="small">{PHP.L.users_newpasshint2}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-8 col-md-4">
                <button class="btn btn-primary">{PHP.L.Update}</button>
                    </div>
                </div>
			</form>
		</div>
<script type="text/javascript">
    $(".doformcontrol select").addClass('form-control');
$(document).ready(function() {

        $("input.number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
        // Allow: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39) ||
		// Allow: numpad
		(e.keyCode >=96 && e.keyCode <= 105))
		{
        // let it happen, don't do anything
        return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57))) {
        e.preventDefault();
        }
        });
});
</script>
<!-- END: MAIN -->