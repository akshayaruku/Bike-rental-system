<?php
				session_start();
                unset($_SESSION["check"]);

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                elseif(isset($_SESSION['email'])) { 
                    
				include 'database.php';
                header("Location: index.php");
                }
                else{

                
				
                ?>
                
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login and Rent your Bike</title>
   <style>

        body{
            background-color: black;
            color: white;
            margin: 0px;
            padding: 0px;
            
        }

     

        header::before{
            background: url(images/background.jpg);
            background-size: cover;
            /* without position absolute it wont work z index */
            position: absolute;
            content: "";
            /* when the position is done absolute the top and left should be done 0 to cover spaces */
            top: 0;
            left: 0;
            width: 100%; 
            height: 100vh;
            /* Without z-index it won't appear text */
            z-index: -1;
            /* In order to make image light */
            opacity: 0.5;
            
          }


        .navigation{
            display: flex;
            
            
        }

        .navigation li:hover{
            background-color:black;
            color: black;
           
        }
        .navigation a:hover{
            color: black;
            background-color: bisque;
        }

        .navigation  a{
            padding: 3px 3px;
            text-decoration: none;
            color: white;
           
        }

        li{
            margin: 20px 30px;
            padding: 8px 8px;
            list-style: none;

        }
        section{
            display: flex;
            flex-direction: column;
            margin: 3px 24px;
            align-items: center;
            height: 344px;
           /* border: 2px solid red;*/
            justify-content: center;
            font-size: 2rem;
            
        }

        blockquote {
  background: #ffe4c4;
  color: black;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
}

blockquote p {
  display: inline;
}

        .prop{
            color: black;
        }

        a{
            text-decoration: none;
        }
        a:hover{
            color: rgb(97, 3, 3);
            background-color: rgb(201, 204, 19);
        }

     

        .btn{
            
            background-color: white ;
            color: black;
            padding: 6px;
            text-decoration: none;
            border: none;
            font-size: large;
            cursor: pointer;
            margin: 1px;
            border-radius: 4px;
            align : center;
           
        }

        .btn:hover{
            background-color: blanchedalmond;
        }
        
        .fea{
            font-size: 30px;
            text-align:  center;
        }
        

    </style>
</head>
<body>
    <header class="test">
        <nav class="navbar">
            <ul class="navigation">
                <li><a href="log2.php">Login</a></li>
                <li><a href="sign.php"> Signup</a></li>
                
                
            </ul>
        </nav>
        <section>
            <blockquote>The Best Two-Wheelers For You...</blockquote>
            <h3>Login to rent a Bike !</h3>
        </section>

       
        
        <br>
        <br>
 
    </header>
</body>
</html>
<?php
                }
                ?>