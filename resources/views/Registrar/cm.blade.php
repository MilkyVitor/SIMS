@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    
    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Class Management</h1>
        <hr class="white-line">

        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>Grade Level</th>
                                <th>Section Name</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($section as $row)
                                <tr>
                                    <td>{{$row->grade_level}}</td>
                                    <td>{{$row->section_name}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn-flat viewss" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewSectionStudents" ><i class="mdi mdi-eye"></i> View Students</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>


</body>

<script>
    $(function() {
    $('.viewss').click( function(e) {
        e.preventDefault();
        var ss = $(this).data('bs-id');
        getData(ss);
    });    

    $(document).on('click', '.view-student', function(e) {
        e.preventDefault();
        var vs = $(this).data('bs-id');
        getstudentData(vs);
     
    }); //Somehow worked in this code// Be a reminder
   });
   
    function getData(id){
    $.ajax({
        method: 'GET',
        url: '/getSectionStudents/'+ id,
        success: function(response) {
            var table = $('#viewSectionStudents tbody');
            table.empty();
            var newRow = $('<tr>');
                $.each(response.data, function(index, item) {
            // Create a new row for each item in the response
            var newRow = $('<tr>');
            
            // Add data to the table cells 
            newRow.append($('<td>').text(item.first_name + ' ' + item.last_name));
            newRow.append($('<td>').html('<button class="btn btn-flat btn-sm btn-success view-student" data-bs-id="'+ item.user_id +'" data-bs-toggle="modal" data-bs-target="#viewStudentsInfo"><i class="mdi mdi-eye"></i> View Info</button>'));
            
            // Append the new row to the table
            table.append(newRow); // Replace 'yourTableId' with your table's actual ID
        });
          
        }
    });
   }
   
   

  

   

  

   function getstudentData(id) {
    $.ajax({
        method: 'GET',
        url: '/getStudentInfo/' + id,
        success: function(response) {
            console.log(response);
        }
    })
        
   }

 
</script>
@include('./partials.footer')