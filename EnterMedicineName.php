
<!DOCTYPE html>
<html>
    <head>
        <title>HTML5 Medicine validations</title>
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
                    <h4>Medicine Price Count Desktop</h4>
                    <form method="POST" action="ValidateMedicine.php">
                        <div class="form-group">
                            <label>Enter madicine name</label>
                            <input class="form-control" placeholder="" name="medicine_name"  required = "true">
                        </div>
                        <div class="form-group">
                            <label>Number of Tablets</label>
                            <input type="number" class="form-control"  placeholder="" pattern=""  name="number_of_tablets" required = "true">
                        </div>
                        <div class="form-group">
                        <label>Discount in %</label>
                            <input type="number" class="form-control" placeholder="" pattern="" name="discount" >
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Count</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>