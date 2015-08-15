<div class="col-md-3 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				Categorias
			</h3>
		</div>
		<div class="panel-body">
			<ul class="list-group">
			<?php foreach (get_categories() as $i => $categoria): ?>
			  <li class="list-group-item">
			    <span class="badge"><?php echo $categoria->count ?></span>
                <?php $category_link = get_category_link($categoria->cat_ID);?>
			    <a href="<?php echo $category_link ?>"><?php echo $categoria->name ?></a>
			  </li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				Publicidade
			</h3>
		</div>
		<div class="panel-body" style="text-align: center;">
			<!-- LOMADEE - BEGIN -->
			<script type="text/javascript" language="javascript">
				lmd_source="32124469";
				lmd_si="33829858";
				lmd_pu="22702089";
				lmd_c="BR";
				lmd_wi="160";
				lmd_he="600";
			</script>
			<script src="http://image.lomadee.com/js/ad_lomadee.js" type="text/javascript" language="javascript"></script>
			<!-- LOMADEE - END -->
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				Sobre
			</h3>
		</div>
		<div class="panel-body">
			<?php 
			$author = get_the_author(); 
			?>
			<p><strong>By:</strong> <?php echo $author ?></p>
		</div>
	</div>
</div>