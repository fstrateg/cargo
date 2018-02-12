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
</head>

<body>
		<div class="content">
			<header>
				<div class="container">
                    <div class="row" style="display:table">
                        <div class="col">
                            <a href="/"><img src="/images/logo.png"></a>
                        </div>

                            <!-- IF ({PHP.usr.id}==0) -->
                                <!-- IF ({PHP.env.location} == 'home') -->
                                <ul class="user-links list-inline pull-right">
                                    <li><a href="{PHP|cot_url('users','m=register')}" class="link-signup text-uppercase" id="signup">{PHP.L.Register}</a></li>
                                    <li><a href="{PHP|cot_url('login')}" class="link-login text-uppercase">{PHP.L.Login}</a></li>
                                </ul>
                                <!-- ENDIF -->
                                <!-- IF ({PHP.env.location} == 'users') -->
                            <div class="col cell-middle">
                                <ul class="user-links list-inline pull-right">

                                        <li><span class="gray"><b>{PHP.L.users_hasaccount}</b></span></li>
                                        <li><a href="{PHP|cot_url('login')}" class="link-login text-uppercase">{PHP.L.Login}</a></li>

                                </ul>
                            </div>
                                <!-- ENDIF -->
                            <!-- ENDIF -->
                        </div>
                    </div>

				</div>
			</header>
<!-- END: HEADER -->