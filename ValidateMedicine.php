<?php

    session_start();
    

    $connection = mysqli_connect("localhost", "root", "", "medical") or die(mysqli_error($connection));
    $medicine_name = $_POST['medicine_name'];
    $number_of_tablets = $_POST['number_of_tablets'];
    $discount = $_POST['discount'];


    $matched_data_query= "SELECT * FROM name_of_medicine_price WHERE medicine_name='$medicine_name' ";
        
        $matched_data_query_result = mysqli_query($connection,$matched_data_query);
        $matched_data = mysqli_num_rows($matched_data_query_result);

    
    $display_all_data_query= "SELECT id, medicine_name, price FROM name_of_medicine_price";
        
        $display_all_data_query_result = mysqli_query($connection, $display_all_data_query) or die(mysqli_error($connection));
        

    
    if ($matched_data == 1)
    {
        $mached_medicine_price="SELECT price FROM name_of_medicine_price WHERE medicine_name='$medicine_name'";
        $matched_medicine_price_query_result = mysqli_query($connection,$mached_medicine_price); //connect Sql with Database
        $selected_rows = mysqli_fetch_array($matched_medicine_price_query_result);   //to show all the matched data from table
        $r1 = $selected_rows['price'];
        
        $r2= $r1*$number_of_tablets;
        
        $percent_rate = $discount/100;
        $discount_rate = $r2 * $percent_rate;
        $After_discount_rate = $r2 - $discount_rate;
        
    }
    else
    {
        $_SESSION['medicine_name'] = $medicine_name;
        header('location:NotAvailable.php');
    }

/*
    $select_query = "SELECT name, password from signin";
    $select_query_result = mysqli_query($connection,$select_query) or die(mysqli_error($connection));
    $num_of_row_fetched = mysqli_num_rows($select_query_result);
    echo "Data fetched.";
    for($counter=1;$counter<=$num_of_row_fetched;$counter++){
    $data = mysqli_fetch_array($select_query_result);
    echo $data[0].'<br/>';
    echo $data[1].'<br/><br/>';
    }
*/
?>
<html>
<head><title>Medicine details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="font-family:verdana;">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <h2><?php echo "Medicine mached and medicine available'<br>'"; ?>
                </h2>
                <h3><?php 
                    echo "Medicine Name: $medicine_name.'<br>'";
                    echo "Actual price of medicine: $r1.'<br>'";
                    echo "Number of tablets: $number_of_tablets.'<br>'";
                    echo "Total price: $r2.'<br>'";
                    echo "After discount: $After_discount_rate.'<br><br><br>'";

                    ?></h3>
                    <h2>All available medicines:</h2>
                    <table>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Price </th>
                            <?php while($display_all_data_rows = mysqli_fetch_array($display_all_data_query_result)) { ?>
                            <tr>
                                <td><?php echo $display_all_data_rows['id']; ?></td>
                                <td><?php echo $display_all_data_rows['medicine_name']; ?></td>
                                <td><?php echo $display_all_data_rows['price']; ?></td>
                            </tr>
                            <?php } ?>
                        </tr>
                    </table>
            </div>
        </div>
    </div>

</body>
</html>