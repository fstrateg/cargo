<!-- BEGIN: FOOTER -->
    </div>
</div>
<div id="footer">
	<div class="container">
        <div class="row">
            <div class="col">
                &copy; {PHP|cot_date('Y')} {PHP.cfg.maintitle}
            </div>
            <div class="col text-lg-right">
                <!-- IF {PHP.env.mobile} -->
                <p>mobile</p>
                <!-- ELSE -->
                <p>desctop</p>
                <!-- ENDIF -->
            </div>
        </div>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter29298085 = new Ya.Metrika({
                            id:29298085,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            ut:"noindex"
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/29298085?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
	</div>
</div>

<script type="text/javascript" src="themes/{PHP.theme}/bootstrap/js/bootstrap.min.js"></script>
{FOOTER_RC}
</body>
</html>
<!-- END: FOOTER -->
