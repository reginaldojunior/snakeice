
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
                  senha: response.email + response.last_name
              },
              url: "http://api.ciawn.com.br/api/client/?email=xxxxxx&senha=xxxx",
              success: function(data) {
                $('#basicModal').modal('hide');
              },
            });
          });
        }

        function ebooksTiOpen() {
          $('#livroModal').modal('show');
        }

        function showModalDownload(id) {
          $.ajax({
            type: "GET",
            dataType: "json",
            url: "http://it-ebooks-api.info/v1/book/" + id,
            success: function(data) {
              $('#img-ebook').html('<img src="' + data['Image'] + '" width="80" height="80"/>');
              $('#name').html(data['Title']);
              $('#link-download').html('<a href="' + data['Download'] + '" target="_blank">Download</a>');

              $('#modalDownload').modal('show');
            },
          });
        }

        $('.btn-buscar-livros').click(function(){
          var tags = $('#txt-livros').val()
            , html = ''
          ;

          $.ajax({
            type: "GET",
            dataType: "json",
            url: "http://it-ebooks-api.info/v1/search/" + tags,
            success: function(data) {
              $.each(data['Books'], function(i, item) {
                html += '<tr>';
                html +=   '<td><img src="' + item['Image'] + '" width="80" height="80"/></td>';
                html +=   '<td>' + item['Title'] + '</td>';
                if (item['SubTitle'] == undefined){
                  html +=   '<td> Não disponivel descrição </td>';
                } else {
                  html +=   '<td>' + item['SubTitle'] + '</td>';
                }
                html +=   '<td><a id="' + item['ID'] + '" class="btn btn-default" href="javascript:;" onclick="showModalDownload('+ item['ID'] +');" role="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>';
                html += '</tr>';
              });
              
              $('#livros').html(html);
            },
          });
        });

        $('.mais-resultados').click(function(){
          var tags = $('#txt-livros').val()
            , html = ''
            , page = $(this).attr('page');
          ;

          page = parseInt(page) + 1;
          $(this).attr('page', page);

          $.ajax({
            type: "GET",
            dataType: "json",
            url: "http://it-ebooks-api.info/v1/search/" + tags + "/page/" + page ,
            success: function(data) {
              $.each(data['Books'], function(i, item) {
                html += '<tr>';
                html +=   '<td><img src="' + item['Image'] + '" width="80" height="80"/></td>';
                html +=   '<td>' + item['Title'] + '</td>';
                html +=   '<td>' + item['SubTitle'] + '</td>';
                html +=   '<td><a id="' + item['ID'] + '" class="btn btn-default" href="javascript:;" onclick="showModalDownload('+ item['ID'] +');" role="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>';
                html += '</tr>';
              });
              
              $('#livros').append(html);
            },
          });
        });
    </script>

</body>
</html>
