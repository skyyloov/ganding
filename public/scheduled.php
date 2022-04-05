<?php $idpo = $_GET["nilai"]; ?>
<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Data</h4>
        </div>
        <div class="modal-body">
          <form action="http://localhost:8080/gands/public/delivery/saveschedule" method="post">
             <input type="hidden" value="<?= $idpo; ?>" name="idpo" id="valval">
             <div class="input-group mb-3">
  <button class="btn btn-outline-secondary" type="button" id="buton">Submit</button>
  <input type="text" autofocus="autofocus" autocomplete="off"  class="form-control" id="quantity" name="qty" placeholder="Input Rencana Quantity Dalam Sekali Pengiriman~" aria-label="Example text with button addon" aria-describedby="button-addon1" required>
</div>
<span id="pesann"></span>
           <div class="form-group tanggal">

           </div>

           <button type="submit" name="submit" class="btn btn-xs btn-success">Submit Schedule</button>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      
           
    $("#quantity").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesann").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
      
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {      
    $("#buton").click(function(data){
       var date = $('#quantity').val();
       var dati = $('#valval').val();
      $('.tanggal').load('http://localhost:8080/gands/public/tanggal.php?id=' + date + '&date=' + dati);
    });
      
    });
</script>