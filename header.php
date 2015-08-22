<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_url') ?>">

<script type="text/javascript" src="http://www.ciawn.com.br/app/webroot/js/jquery.min.js"></script>
<script type="text/javascript" src="http://www.ciawn.com.br/app/webroot/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="http://www.ciawn.com.br/app/webroot/js/sidr/jquery.sidr.min.js"></script>
<script type="text/javascript" src="http://www.ciawn.com.br/app/webroot/js/smoothscroll.js"></script>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='//v2.zopim.com/?29Cgb0x8PWQ3X1FKXZXUNJx4D9TjDD5d';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60234652-1', 'auto');
  ga('send', 'pageview');
</script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<?php if (!isset($_SESSION['show_popup']) || $_SESSION['show_popup'] != 1): ?>
<script type="text/javascript">
  // $(window).load(function(){
  //   $('#basicModal').modal('show');
  // });
</script>
<?php $_SESSION['show_popup'] = 1 ?>
<?php endif; ?>

<link rel='shortcut icon' type='image/x-icon' href='/app/webroot/images/favicon.ico' />
</head>

<body>
  <a href="https://github.com/reginaldojunior/snakeice" target="_blank">
    <img 
      style="position: fixed; top: 80px; right: 0; border: 0;z-index: 2;"
      src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67"
      alt="Fork me on GitHub"
      data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png">
  </a>

  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Cadastre-se e fique por dentro das novidades e com desconto exclusivos dos nossos parceiros</h4>
        </div>
        <div class="modal-body">
          <a class="btn btn-block btn-social btn-facebook" onclick="facebookCadastro()"><i class="fa fa-facebook"></i>Cadastro com o Facebook</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="livroModal" tabindex="-1" role="dialog" aria-labelledby="livroModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Encontre diversos Livros de TI</h4>
        </div>
        <div class="modal-body" style="max-height: 500px;overflow-x: auto;">
          <div class="row">
            <div class="col-md-8 form-group" style="padding-left: 50px;">
              <input type="text" class="form-control" placeholder="Search" id="txt-livros">
            </div>
            <a href="javascript:;" class="col-md-3 btn btn-default btn-buscar-livros">Buscar</a>
          </div>
          <hr/>
          <table class="table table-bordered">
            <thead>
              <th>Imagem</th>
              <th>Titulo</th>
              <th>Descrição</th>
              <th>Download</th>
            </thead>
            <tbody id="livros">
            </tbody>
          </table>
          <a href="javascript:;" class="btn btn-info mais-resultados" page="1">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalDownload" tabindex="-1" role="dialog" aria-labelledby="modalDownload" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Baixe o Livro <span id="name"></span></h4>
        </div>
        <div class="modal-body" style="max-height: 500px;overflow-x: auto;">
          <div class="row">
            <div class="col-md-6 col-xs-12" id="img-ebook">

            </div>
            <div class="col-md-6 col-xs-12" id="link-download">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="header">
      <div class="container">
        <div class="logo-menu">
            <div class="logo">
                <h1 style="margin-top: 0px;"><a href="/blog">Winners</a></h1>
              </div>
                <!--<a id="simple-menu" href="#sidr">Toggle menu</a>-->
                <div id="mobile-header">
                  <a class="responsive-menu-button" href="#"><img src="http://www.ciawn.com.br/images/11.png"/></a>
                </div>
              <div class="menu" id="navigation">
                <ul>
                    <?php foreach (get_categories() as $i => $categoria): ?>
                      <?php $category_link = get_category_link($categoria->cat_ID);?>
                      <li><a href="<?php echo $category_link; ?>"><?php echo $categoria->name ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="javascript:;" title="Livros de TI FREE" onclick="ebooksTiOpen()">Livros de TI</a></li>
                </ul>
              </div>
          </div>
        </div>
    </div>
    
    <div class="banner">
      <div class="container">
          <div class="header-text">
              <p class="big-text">Blog Winners</p>
                <h2>Os melhores artigos</h2>
                <p class="small-text">ERP, CMS, E-commerce, Python, PHP, NoSQL e muito mais</p>
            </div>
        </div>
    </div>
