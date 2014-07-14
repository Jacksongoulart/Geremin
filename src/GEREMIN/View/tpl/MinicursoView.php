<a href="#minicursos/<%= _id %>"><div class="live-tile" id="<%= _id %>" data-mode="flip">
    <div style="background-color:#007700;"><font size=10><center><p style="line-height: 100%"><%= nome %></p></center></font></div>
    <div style="background-color:#004400;"><font size=3><p style="line-height: 100%"><%= descricao %></p></font></div>
</div></a>

    <script type="text/javascript">
        $(function () {
            $("#<%= _id %>").liveTile();
        });
    </script> 