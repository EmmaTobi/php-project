<?php
  // echo  __FILE__ . '<br>';
  // echo  __LINE__ . '<br>';
  // echo  __DIR__ . '<br>';
  // echo file_exists(__FILE__) . '<br>';
  // if(is_file(__DIR__)){
  //     echo "yes it is a file".'<br>';
  // }else{
  //   echo "no it is not a file".'<br>';
  // };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .center{
      position: relative;
      border: 1px solid black;
    }
    .form-center{
      position:absolute;
      top: 50%;
      left: 50%;
      width: 500px;
      height: 500px;
      border: 1px solid black;
      transform:translateX(-250px) translateY(50px);
      margin-left: 50px auto;
    }
    .label-control{
      position: absolute;
      top: 30px;
      width: 5%;
      font-size: 20px;
      line-height: 30px;
      padding: 0 20px;
      z-index: 9999;
      transition: all 400ms linear;
    }
    .form-control{
      margin: 10px 10px;
      width: 100%;
      height: 50px;
      border-radius: 12px;
      display: inline-block;
      transition: all 400ms linear;
    }
    .form-control:focus   
    .,label-control {
      background-color: black;
      top: -20px;
    }

    .submit-btn{
      color: white;
      background-color: blue;
      border: 0px;
      border-radius: 12px;
      padding: 5px 20px 5px 20px;
      margin: 10px 10px 10px 10px;
      transition: all 400ms ease-in-out;
    }
    .submit-btn:hover,
     .submit-btn:focus,
     .submit-btn:active{
      border: 0px;
      color: black;
      background-color: brown;
      outline: none; 
      }

     .submit-btn:focus{
      box-shadow: 0px 0px 12px 2px greenyellow;
    }
    .form-magic{
      background-color: greenyellow;
    }
  </style>
</head>
<body>
  <div class="center">
      <form class="form-center" action="test.php" method="get">
         
         <div class="form-magic">
            <input class="form-control" type="text">
            <label class="label-control" for="name">Name: </label>
         </div>
         <button class="submit-btn" type="submit">Enter</button>   
      </form>
  </div>
</body>
</html>