<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container"><div class="row">

<div class="col col-12 col-sm-4  "></div>
<div class="col col-12 col-sm-4  "></div>
<form method="POST">
    <table class="table table-borderless"><tr>
        <td>Book name</td>
        <td><input class="form-control"  name="bname" type="text"></td>
    </tr><tr>
        <td></td>
       <td><button class="btn btn-success" name="btn">SEARCH</button></td>
    </tr></table>
    <div class="col col-12 col-sm-4  "></div>
</form>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
     $bookname=$_POST['bname'];
     $connection=new mysqli("localhost","root","","bookdemo");
     $sql="SELECT `id`, `title`, `author`, `price` FROM `books` WHERE `title`='$bookname'";
     $result=$connection->query($sql);

     if($result->num_rows>0)
     {
       while($row=$result->fetch_assoc())
       {      
            $getauthor=$row['author'];
    
           $getprice=$row['price'];
           $getid=$row['id'];
          echo" <form method='POST'> <table class='table'><tr>
          <td></td>
          <td> <input name='id' type='hidden' value='$getid' class='form-control'></td>
      </tr><tr>
              <td>Author</td>
              <td> <input type='text' value='$getauthor' class='form-control'></td>
          </tr>
          <tr>
              <td>Price</td>
              <td>  <input type='text' value='$getprice' class='form-control'></td>
          </tr>
          <tr>
        <td></td>
       <td><button name='delbtn' class='btn btn-danger'>DELETE</button></td>
    </tr></table> </form>";
       }
     }
     else
     {
         echo"No book has found";
     }
}

if(isset($_POST['delbtn']))
{
    $newid=$_POST['id'];
    $connection=new mysqli("localhost","root","","bookdemo");
   $sql="DELETE FROM `books` WHERE `id`=$newid"; 

   $result=$connection->query($sql);
   if($result===true)
   {
       echo"Deleted Successfully";
   }
   else
   {
    echo"Something wrong";
   }
   
}
?>