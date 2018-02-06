<!-- BEGIN: MAIN -->
<div class="bcrups">{USERS_TITLE}</div>
	<h1>
	<!-- IF {PHP.cat} -->
		{CATTITLE}
	<!-- ELSE -->
		{USERS_TITLE}
	<!-- ENDIF -->
	</h1>
<div id="content">
				<form action="{SEARCH_ACTION_URL}" method="get">
					<input type="hidden" name="f" value="search" />
					<input type="hidden" name="e" value="users" />
					<input type="hidden" name="group" value="{PHP.group}" />
					<input type="hidden" name="cat" value="{PHP.cat}" />
					<input type="hidden" name="l" value="{PHP.lang}" />
                    <div class="form-group row">
                        <div class="col-12 col-sm-4 col-md-2">
                        {PHP.L.Search}:
                        </div>
                        <div class="col-12 col-sm-8">
                            <input type="text" name="sq" value="{PHP.sq|htmlspecialchars($this)}" class="form-control"/>
                        </div>
                    </div>
                    <!-- IF {PHP.cot_plugins_active.locationselector} -->
                    <div class="form-group row">
                        <div class="col-12 col-sm-4 col-md-2">
                        {PHP.L.Location}:
                        </div>
                        <div class="col-12 col-sm-8">
                            {SEARCH_LOCATION}
                        </div>
                    </div>

                    <!-- ENDIF -->
                    <div class="form-group row"><div class="col"><input type="submit" name="search" class="btn" value="{PHP.L.Search}" /></div></div>
				</form>
			<!-- BEGIN: USERS_ROW -->
				<div class="row">
					<div class="col-auto">
						{USERS_ROW_AVATAR}
					</div>
					<div class="col">
						<strong>{USERS_ROW_NICKNAME}</strong><!-- IF {USERS_ROW_ISPRO} --> <span class="label label-important">PRO</span><!-- ENDIF -->
                        <span class="badge badge-info">{USERS_ROW_USERPOINTS}</span> {USERS_ROW_USERSTARS}
                        <p>{USERS_ROW_COUNTRY} {USERS_ROW_REGION} {USERS_ROW_CITY}</p>
					</div>
				</div>
				<hr/>
			<!-- END: USERS_ROW -->

			<!-- IF {USERS_TOP_TOTALUSERS} > 0 -->
			<div class="pagination"><ul>{USERS_TOP_PAGEPREV}{USERS_TOP_PAGNAV}{USERS_TOP_PAGENEXT}</ul></div>
			<!-- ELSE -->
			<div class="alert">{PHP.L.Noitemsfound}</div>
			<!-- ENDIF -->
</div>

<!-- END: MAIN -->