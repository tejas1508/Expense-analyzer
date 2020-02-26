<div id="form">
  <form class="form-group" action="piechart.php" method="post">
    <div class="row">
      <div class="col-25">
          <label for="month">Select month :</label>
      </div>
      <div class="col-75">
        <select class="" name="month">
          <option value="jan">January</option>
          <option value="feb">February</option>
          <option value="march">March</option>
          <option value="april">April</option>
          <option value="may">May</option>
          <option value="june">June</option>
          <option value="july">July</option>
          <option value="aug">August</option>
          <option value="sept">September</option>
          <option value="oct">October</option>
          <option value="nav">November</option>
          <option value="dec">December</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="year">Year :</label>
      </div>
      <div class="col-75" id="yearDD">
        <input type="text" name="year">
      </div>
    </div>
    <div class="row">
      <button type="submit" name="button" class="button btnFade btnBlueGreen">Analyze</button>
    </div>
  </form>
</div>
<!-- <script type="text/javascript">

    var selectEle = document.createElement("select");
    for (var i = 1960; i < 2010; i ++) {
      var option = document.createElement("option");
      option.text = i;
      option.value = i;
      selectEle.appendChild(option);
    }

    document.getElementById("yearDD").appendChild("selectEle");
</script> -->
<?php echo "string"; ?>
