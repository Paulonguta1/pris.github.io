<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
</head>
<style>
    *{
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      font-family: serif;  
    }
    nav{
        left: 0;
        top: 0;
        width: 100%;
        height: 55px;
        background-color:black;
        line-height: 55px;
        padding: 0px 100px;
        position: fixed;
        z-index: 1;

    }
    .nav ul{
        font-size: 30px;
        font-weight: bold;
        letter-spacing: 1.5px;
    }
    nav .logo p{
        margin-left: 0px;
        float: left ;
        color: #fff;
        text-transform: uppercase;
        font-size: 30px;
    }
    nav ul li{
        float: right;
        display: block;
    }
    nav ul li a{
        color: red;
        text-decoration: none;
        font-size: 18px;
        text-transform: uppercase;
        padding: 0px 32px;
    }
    nav ul li a:hover{
        color: white;
    }

</style>
<body>
    <nav>
      <div class="logo">
          <p>PASTOR'S RETIREMENT SYSTEM-MFA</p>
      </div>
      <ul>
          <li><a href="index.php?logout='1'" >LOGOUT</a></li>
      </ul>

    </nav>

</body>
</html>
