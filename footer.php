
    <div class="footer">
          <div class="container">
              <div class="infooter">
                <p class="copyright">Copyright &copy; Winners Desenvolvimento de Sites e Sistemas <?php echo date('Y') ?> By Reginaldo Junior</p>
              </div>
            </div>
        </div>

        <script src="http://connect.facebook.net/en_US/all.js"></script>
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

    <!-- Logo após a abertura da tag <body> inseri o trecho de código de carregameto e inicialização do SDK Javascript do Facebook -->
    <div id="fb-root"></div>
    <script>
 
        // A função abaixo vai incluir no cabeçalho do html o carregamento do SDK Javascript do Facebook. 
        (function(d){
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement('script'); js.id = id; js.async = true;
            // Substituí o en_US por pt_BR para usarmos nosso idioma.
            js.src = "//connect.facebook.net/pt_BR/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
 
        // A função abaixo é executada assim que o SDK é carregado.
        window.fbAsyncInit = function() {
            // Essa é a função de inicialização do SDK. É necessário configurar alguns parâmetros na inicialização do SDK.
            FB.init({
              appId      : '413093822207953', // Substitua pela AppID do aplicativo que você criou anteriormente.
              status     : true, // Informa ao SDK que para checar o staus do login do usuário.
              cookie     : true, // Habilita o uso de cokie
              xfbml      : true  // habilita o uso da linguagem XFBML
            });
        };

        function facebookCadastro() {
          FB.login(function(response) {
             if (response.authResponse) {
                usuarioConectado(response.authResponse.userID);
             }
          }, {scope: 'public_profile'});
        }

        function usuarioConectado(id) {
          FB.api('/' + id + '', {fields: 'email, first_name, last_name, gender'}, function(response) {
            $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  nome1: response.first_name,
                  nome2: response.last_name,
                  email: response.email,
              },
              url: "http://api.ciawn.com.br/api/client/?email=xxxxxx&senha=xxxxx",
              success: function(data) {
                console.log(data);
              },
          });
          });
        }
    </script>

</body>
</html>
