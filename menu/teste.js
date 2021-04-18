
$(document).ready(function() {


      var quantity = 0;
      var var_in = 0;
      var tax;
      $('.quantity-right-plus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          quantity = parseInt($('#quantity').val());
          
            // If is not undefined
              // Increment
              max = parseInt($('#quantity').attr('max'));
              if(quantity<max){
                var_in = quantity + 1;
                $('#quantity').val(var_in);
              }
      });

        $('.quantity-left-minus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          quantity = parseInt($('#quantity').val());
          
          // If is not undefined
        
              // Increment
              if(quantity>0){
                var_in = quantity - 1;
              $('#quantity').val(var_in);
              }
      });
      
      $(function () {
        $("input").keydown(function () {
          max = parseInt($(this).attr('max'));
          min = parseInt($(this).attr('min'));
          // Save old value.
          if (!$(this).val() || (parseInt($(this).val()) <= max && parseInt($(this).val()) >= min))
          $(this).data("old", $(this).val());
          
          var_in = $(this).val();
        });
        $("input").keyup(function () {
          max = parseInt($(this).attr('max'));
          min = parseInt($(this).attr('min'));
          // Check correct, else revert back to old value.
          if (!$(this).val() || (parseInt($(this).val()) <= max && parseInt($(this).val()) >= min))
            ;
          else
            $(this).val($(this).data("old"));
          
            var_in = $(this).val();
        });
      });

  //cin_value
  var cin = $('#cin').html();
 
  /* Set rates + misc */
  var taxRate = 0.05;
  var fadeTime = 300;
   
   
  /* Assign actions */
  $('.product-quantity input').change( function() {
    updateQuantity(this);
  });
   
  $('.product-removal button').click( function() {
    removeItem(this);
  });
   
  
  /* Recalculate cart */
  function recalculateCart()
  {
    var subtotal = 0;
     
    /* Sum up row totals */
    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').text());
    });
     
    /* discount */
    var shipping = var_in*subtotal*taxRate;

    /* Calculate totals */
    var total = subtotal - shipping;

    /* points accumulated */
    tax = total * taxRate;
    tax = Math.round(tax);
     
    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
      $('#cart-subtotal').html(subtotal.toFixed(2));
      $('#cart-tax').html(Math.round(tax.toFixed(2)));
      $('#cart-shipping').html(shipping.toFixed(2));
      $('#cart-total').html(total.toFixed(2));
      if(total == 0){
        $('.checkout').fadeOut(fadeTime);
      }else{
        $('.checkout').fadeIn(fadeTime);
      }
      $('.totals-value').fadeIn(fadeTime);
    });
  }
   
  //submit button
    $('.checkout').click(function(e){
        $.post("api.php",
          {
            cin: cin,
            points_DB:max,
            points_used: var_in,
            points_acc: tax
          }, function(res){
            if(res == "success"){
              alert("Points updated");
              window.location.href="/pi_rfid/";
            }else if(res == "fail"){
              alert("Error updating points");
            }else{
              alert("Error not known");
            }
        });
    });

   
  /* Update quantity */
  function updateQuantity(quantityInput)
  {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;
     
    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function () {
      $(this).fadeOut(fadeTime, function() {
        $(this).text(linePrice.toFixed(2));
        recalculateCart();
        $(this).fadeIn(fadeTime);
      });
    });  
  }
   
  });
   
  