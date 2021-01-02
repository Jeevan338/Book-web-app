<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="POST">
       <div class="container"> 
           <div class="row">   
               <div class="col col-12 col-sm-2"> </div>
               <div class="col col-12 col-sm-8"> </div>
               <table class="table table-borderless">
                   <tr>
                       <td>Book Name</td>
                       <td><input class="form-control" name="bname" type="text"></td>
                   </tr>
                   <tr>
                       <td>Author</td>
                       <td><input class="form-control" name="author" type="text"></td>
                   </tr>
                   <tr>
                       <td>Price</td>
                       <td><input class="form-control" name="price" type="text"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><button class="btn btn-primary" name="btn">REGISTER</button>
                       </td>
                   </tr>
               </table>
               <div class="col col-12 col-sm-8"> </div>     
   </form> 
</body>
</html>
<?php
if(isset($_POST["btn"]))
{
$bn=$_POST["bname"];
$a=$_POST["author"];
$p=$_POST["price"];
//echo $bn;
//echo $a;
//echo $p;
$connection=new mysqli("localhost","root","","bookdemo");
$sql="INSERT INTO 'books'( 'title', 'author', 'price') VALUES ('$bn','$a','$p')";
$result = $connection->query($sql);
 if($result === true)
 {
     echo "SUCCESS";

 }
 else
 {
     echo "NOT SUCCESS";
 }
}
?>