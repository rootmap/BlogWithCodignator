<h2><?=$post['title']?></h2>
<small class="post-date"><?=$post['created_at']?></small>
<img class="img-responsive"  src="<?=site_url('assets/images/posts/'.$post['post_image']) ?>">
<div class="post-body">
	<?=$post['body']?>
</div>

<hr>
<a class="btn btn-info pull-left" href="<?=base_url('posts/edit/'.$post['slug'])?>">Edit</a>
<br><br>
<?=form_open('posts/delete/'.$post['id'])?>
	<input type="submit" value="Delete" class="btn btn-danger">
<?=form_close()?>