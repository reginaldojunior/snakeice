
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300,200' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_url') ?>">

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.ninescroll.min.js"></script>
<script type="text/javascript" src="jquery.sidr.min.js"></script>
<script type="text/javascript" src="smoothscroll.js"></script>

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

</head>

<body>
  <a href="https://github.com/reginaldojunior/snakeice" target="_blank"><img style="position: fixed; top: 0; right: 0; border: 0;z-index: 2;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
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
