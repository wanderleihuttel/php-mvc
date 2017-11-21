<?php require APP_ROOT . '/views/inc/header.php' ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
   <h3>Add Post</h3>
   <p>Create a new post</p>
   <form action="<?php echo URL_ROOT; ?>/posts/add" method="post">
      <div class="form-group">
         <label for="title">Title: <sup>*</sup></label>
         <input type="text" name="title" class="form-control form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title']; ?>">
         <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
         <label for="name">Body: <sup>*</sup></label>
<textarea name="body"  class="form-control form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
         <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
      </div>
<input type="submit" class="btn btn-success" value="Submit"/>
   </form>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>
