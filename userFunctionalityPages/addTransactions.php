<form class="form-group" action="<?php echo htmlspecialchars('userFunctionalityPages/addTransactionToDB.php'); ?>" method="post" id="abcd">
  <h3>Add a new expense</h3>
  <div class="row">
    <div class="col-25">
        <label for="name" class="">Name :</label>
    </div>
    <div class="col-75">
        <input type="text" name="name" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="amount" class="">Amount :</label>
    </div>
    <div class="col-75">
        <input type="text" name="amount" placeholder="in months" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="paid_to" class="">Paid to :</label>
    </div>
    <div class="col-75">
        <input type="text" name="paid_to" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="date" class="">Date :</label>
    </div>
    <div class="col-75">
        <input type="date" name="date" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="type" class="">Type :</label>
    </div>
    <div class="col-75" id="efg">
        <select id="dropdown" class="" name="type">
          <option value="bill">Bill</option>
          <option value="policy">Policy</option>
          <option value="loan">Loan</option>
          <option value="food">Food</option>
          <option value="travel">Travel</option>
          <option value="health">Health & Medicine</option>
          <option value="other">Other</option>
        </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="recurrence" class="">Recurrence(for bills,loans,policies) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="text" name="recurrence" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="tamount" class="">Total amount(for loan) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="text" name="tamount" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="startdate" class="">Start date(for loan) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="date" name="startdate" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="enddate" class="">End date(for loan,policy) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="date" name="enddate" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="famount" class="">Final amount(for Policy) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="text" name="famount" class="">
    </div>
  </div>
  <div class="row">
    <div class="col-25" id="labelArea">
      <label for="t_description" class="">Description(for other) :</label>
    </div>
    <div class="col-75" id="inputArea">
      <input type="text" name="t_description" class="">
    </div>
  </div>
  <div style="width: 30px; margin: 0 auto;">
      <button  class="button btnFade btnBlueGreen" type="submit" name="button">Submit</button>
  </div>
</form>
