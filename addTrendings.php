<div id="abcd">
  <form action="<?php echo htmlspecialchars('addTrendingsToDB.php'); ?>" method="POST" class="form-group">
    <div class="row">
      <div class="col-25">
          <label for="title">Title :</label>
      </div>
      <div class="col-75">
          <input type="text" name="title"><br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
          <label for="description">Description :</label>
      </div>
      <div class="col-75">
          <textarea name="description" rows="8" cols="80"></textarea>
      </div>
    </div>
      <div style="width: 30px; margin: 0 auto;">
          <button  class="button btnFade btnBlueGreen" type="submit" name="button">ADD</button>
      </div>
  </form>
</div>
