<!DOCTYPE html>
<html>
<head>
	<title>Dependent Dropdowns in Ajax </title>
</head>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">


<body>
<p style="margin-left: 177px;">Dependent Dropdown in Ajax Using PHP by <a href="https://fb.com/eboominathan"><span>Boominathan</span></a> :)
</div>


<br>
<br>
 <form role="form" class="form-horizontal" >
  <div class="form-group">
    <label class="control-label col-sm-2">Country</label>
    <div class="col-sm-4">
      <select class="form-control countries">
       <option value="">--Select--</option>
     </select>
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2">State</label>
  <div class="col-sm-4">
   <select class="form-control states">
     <option value="">--Select--</option>
   </select>
 </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">City</label>
  <div class="col-sm-4">
   <select class="form-control cities">
     <option value="">--Select--</option>
   </select>
 </div>
 </div>

</form>







<div class="foot">
    <b>Happy to help !</b>
    &copy;<a href="http://www.facebook.com/eboominathan" target="_blank">Boominathan</a>
</div>
</p>



</body>
</html>

<div class="div">
  
</div>

<script type="text/javascript">
	
  $(document).ready(function(){


    /*Get the country list */

      $.ajax({
        type: "GET",
        url: "get_countries.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $('.countries').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.countries').find("option:eq(0)").html("Select Country");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.countries').append(option);
         });  

          /*ends */
          
        }
      });



    /*Get the state list */


    $('.countries').change(function(){
      $.ajax({
        type: "POST",
        url: "get_states.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".states option:gt(0)").remove(); 
      $(".cities option:gt(0)").remove(); 
      $('.states').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('.states').find("option:eq(0)").html("Select State");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.states').append(option);
         });  

          /*ends */
          
        }
      });
    });




    /*Get the state list */


    $('.states').change(function(){
      $.ajax({
        type: "POST",
        url: "get_cities.php",
        data:{id:$(this).val()}, 
          beforeSend :function(){
   
      $(".cities option:gt(0)").remove(); 
      $('.cities').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.cities').find("option:eq(0)").html("Select City");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);
           $('.cities').append(option);
         });  
          
          /*ends */
          
        }
      });
    });




  });





</script>
<style type="text/css">
  
</style>
