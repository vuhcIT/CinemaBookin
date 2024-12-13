<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang của tôi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        .link-list{
            flex-direction: row;
        }
    </style>
</head>
<body>

<h1>Admin</h1>


<!-- List of links -->
<center>
<ul id="link-list">
    <!-- Placeholder links -->
    <li id="link1"> <a href="admin_phim.php">Thông Tin Phim</a></li>
    <li id="link2"> <a href="lichtrinh.php">Lịch trình chiếu phim</a></li>
    <li id="link3"> <a href="../testdangnhapadmin/registeradmin.php">Đăng kí admin</a></li>
    
</ul>
</center>

<script>
    // Function to update links based on dropdown selection
    document.getElementById('link-options').ad
