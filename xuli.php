<!-- 

        //lay du lieu

$output ='';
$sql_select = mysqli_connect($conn,"SELECT * FROM add ORDER BY id DESC");
$output .='
     <div class = "table table-responsive">
     <table class = "table table-bordered">
         <tr>
             <td> name </td>
             <td> birthday </td>
         </tr>               

'; 
if(mysqli_num_rows($sql_select) > 0){
    while($rows = mysqli_fetch_array($sql_select)){
        $output .='
             <tr>
                 <td class="fname" data-id1='.$rows["id"].' contenteditable> '.$rows['fname'].'</td>
                 <td class="birthday" data-id2='.$rows["id"].' contenteditable> '.$rows['birthday'].'</td>
             </tr>

        ';
    }
}else{
    $output .='
     <tr>
         <td colspan="2"> du lieu chua co </td>
     </tr>    
    ';
}
$output .='
     </table>
     </div>
 ';    
//  echo $output; -->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="modul.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
       $(document).ready(function() {
            $('#birthday').datepicker({
                dateFormat:"yy-mm-dd",
                showOn: "both",
                buttonText: "Cal"
            });
        });
    </script> 
</head>
<body>
<h1><center>Giao Dien<center></h1>
<br><br><br>
<div>


      <!-- Button to Open the Modal -->
      <button type="button" class="button" data-toggle="modal" data-target="#myModal">
        Add
      </button>

      <!-- The Modal -->
      <div class="container">
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div style="background-color:rgb(240, 190, 98);" class="modal-header">
              <h4 class="modal-title">Add new birthday</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="POST" id="insert_data">
              <div class="modal-body">              
                <div id="container" class="ui-widget">
                  <label>Name&emsp;&emsp;</label>
                    <input type="text" id="fname"><br>
                  <label>Dia chi&emsp; </label> 
                    <input type="text" id="diachi"/>
                </div>              
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="button" name="save" id="button_insert" class="btn btn-danger" data-dismiss="modal" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      </div>
    <!-- <table style="width:70%">
      <tr>
        <th>Name</th>
        <th>Birthday</th>
        <th width="20%">Action</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
            <a href="">Edit</a>-<a href="">Delete</a> 
        </td>
      </tr>
      </table> -->
<div id="load_data" >

</div>




<script type="text/javascript">
      $(document).ready(function() {
        function fetch_data(){
          $.ajax({
                url: "show.php",
                type : 'post',
                
                success: function ($sql_select) {
                  $('#load_data').html($sql_select);
                  fetch_data();
                }
            });
            fetch_data();
        }
        // insert du lieu
        $('#button_insert').on('click',function (){
          var fname = $('#fname').val();
          var diachi = $('#diachi').val();
          if(fname== '' || diachi== ''){
            alert('khong duoc bo trong');
          }else{ 
            $.ajax({
                url: "ajax_action.php",
                type : 'post',
                data:{Fname:fname,Diachi:diachi},
                success: function (result) {
                  alert(result);
                }
            })
          }  
        })
     
    })
</script>

</body>
</html>