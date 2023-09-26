@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <h1 class="text-center">Suggestions</h1>
        <hr class="white-line">

        <div class="col-md-12">
            <div class="card overflow-y-auto">
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Is Acknowledged</th>
                                <th>Acknowledged By</th>
                                <th>Tools</th>
                            </tr>

                            <tbody>
                                @foreach ($feedback as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->name}}</td>
                                        @if($row->isAcknowledged == "0")
                                            <td>Not yet</td>
                                        @else
                                            <td>Yes</td>
                                        @endif
                                        @if($row->acknowledged_by == NULL)
                                            <td>Not yet</td>
                                        @else
                                            <td>{{$row->acknowledged_by}}</td>
                                        @endif
                                        
                                        <td>
                                            @if ($row->isAcknowledged == '1')
                                            <button class="btn btn-sm btn-flat btn-primary view-feedback" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewFeedback"><i class="mdi mdi-eye"></i> View</button>    
                                            @else
                                            <button class="btn btn-sm btn-flat btn-success view-feedback" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#readFeedback"><i class="mdi mdi-eye"></i> Read</button>                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

<script>
    $(function() {
        $('.view-feedback').click(function (e) {
            e.preventDefault();
            var vf = $(this).data('bs-id');
            getfeedbackdata(vf)
        });
    });

    function getfeedbackdata(id) {
        $.ajax({
            method: "GET",
            url: "/getfeedbackdata/" + id,
            success: function(response) {
                $('.feedbackID').val(response.data.ID);
                $('.date-created').html(formatDate(response.data.created_at));
                $('.feedback').html(response.data.feedback);
                $('.name').html(response.data.name);
                $('.comment').val(response.data.comment);
            }
        });
    }
</script>
@include('./partials.footer')