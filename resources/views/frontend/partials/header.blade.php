<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Cafe</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

        *{
            margin : 0;
            padding : 0;
            min-hieght :100vh;
            font-family: "Montserrat", sans-serif;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: #ffffff; /* Background color for header */
            color: #ff5722; /* Text color for header */
        }

        .container{
            display : flex;
            justify-content : space-around;
            align-items : center;
            width : 100%;
            height : 70px;
            border-bottom : 5px solid #1154cc;
        }

        .logo a{
            text-decoration : none;
            color : black;
            font-weight : bold;
            font-size : 20px;
            margin-left : -37px;
            cursor : pointer;
        }

        .nav a{
            text-decoration : none;
            padding-bottom : 2px;
            margin-right : 70px;
            color : black;
            font-weight : 550;
            position : relative;
            cursor : pointer;
        }

        .nav a::before{
            position : absolute;
            content : '';
            top: 100%;
            left : 0;
            height : 2px;
            width : 0%;
            background : black;
            transition : all ease 0.4s;
        }

        .nav a:hover::before{
            width : 100%;
        }

        /* Dropdown styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: calc(10% + 5px); /* Adjusting position slightly */
            left: 45%;
            background-color: #253031; /* Background color for dropdown menu */
            color: #ffffff; /* Text color for dropdown menu */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav a:hover + .dropdown-menu,
        .dropdown-menu:hover {
            display: block;
            opacity: 1;
        }

        .dropdown-menu a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 0;
            transition: all 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: #f7c137;
            position: absolute;
            color: #253031;
        }
         .btn {
            background-color: #000000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

         .btn:hover {
            background-color: #ff5722;
            transform: scale(1.1);
        }

    </style>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="logo"><a href="#">Editor Cafe</a></div>
        <div class="nav">
            <a href="#">Home</a>
            <a href="#">About</a>
            <div class="dropdown-menu">
                <a href="#">Dropdown Item 1</a>
                <a href="#">Dropdown Item 2</a>
                <a href="#">Dropdown Item 3</a>
            </div>
            <a href="#">Articles</a>
            <a href="#">Popular</a>
            <button class="btn">Publish News</button>
        </div>
    </div>
</div>
</body>
</html>
