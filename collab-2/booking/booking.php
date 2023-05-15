
<?php

$package_id = $_GET['id'];
$user_id = $resul['id'];

?>

<link rel="stylesheet" href="booking/style.css">

<div class="container" style="display: flex; justify-content: center; align-items: center;">
  <!-- form elements -->



  <form action="booking/process_booking.php" method="POST">
    
    <div class="form-group">
        <label for="user_id">User ID:</label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="package_id">Package ID:</label>
        <input type="text" class="form-control" id="package_id" name="package_id" value="<?php echo $package_id; ?>" readonly>
    </div>
    <div class="form-group">
  <label for="num_people">Number of People:</label>
  <input type="number" class="form-control" id="num_people" name="num_people" min="1" value="1" onchange="updateCost()">
</div>
<div class="form-group">
  <label for="total_cost">Total Cost:</label>
  <input type="text" class="form-control" id="total_cost" name="total_cost" value="$<?php echo $row['cost'];?>" readonly>
</div>
    <div class="form-group">
        <label for="payment_method">Payment Method:</label>
        <select class="form-control" id="payment_method" name="payment_method">
        <option value="card">Card</option>    
        <option value="Cash on arrival">Cash on Arrival</option>
            <option value="esewa">eSewa</option>
            
        </select>
    </div>

    <div id="card_fields">
        <div class="form-group">
            <label for="card_number">Card Number:</label>
            <input type="text" class="form-control" id="card_number" name="card_number">
        </div>
        <div class="form-group">
            <label for="expiry_month">Expiry Month:</label>
            <input type="text" class="form-control" id="expiry_month" name="expiry_month">
        </div>
        <div class="form-group">
            <label for="expiry_year">Expiry Year:</label>
            <input type="text" class="form-control" id="expiry_year" name="expiry_year">
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" class="form-control" id="cvv" name="cvv">
        </div>
    </div>

    <div class="form-group" id="esewa_fields" style="display: none;">
        <img id="qr_code_image" src="">
        <p>Scan the QR code above with your eSewa app to complete payment.</p>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    var paymentMethodSelect = document.getElementById("payment_method");
    var cardFieldsDiv = document.getElementById("card_fields");
    var esewaFieldsDiv = document.getElementById("esewa_fields");
    var qrCodeImage = document.getElementById("qr_code_image");

    paymentMethodSelect.addEventListener("change", function() {
        if (paymentMethodSelect.value === "card") {
            cardFieldsDiv.style.display = "block";
            esewaFieldsDiv.style.display = "none";
        } else if (paymentMethodSelect.value === "esewa") {
            cardFieldsDiv.style.display = "none";
            esewaFieldsDiv.style.display = "block";
            // Generate a random data string for the QR code
            var dataString = Math.random().toString(36).substr(2, 8);
            // Set the source of the QR code image to the API endpoint with the data string
            qrCodeImage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + dataString;} else {
cardFieldsDiv.style.display = "none";
esewaFieldsDiv.style.display = "none";
}
});
function updateCost() {
  var numPeople = document.getElementById("num_people").value;
  var packageCost = <?php echo $row['cost']; ?>;
  var totalCost = numPeople * packageCost;
  document.getElementById("total_cost").value = totalCost.toFixed(2);
}
</script>
  </form>
</div>
&nbsp;
&nbsp;
&nbsp;


       
