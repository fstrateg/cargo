<!-- BEGIN:MAIN -->
<h3>{PHP.L.usersverif_title}</h3>
<table>
    <tbody>
        <!-- BEGIN:ROW -->
        <tr>
            <td>{UVER_NUM}</td>
            <td>{UVER_NICKNAME}</td>
            <td>{UVER_DAT}</td>
            <td>{UVER_FIZ}</td>
            <td>{UVER_TAXNUMBER}</td>
            <td><!-- IF {UVER_PASSURL} -->
                <div class="row">
                    <div class="span1">
                        <a href="{UVER_PASSURL}" target="_blank">
                            <img src="{UVER_PASSURL}" width="100px" height="80px" alt="{PHP.L.usersverif_docpas}"/>
                        </a>
                    </div>
                    <div class="span1">
                        <p><a class="btn btn-success" href="{UVER_AC_PS}">{PHP.L.usersverif_accept}</a></p>
                        <p><a class="btn btn-warning" href="{UVER_RJ_PS}">{PHP.L.usersverif_reject}</a></p>
                    </div>
                </div>
                <!-- ENDIF -->
            </td>
            <td><!-- IF {UVER_SVURL} -->
                <div class="row">
                    <div class="span1">
                        <a href="{UVER_SVURL}" target="_blank">
                            <img src="{UVER_SVURL}" width="80px" height="60px" alt="{PHP.L.usersverif_docsv}"/>
                        </a>
                    </div>
                    <div class="span1">
                        <p><a class="btn btn-success" href="{UVER_AC_SV}">{PHP.L.usersverif_accept}</a></p>
                        <p><a class="btn btn-warning" href="{UVER_RJ_SV}">{PHP.L.usersverif_reject}</a></p>
                    </div>
                </div>
                        <!-- ENDIF -->
            </td>
        </tr>
        <!-- END:ROW -->
    </tbody>
    <thead><tr>
        <th>{PHP.L.usersverif_num}</th>
        <th>{PHP.L.usersverif_user}</th>
        <th>{PHP.L.usersverif_dat}</th>
        <th>{PHP.L.usersverif_registeras}</th>
        <th>{PHP.L.usersverif_taxnumber}</th>
        <th>{PHP.L.usersverif_docpas}</th>
        <th>{PHP.L.usersverif_docsv}</th>
    </tr></thead>
</table>
<!-- END:MAIN -->s