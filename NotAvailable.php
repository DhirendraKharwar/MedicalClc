
<?php
    session_start();
    if(!isset($_SESSION['medicine_name']))
    {
    session_destroy();
    header('location:EnterMedicineName.php');
    }
    
    $connection = mysqli_connect("localhost", "root", "", "medical") or die(mysqli_error($connection));
    
    $display_all_data_query= "SELECT id, medicine_name, price FROM name_of_medicine_price";
        
        $display_all_data_query_result = mysqli_query($connection, $display_all_data_query) or die(mysqli_error($connection));
        

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Medicine Not Available</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body  style="font-family:verdana;">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h3>Medicine Not Available: </h3>
                    <h4>
                        <?php 
                            $fn = $_SESSION['medicine_name'];
                            echo "Medicine name: <b>$fn</b>";
                        ?>
                    </h4>
                    <br>
                    <br>
                    <br>
                    
                    <h3>All available medicines:</h3>
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