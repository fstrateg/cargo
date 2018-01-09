<!-- BEGIN: HEADER -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>{HEADER_TITLE}</title> 
<!-- IF {HEADER_META_DESCRIPTION} --><meta name="description" content="{HEADER_META_DESCRIPTION}" /><!-- ENDIF -->
<!-- IF {HEADER_META_KEYWORDS} --><meta name="keywords" content="{HEADER_META_KEYWORDS}" /><!-- ENDIF -->
<meta http-equiv="content-type" content="{HEADER_META_CONTENTTYPE}; charset=UTF-8" />
<meta name="generator" content="Cotonti http://www.cotonti.com" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="{HEADER_CANONICAL_URL}" />
{HEADER_BASEHREF}
{HEADER_HEAD}
<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png" />
<link href='https://fonts.googleapis.com/css?family=Montserrat:bold' rel='stylesheet'>
</head>

<body>
    <!-- BEGIN: DESKTOP -->
	<!-- IF {PHP.usr.id} == 0 -->
	<div id="AuthModal" class="modal hide fade">
		<div class="modal-header">
			<h3 id="myModalLabel">{PHP.L.Login}</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{HEADER_GUEST_SEND}" method="post">
					<div class="control-group">
						<label class="control-label" for="inputEmail">{PHP.L.users_nameormail}</label>
						<div class="controls">
							<input type="text" name="rusername" id="inputEmail" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">{PHP.L.Password}</label>
						<div class="controls">
							<input type="password" name="rpassword" id="inputPassword" /><br/>
							<a rel="nofollow" class="link small" href="{PHP|cot_url('users','m=passrecover')}">{PHP.L.users_lostpass}</a>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
							{HEADER_GUEST_COOKIETTL} {PHP.L.users_rememberme}
							</label><br/>
							<button type="submit" class="btn btn-primary btn-large">{PHP.L.Login}</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">{PHP.L.Close}</button>
		</div>
	</div>	
	<!-- ENDIF -->
	<nav class="navbar fixed-top navbar-dark navbar-expand-xl">
		<div id="wrapper" class="container">

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<!-- BEGIN: GUEST -->
					<li class="nav-item"><a class="nav-link" href="{PHP|cot_url('login')}" data-toggle="modal" onClick="$('#AuthModal').modal(); return false;">{PHP.L.Login}</a></li>
					<li class="nav-item"><a class="nav-link" href="{PHP|cot_url('users','m=register')}">{PHP.L.Register}</a></li>
					<!-- END: GUEST -->
					<!-- BEGIN: USER -->
					<li class="nav-item"><a class="nav-link" href="{PHP.usr.name|cot_url('users', 'm=details&u='$this)}" style="padding-top: 6px"><img src="/images/{HEADER_IMG}" title="{HEADER_IMGTITLE}" /> {HEADER_USERNAME} [ID{PHP.usr.id}]</a></li>
					<li class="nav-item"><a class="nav-link" href="{PHP|cot_url('users', 'm=profile')}"><img src="themes/{PHP.theme}/img/config.png"/> {PHP.L.Profile}</a></li>
					<!-- IF {PHP.cfg.payments.balance_enabled} -->
					<li class="nav-item"><a class="nav-link" href="{HEADER_USER_BALANCE_URL}"><img src="themes/{PHP.theme}/img/money.png"/> {PHP.L.payments_mybalance}: {HEADER_USER_BALANCE|number_format($this, '2', '.', ' ')} {PHP.cfg.payments.valuta}</a></li>
					<!-- ENDIF -->
					<li class="nav-item btn-group">
						<a class="dropdown-toggle nav-link" data-toggle="dropdown" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false" href="#"><img src="themes/{PHP.theme}/img/cabinet.png" alt="{PHP.L.projects_cabinet}"/> {PHP.L.projects_cabinet}<b class="caret"></b></a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<!-- IF {PHP.usr.iscargo} -->
							<a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=projects')}">{PHP.L.projects_myprojects}</a>
							<!-- ENDIF -->
							<!-- IF {PHP.usr.istransp} -->
							<a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=transport')}">{PHP.L.projects_mytransport}</a>
							<a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=marshrut')}">{PHP.L.projects_mymarshruts}</a>
							<!-- ENDIF -->
							<!-- IF {PHP.cot_modules.blacklist}-->
							<a class="dropdown-item" href="{PHP|cot_url('blacklist')}">{PHP.L.Blacklist}</a>
							<!-- ENDIF -->
							<!-- IF {PHP.cot_modules.favorites}-->
							<a class="dropdown-item" href="{PHP|cot_url('favorites')}">{PHP.L.Favorites}</a>
							<!-- ENDIF -->
							<!-- IF {PHP.cot_plugins_active.sbr} -->
							<a class="dropdown-item" href="{PHP|cot_url('sbr')}">{PHP.L.sbr_mydeals}</a>
							<!-- ENDIF -->
						</div>
					</li>
					<!-- IF {PHP.cot_plugins_active.marketorders} -->
					<li class="nav-item">
						<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">{PHP.L.market}<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=market')}">{PHP.L.market_myproducts}</a></li>
							<li><a href="{PHP|cot_url('marketorders', 'm=sales')}">{PHP.L.marketorders_mysales}</a></li>
							<li><a href="{PHP|cot_url('marketorders', 'm=purchases')}">{PHP.L.marketorders_mypurchases}</a></li>

						</ul>
					</li>
					<!-- ENDIF -->
					<!-- IF {HEADER_USER_PMREMINDER} -->
					<li class="nav-item">
						<a class="nav-link" href="{PHP|cot_url('pm')}"><img src="themes/{PHP.theme}/img/pm.png" alt=""/> {HEADER_USER_PMTEXT}</a>
					</li>
					<!-- ENDIF -->
					<!-- IF {HEADER_NOTICES} -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">{PHP.L.header_notice}<b class="caret"></b></a>
						<ul class="dropdown-menu">
							{HEADER_NOTICES}
						</ul>
					</li>
					<!-- ENDIF -->
					<!-- IF {PHP|cot_auth('admin', 'any', 'R')} -->
					<li class="nav-item"><a class="nav-link" href="{PHP|cot_url('admin')}">{PHP.L.Administration}</a></li>
					<!-- ENDIF -->
					<li class="nav-item"><a class="nav-link" href="{PHP.out.loginout_url}"><img src="themes/{PHP.theme}/img/logout.png" alt=""/>{PHP.L.Logout}</a></li>
					<!-- END: USER -->
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div id="header" class="row">
			<div class="col-3">
				<div class="logo"><a href="{PHP|cot_url('index')}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}"><img src="themes/{PHP.theme}/img/logo.png"/></a></div>
			</div>
			<div class="col-9 align-self-center">
				<nav class="navbar">
					<div class="navbar-inner">
						<ul class="nav">
							<li class="nav-item <!-- IF {PHP.env.ext} == 'index' -->active<!-- ENDIF -->"><a class="nav-link" href="{PHP|cot_url('index')}">{PHP.L.Home}</a></li>
							<li class="nav-item <!-- IF {PHP.env.ext} == 'projects' -->active<!-- ENDIF -->"><a class="nav-link" href="{PHP|cot_url('projects')}">{PHP.L.projects_projects}</a></li>
							<li<!-- IF {PHP.env.ext} == 'marshrut' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('marshrut')}">{PHP.L.hea_claims}</a></li>
							<li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.4.name}</a></li>
							<li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.7.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP.cot_groups.7.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.7.name}</a></li>
							<!-- IF {PHP.cot_modules.market} -->
							<li<!-- IF {PHP.env.ext} == 'market' AND !{PHP.type} --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('market')}">{PHP.L.market}</a></li>
							<!-- ENDIF -->
							<!-- IF {PHP.cot_plugins_active.calcmarsh} -->
							<li<!-- IF {PHP.env.ext} == 'calcmarsh' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('calcmarsh')}">{PHP.L.projects_calc}</a></li>
							<!-- ENDIF -->
							<li<!-- IF {PHP.env.ext} == 'inway' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('inway')}">{PHP.L.hea_inway}</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>


	</div>
    <!-- END: DESKTOP -->


    <!-- BEGIN: MOBILE -->
    <nav class="navbar fixed-top navbar-dark navbar-expand-xl">
        <div id="wrapper" class="container">

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- BEGIN: GUEST -->
                    <li class="nav-item"><a class="nav-link" href="{PHP|cot_url('login')}" data-toggle="modal" onClick="$('#AuthModal').modal(); return false;">{PHP.L.Login}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{PHP|cot_url('users','m=register')}">{PHP.L.Register}</a></li>
                    <!-- END: GUEST -->
                    <!-- BEGIN: USER -->
                    <li class="nav-item"><a class="nav-link" href="{PHP.usr.name|cot_url('users', 'm=details&u='$this)}" style="padding-top: 6px"><img src="/images/{HEADER_IMG}" title="{HEADER_IMGTITLE}" /> {HEADER_USERNAME} [ID{PHP.usr.id}]</a></li>
                    <li class="nav-item"><a class="nav-link" href="{PHP|cot_url('users', 'm=profile')}"><img src="themes/{PHP.theme}/img/config.png"/> {PHP.L.Profile}</a></li>
                    <!-- IF {PHP.cfg.payments.balance_enabled} -->
                    <li class="nav-item"><a class="nav-link" href="{HEADER_USER_BALANCE_URL}"><img src="themes/{PHP.theme}/img/money.png"/> {PHP.L.payments_mybalance}: {HEADER_USER_BALANCE|number_format($this, '2', '.', ' ')} {PHP.cfg.payments.valuta}</a></li>
                    <!-- ENDIF -->
                    <li class="nav-item btn-group">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false" href="#"><img src="themes/{PHP.theme}/img/cabinet.png" alt="{PHP.L.projects_cabinet}"/> {PHP.L.projects_cabinet}<b class="caret"></b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <!-- IF {PHP.usr.iscargo} -->
                            <a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=projects')}">{PHP.L.projects_myprojects}</a>
                            <!-- ENDIF -->
                            <!-- IF {PHP.usr.istransp} -->
                            <a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=transport')}">{PHP.L.projects_mytransport}</a>
                            <a class="dropdown-item" href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=marshrut')}">{PHP.L.projects_mymarshruts}</a>
                            <!-- ENDIF -->
                            <!-- IF {PHP.cot_modules.blacklist}-->
                            <a class="dropdown-item" href="{PHP|cot_url('blacklist')}">{PHP.L.Blacklist}</a>
                            <!-- ENDIF -->
                            <!-- IF {PHP.cot_modules.favorites}-->
                            <a class="dropdown-item" href="{PHP|cot_url('favorites')}">{PHP.L.Favorites}</a>
                            <!-- ENDIF -->
                            <!-- IF {PHP.cot_plugins_active.sbr} -->
                            <a class="dropdown-item" href="{PHP|cot_url('sbr')}">{PHP.L.sbr_mydeals}</a>
                            <!-- ENDIF -->
                        </div>
                    </li>
                    <!-- IF {PHP.cot_plugins_active.marketorders} -->
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">{PHP.L.market}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=market')}">{PHP.L.market_myproducts}</a></li>
                            <li><a href="{PHP|cot_url('marketorders', 'm=sales')}">{PHP.L.marketorders_mysales}</a></li>
                            <li><a href="{PHP|cot_url('marketorders', 'm=purchases')}">{PHP.L.marketorders_mypurchases}</a></li>

                        </ul>
                    </li>
                    <!-- ENDIF -->
                    <!-- IF {HEADER_USER_PMREMINDER} -->
                    <li class="nav-item">
                        <a class="nav-link" href="{PHP|cot_url('pm')}"><img src="themes/{PHP.theme}/img/pm.png" alt=""/> {HEADER_USER_PMTEXT}</a>
                    </li>
                    <!-- ENDIF -->
                    <!-- IF {HEADER_NOTICES} -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{PHP.L.header_notice}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        {HEADER_NOTICES}
                        </ul>
                    </li>
                    <!-- ENDIF -->
                    <!-- IF {PHP|cot_auth('admin', 'any', 'R')} -->
                    <li class="nav-item"><a class="nav-link" href="{PHP|cot_url('admin')}">{PHP.L.Administration}</a></li>
                    <!-- ENDIF -->
                    <li class="nav-item"><a class="nav-link" href="{PHP.out.loginout_url}"><img src="themes/{PHP.theme}/img/logout.png" alt=""/>{PHP.L.Logout}</a></li>
                    <!-- END: USER -->
                    <li class="nav-item <!-- IF {PHP.env.ext} == 'index' -->active<!-- ENDIF -->"><div class="dropdown-divider"></div><a class="nav-link" href="{PHP|cot_url('index')}">{PHP.L.Home}</a></li>
                    <li class="nav-item <!-- IF {PHP.env.ext} == 'projects' -->active<!-- ENDIF -->"><a class="nav-link" href="{PHP|cot_url('projects')}">{PHP.L.projects_projects}</a></li>
                    <li<!-- IF {PHP.env.ext} == 'marshrut' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('marshrut')}">{PHP.L.hea_claims}</a></li>
                    <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.4.name}</a></li>
                    <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.7.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP.cot_groups.7.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.7.name}</a></li>
                    <!-- IF {PHP.cot_modules.market} -->
                    <li<!-- IF {PHP.env.ext} == 'market' AND !{PHP.type} --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('market')}">{PHP.L.market}</a></li>
                    <!-- ENDIF -->
                    <!-- IF {PHP.cot_plugins_active.calcmarsh} -->
                    <li<!-- IF {PHP.env.ext} == 'calcmarsh' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('calcmarsh')}">{PHP.L.projects_calc}</a></li>
                    <!-- ENDIF -->
                    <li<!-- IF {PHP.env.ext} == 'inway' --> class="active"<!-- ENDIF -->><a class="nav-link" href="{PHP|cot_url('inway')}">{PHP.L.hea_inway}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="header" class="row">
            <div class="col justify-content-center">
                <div class="logo" style="text-align: center"><a href="{PHP|cot_url('index')}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}"><img src="themes/{PHP.theme}/img/logo.png"/></a></div>
            </div>
        </div>
        <!-- END: MOBILE -->

    </div>
		<div id="main" class="container">

<!-- END: HEADER -->