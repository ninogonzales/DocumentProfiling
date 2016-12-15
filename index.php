<!-- Log In Page -->
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Document Profiling</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <style>

        html { 
        background: url('background.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }


        </style>
    </head>
    <body style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center;" background="background.jpg">
     
        <div class="col-sm-2">
        </div>
 
        <div class="col-sm-8">
            <div style="color:white;">
        <h1>Document Profiling</h1>
        <h2>Nino Gonzales</h2><br/><br/>
            </div>

        
        <!-- Log In Form -->
        
        <div class = "panel panel-default" style=" margin-left:25%; margin-right:25%;">
   <div class = "panel-body">
            <form action="profile.php" method="post" class="form-horizontal" style="display:inline-block;">
                <div class="form-group">
                    <label>Email </label>
                <br /><input type="email" class="form-control" name="email" style="width: 300px;" required />
                </div>
                
                <div class="form-group">
                    <label>Password</label> 
                <br /><input type="password" class="form-control" name="password" style="width: 300px;" required />
                </div><br/>
                
                <input type="submit" class="btn btn-default" name="submit" value="Sign In" />
            </form>   
        </div>
        </div>
        </div>
     
        <div class="col-sm-2">
        </div>
    </body>
</html>
