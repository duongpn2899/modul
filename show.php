<?php
    $conn = mysqli_connect("localhost","root","","birthday");   
    $output = '';
    $sql_select = mysqli_query($connect, "SELECT * FROM add ORDER BY id DESC");
    $output .= '
      <div class="table table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>name</td>
              <td>birthday</td>
              
            </tr>
         
     
    ';

    if(mysqli_num_rows($sql_select) > 0 ){
        while($rows = mysqli_fetch_array($sql_select)){
          $output .= '
            <tr>
              
              <td class= "fname" data-id1='.$rows["id"].' contenteditable>'.$rows["fname"].'</td>
              <td class= "birthday" data-id2='.$rows["id"].'  contenteditable>'.$rows["birthday"].'</td>
              
            </tr>
          
          
          ';
        }
    }else{
      $output .= '
        <tr>
                <td colspan = "2">du lieu chua co</td>
        </tr>';
    }
    $output .= ' 
    
    </table> </div>
    ';
    echo $output;
?>