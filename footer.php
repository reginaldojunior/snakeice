
    <div class="footer">
          <div class="container">
              <div class="infooter">
                <p class="copyright">Copyright &copy; Winners Desenvolvimento de Sites e Sistemas <?php echo date('Y') ?> By Reginaldo Junior</p>
              </div>
            </div>
        </div>
        <script type="text/javascript">   
        $(document).ready(function() {
          $('#simple-menu').sidr({
            side: 'right'
          });
        });

        $('.responsive-menu-button').sidr({
          name: 'sidr-main',
          source: '#navigation',
          side: 'right'

        });

        $(document).ready(
          function() {
            $("html").niceScroll({cursorborder:"0px solid #fff",cursorwidth:"5px",scrollspeed:"70"});
        });
    </script>

</body>
</html>
