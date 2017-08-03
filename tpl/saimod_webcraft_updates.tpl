<div class="row-fluid">
    <div class="col-md-12 sai_padding_off">
        <h4>&nbsp;<span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;<b>Webcraft Updates</b></h4>
    </div>
</div>
<div class="row-fluid">
    <div class="col-md-12 sai_padding_off">
        <hr>
    </div>
</div>
<div class="row-fluid">
    <div class="col-md-12">
        <h3>Updates</h3>
        <table style="width: 100%" class="sai_table">
            <tr>
                <th>time</th>
                <th>commit</th>
                <th>commit_last</th>
                <th>complete</th>
            </tr>
            ${updates}
        </table>
        <hr>
        <h4 style="word-break: break-all;">Commits of Update ${update}</h4>
        <table style="width: 100%;" class="sai_table">
            <tr>
                <th>time</th>
                <th>author</th>
                <th>log</th>
                <th>commit</th>
            </tr>
            ${update_commits}
        </table>
        <hr>
        <h4 style="word-break: break-all;">Projects of Update ${update}</h4>
        <table style="width: 100%;" class="sai_table">
            <tr>
                <th>time</th>
                <!--<th>update</th>-->
                <th>path</th>
                <th>git</th>
                <!--<th>commit</th>-->
                <!--<th>commit_last</th>-->
            </tr>
            ${projects}
        </table>
        <hr>
        <h4 style="word-break: break-all;">Commits of Project ${project}</h4>
        <table style="width: 100%;" class="sai_table">
            <tr>
                <th>time</th>
                <th>author</th>
                <th>log</th>
                <th>commit</th>
            </tr>
            ${commits}
        </table>
    </div>
</div>
