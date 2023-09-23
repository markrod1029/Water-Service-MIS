<!-- HTML Form -->
<form>
  Price: <input type="text" id="present" name="price"><br>
  quantity: <input type="text" id="previous" name="price"><br>
</form> 

<!-- Display the result -->
<!-- <div id="billing"></div> -->

<input type="text" id="billing" name="price"><br>
<input type="text" id="total" name="price"><br>
<!-- JavaScript to calculate and display the billing -->
<script>
  // Get the input elements
  var quantityInput = document.getElementById('previous');
  var priceInput = document.getElementById('present');

  // Add an input event listener to the input elements
  quantityInput.addEventListener('input', calculateBilling);

  function calculateBilling() {
    // Get the values from the input elements
    var previous = quantityInput.value;

    var price = priceInput.value;

    // Calculate the billing
    var billing = previous * price;

    // Display the result
    document.getElementById('total').value = "Total billing: $" + billing;
  }




</script>