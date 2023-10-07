<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>{{$title}}</title>

    <?php
    function emergencyFormatDate($datestring){
        return \Illuminate\Support\Carbon::parse($datestring)->format('F d, Y');
    }
?>
</head>
<body>

    <header class="container-fluid">
        <h1 class="text-center display-1">School Management Information System</h1>
    </header>

    <main class="container mt-4">
        <h1 class="text-center">Acknowledgement Slip</h1>
        <hr>

        <div class="m-1">
            <p>Good day! This acknowledgement slip is the proof for claiming of acknowledged requested document:</p>
            
            @foreach ($docs as $item)
                <ul>
                    <li> <span class="fw-bold">Document:</span> {{$item->requested_doc}} <br>
                        <span class="fw-bold">Date Acknowledged:</span>  {{emergencyFormatDate($item->date_acknowledged)}} </li>
                </ul>
            @endforeach
        </div>

        <div class="mt-5 mr-5 d-flex justify-content-end">
            <span class="fw-bold">Student:</span> {{$name}} <br>
            <span class="fw-bold">Code:</span> {{$code}} <br>
            <span class="fw-bold">Date Printed:</span> {{$date}} 
        </div>
    </main>
</body>
</html>