<div class="col-md-3">
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
		<div class="panel-body">
			Panel content
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				Sobre
			</h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>
	</div>
</div>