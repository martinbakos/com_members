<?php
require "../../includes/db.inc.admin.php";
 $output = '';
 $sql = "SELECT * FROM members WHERE disabled ='0'";

 if(isset($_POST["order"]))
 {
  $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
  ';
 }
 else
 {
  $sql .= 'ORDER BY id DESC ';
}




 $result = mysqli_query($conn, $sql);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="5%">Id</th>
                     <th width="10%">Meno a Priezvisko</th>
                     <th width="10%">Používateľské meno</th>
                     <th width="5%">Password</th>
                     <th width="10%">Mesto/Obec</th>
                     <th width="10%">Email</th>
                     <th width="10%">Telefón/Mobil</th>
                     <th width="10%">Funkcia</th>
                     <th width="10%">Dátum registrácie</th>
                     <th width="5%">-</th>
                </tr>';
 $rows = mysqli_num_rows($result);

 $output .= '
   <tr>
     <td></td>
     <td id="name" contenteditable></td>
     <td id="username" contenteditable></td>
     <td id="password" contenteditable></td>
     <td id="town" contenteditable></td>
     <td id="email" contenteditable></td>
     <td id="phone" contenteditable></td>
     <td id="funkcia" contenteditable></td>
     <td></td>
     <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Pridať</button></td>
    </tr>';

    while($row = mysqli_fetch_array($result))
      {
        $createdate = strtotime( $row['createDate'] );
        $createdate = date("d. m. Y", $createdate);
           $output .= '
                <tr>
                     <td>'.$row["id"].'</td>
                     <td class="name" data-id1="'.$row["id"].'" contenteditable>'.$row["name"].'</td>
                     <td>'.$row["username"].'</td>
                     <td class="password" data-id3="'.$row["id"].'" contenteditable></td>
                     <td class="town" data-id4="'.$row["id"].'" contenteditable>'.$row["town"].'</td>
                     <td class="email" data-id5="'.$row["id"].'" contenteditable>'.$row["email"].'</td>
                     <td class="phone" data-id6="'.$row["id"].'" contenteditable>'.$row["phone"].'</td>
                     <td class="funkcia" data-id8="'.$row["id"].'" contenteditable>'.$row["funkcia"].'</td>
                     <td> '.$createdate.'</td>
                     <td><button type="button" name="delete_btn" data-id9="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Zablokovať</button></td>
                </tr>
           ';
      }




 $output .= '</table>
      </div>';
 echo $output;



 ?>
