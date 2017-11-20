<h2><?=$title?></h2>

<?=validation_errors()?>


<?=form_open('posts/update')?>
	<input type="hidden" name="id" value="<?=$post['id']?>">
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" id="title" value="<?=$post['title']?>">
  </div>
  <div class="form-group">
    <label for="Category">Category:</label>
    <select name="category_id" class="form-control">
    	<option value="">Please Select category</option>

    	<?php foreach($categories as $cat): ?>
    	<option <?php if($post['category_id']==$cat['id']){ ?> selected="selected" <?php } ?> value="<?=$cat['id']?>"><?=$cat['name']?></option>
    	<?php endforeach; ?>

    </select>
  </div>
  <div class="form-group">
    <label for="body">body:</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="body"><?=$post['body']?></textarea>
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>