<!-- BEGIN: MAIN -->

<main>
    <section class="landing-hero">
        <div class="container">
            <div class="row">
                <h1 class="title">{PHP.L.home_title1}</h1>
                <h1 class="title">{PHP.L.home_title2}</h1>
            </div>
            <div class="row">
                <p>{PHP.L.home_subtitle}</p>
            </div>
            <div class="row">
                <div class="for-button edge">
                    <a class="btngreen" href="{PHP|cot_url('users','m=regcargo')}">{PHP.L.home_regcargo}</a>
                </div>
                <div class="for-button">
                    <a class="btngreen" href="{PHP|cot_url('users','m=regtransp')}">{PHP.L.home_regtransp}</a>
                </div>

            </div>
        </div>
    </section>
    <section class="landing-best">
        <div class="container con-center">
            <div class="col2">
                <h2>{PHP.L.home_findbest}</h2>
						<span>
                            {PHP.L.home_findbest_subtitle}
						</span>
            </div>
            <div class="col2">
                <div class="getvd">
                    <img src="./images/getvd.jpg"/>
                </div>
            </div>
        </div>
    </section>
    <section class="landing-find">
        <div class="standford"></div>
    </section>
    <section class="landing-work">
        <div class="container con-center">
            <div class="col2">
                <h2>{PHP.L.home_worktitle}</h2>
                <span>{PHP.L.home_worksubtitle}</span>
            </div>
            <div class="col2">
                <div class="getvd">
                    <img src="./images/work.jpg"/>
                </div>
            </div>
        </div>
    </section>
    <section class="landing-cargo">
        <div class="container">
            <div class="row">
                <h2>{PHP.L.home_cargotitle}</h2>
                <span>{PHP.L.home_cargosubtitle}</span>
            </div>
        </div>
    </section>
    <section class="landing-reg">
        <div class="container">
            <div class="row">
                <a class="btngreen" href="{PHP|cot_url('users','m=register')}">{PHP.L.home_beginwork}</a>
            </div>
        </div>
    </section>
</main>

<!-- END: MAIN -->