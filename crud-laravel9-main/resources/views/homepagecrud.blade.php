<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Background Gambar</title>


</head>
<body>
    <style>
        body {
            background-image:url("/background/vertical-low.jpg"); 
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0; 
        }
        .welcome-text {
            font-size:36pt;
            margin-top: 20px;
            color: white; /* Warna teks menjadi putih */
            text-align: center;
            font-family: Arial, sans-serif;
            font-weight: 700;
            padding-top: 200px;
        }
        .button-link {
            text-decoration: none; /* Menghapus dekorasi tautan */
        }
        button {
            margin-bottom: 20px;
            margin-top: 20px;
            padding: 10px 40px;
            background-color: rgba(17, 27, 77, 0.7);
            font-weight: 500;
            color: rgb(249, 249, 249);
            border: none;
            border-radius: 15px;
            cursor: pointer;
            cursor: pointer;
            margin-left: auto;
            margin-right: auto;
            display: block; 
        }

        /* Hover effect */
        button:hover {
            background-color: rgba(26, 48, 125, 0.5);
        }
    </style>
 <div class="welcome-text">Welcome To Perpustakaan Digital Pudi</div>
 <a href="{{ url('perpustakaan') }}" class="button-link"><button>GET STARTED</button></a>
</body>
</html>
