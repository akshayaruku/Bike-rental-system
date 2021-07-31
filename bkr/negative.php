<?php
      session_start();
      unset($_SESSION["check"]);
    unset($_SESSION["check2"]);
 
                unset($_SESSION["order"]);

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                elseif(isset($_SESSION['email'])) { 
                    
				include 'database.php';
				$email= $_SESSION["email"];
                $username= $_SESSION["username"];
      ?>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> OOPS Wrong Date</title>
    <style>

        body{
            background-color: black;
            color: white;
            margin: 0px;
            padding: 0px;
            /* display: none; */
        }

       

        header::before{
            background: url(https://c0.wallpaperflare.com/preview/253/954/418/camping-camp-adventure-the-stake.jpg);
            /* without position absolute it wont work z index */
            position: absolute;
            content: "";
            /* when the position is done absolute the top and left should be done 0 to cover spaces */
            top: 0;
            left: 0;
            width: 100%; 
            height: 100%;
            /* Without z-index it won't appear text */
            z-index: -1;
            /* In order to make image light */
            opacity: 0.5;
            animation-name: aruku11;
            animation-duration: 3s;
            animation-iteration-count: 1;
          }

          @keyframes aruku11{
              from{
                  background: url(https://c0.wallpaperflare.com/preview/253/954/418/camping-camp-adventure-the-stake.jpg);
                  width: 0%;
              }
              to{
                  width: 100%;
              }
          }

        .navigation{
            display: flex;
            
            
        }

        .navigation li:hover{
            background-color:white;
            color: black;
           
        }
        .navigation a:hover{
            color: black;
            background-color: yellow;
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
            /* border: 2px solid red; */
            justify-content: center;
            font-size: 2rem;
            
        }

        blockquote {
  background: #ffffff;
  color: black;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
}
blockquote:before {
  color: rgb(0, 0, 0);
  content: open-quote;
  font-size: 4em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}

        
        .grid{
            display: grid;
            grid-template-rows: 1fr ;
            grid-auto-rows: 2fr;
            grid-gap: 4px;
            grid-template-columns: 1fr 2fr 1fr;

        }

        .box{
          background-color: white;
          border: 2px solid black;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="bookvehicle.php"> Book Now</a></li>
                
            </ul>
        </nav>
        <section>
            <h3>OOPS Look's like you have entered wrong dates</h3>
            <blockquote>"To travel is to evolve"</blockquote>
        </section>

        <h3 class="fea"><a href="bookvehicle.php" class="btn">To rent bikes Click here</a></h3>
        
        <br>
        <br>
 
        
        <hr>
    </header>
</body>
</html>
<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>