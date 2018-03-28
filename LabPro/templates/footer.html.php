
	<div class="container">
	  <!-- Site footer -->
      <footer class="footer">
        <p>&copy; MVC + Smarty + Bootstrap + Utrata szansy na moje zdanie ZPAI 2018</p>
      </footer>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="http://{$smarty.server.HTTP_HOST}{$subdir/js}/jquery.min.js"></script>

    <script src="./js/bootstrap.min.js"></script>
	<!-- JQuery Plugins -->
	{foreach $customScript as $script}
		<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/{$script}.js"></script>
			{/foreach}
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir/js}Klient.js"></script>
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir/js}jquery.cookie.js"></script>
	<script src="./js/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://{$smarty.server.HTTP_HOST}{$subdir/js}bootstrap.min.js"></script>

  </body>
</html>