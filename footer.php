  <script>
    function detailsmodal(id){
      var data = {"id" : id};
      jQuery.ajax({
        url :'/loginsystem/includes/detailsmodal.php',
        method : "post",
        data : data,
        success: function(data){
          jQuery('body').append(data);
          jQuery('#details-modal').modal('toggle');
        },
        error: function(){
          alert("Somethng went wrong");
        }
      });
    }

    function update_cart(mode,edit_id){
      var data = {"mode" : mode, "edit_id" : edit_id};
      jQuery.ajax({
        url : '/loginsystem/update_cart.php',
        method : 'post',
        data : data,
        succes :function(){location.reload();},
        error : function(){alert("Something went wrong !");},
      });
    }

    function add_to_cart(){
      jQuery('#modal_errors').html("");
      var quantity = jQuery('#quantity').val();
      var available = parseInt(jQuery('#available').val());
      var error = '';
      var data = jQuery('#add_product_form').serialize();
      if(quantity == '' || quantity == 0){
        error += '<p class="text-danger text-center">You must choose the quantity !</p>';
        jQuery('#modal_errors').html(error);
        return;
      }else if(quantity>available){
        error += '<p class="text-danger text-center">There are only '+available+' tickets available !</p>';
        jQuery('#modal_errors').html(error);
        return;
      }else{
        jQuery.ajax({
          url : '/loginsystem/add_cart.php',
          method : 'post',
          data : data,
          succes : function(){
                location.reload();
            },
          error : function(){
            alert("Something went wrong!");} 
        });
      }

    }
  </script>
  </body>
</html>


