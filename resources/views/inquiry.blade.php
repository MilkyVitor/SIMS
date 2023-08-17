<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/cheeky-moghster" rel="stylesheet">
                
                
                

    <title>School Management Information Management</title>
    <link rel="icon" href="{{ asset('assets/img/Logo.png')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <style>
        .bgimage {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='1000' preserveAspectRatio='none' viewBox='0 0 1440 1000'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1023%26quot%3b)' fill='none'%3e%3crect width='1440' height='1000' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M1438.09 131.46L1502.03 131.46L1502.03 195.4L1438.09 195.4z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M92.97 69.09a58.33 58.33 0 1 0 46.17 107.13z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M455.37 710.56a88.93 88.93 0 1 0 171.96 45.42z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M1097.31 70.57a15.4 15.4 0 1 0 18.05 24.96z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M197.5 164.91 a62.24 62.24 0 1 0 124.48 0 a62.24 62.24 0 1 0 -124.48 0z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M223.89 332.74L231.38 332.74L231.38 355.78L223.89 355.78z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M473.36 208.4 a58 58 0 1 0 116 0 a58 58 0 1 0 -116 0z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M392.17 931.11 a54.03 54.03 0 1 0 108.06 0 a54.03 54.03 0 1 0 -108.06 0z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M281.42 796.27L336.11 796.27L336.11 850.96L281.42 850.96z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M744.87 257.99a39.76 39.76 0 1 0-63.77-47.5z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M1300.82 204.24L1343 204.24L1343 283.28L1300.82 283.28z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M9.59 290.61 a57.5 57.5 0 1 0 115 0 a57.5 57.5 0 1 0 -115 0z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M904.35 866.36 a24.7 24.7 0 1 0 49.4 0 a24.7 24.7 0 1 0 -49.4 0z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M710.37 783.17L751.41 783.17L751.41 794.27L710.37 794.27z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M725.08 506.72L749.11 506.72L749.11 530.75L725.08 530.75z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M1088.89 271.24L1097.25 271.24L1097.25 279.6L1088.89 279.6z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M595.22 496.36 a92.09 92.09 0 1 0 184.18 0 a92.09 92.09 0 1 0 -184.18 0z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M988.49 901.18 a52.68 52.68 0 1 0 105.36 0 a52.68 52.68 0 1 0 -105.36 0z' stroke='%23037b0b'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1023'%3e%3crect width='1440' height='1000' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
        }

         /* * {
            font-family: 'Poppins';
        }
 */


        * {
            font-family: 'Poppins';                            
        }

        .nav-title, .nav-span {
            text-shadow: 1px 5px black;
        }

       

        
    </style>

</head>
<body class="bgimage">

@include('inquiry_navbar')
    
</body>
</html>