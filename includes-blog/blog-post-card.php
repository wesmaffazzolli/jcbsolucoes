<!-- Blog Post -->
<div class="card mb-4">
	<img class="card-img-top" src="img/novidades/<?php if(isset($post_image)){echo $post_image;}else{echo 'imagem-nao-disponivel.png';} ?>">
	<div class="card-body">
	  <h2 class="card-title"><?php if(isset($post_title)) {echo $post_title;}else{echo "Novidade em construção...";} ?></h2>
	  <p class="card-text"><?php if(isset($post_content)) {echo $post_content;} ?></p>
	  <a href="blog-post.php?p_id=<?php echo $post_id; ?>" class="btn btn-jcb">Saiba mais &rarr;</a>
	</div>
</div>