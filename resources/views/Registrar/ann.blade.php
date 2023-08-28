@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

@if(session('success'))
            <script>
                Swal.fire({
                    title:'Success!',
                    icon:'success',
                    html: `{{session('success')}}`,
                    showConfirmButton: true
                });
            </script>
        @elseif(session('error'))
        <script>
                Swal.fire({
                    title:'Success!',
                    icon:'success',
                    html: `{{session('error')}}`,
                    showConfirmButton: true
                });
            </script>
        @endif

    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Announcements Management</h1>
        <hr class="white-line">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card m-1 overflow-y-auto">

                <div class="card-body">
                    <button class="btn btn-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#addAnnouncement"><i class="mdi mdi-plus"></i> Add Announcement</button>

                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Headline</th>
                                <th>Posted At:</th>
                                <th>Author</th>
                                <th>Date Created</th>
                                <th>Tools</th>
                            </tr>

                            <tbody>
                                @foreach ($announcements as $annrow)
                                    <tr>
                                        <td>{{$annrow->ID}}</td>
                                        <td>{{$annrow->Headline}}</td>
                                        <td>{{$annrow->PostedAt}}</td>
                                        <td>{{$annrow->Author}}</td>
                                        <td>{{$annrow->created_at}}</td>
                                        <td>
                                            <button class="btn btn-outline-success btn-flat btn-sm v-ann" data-bs-id="{{$annrow->ID}}" data-bs-toggle="modal" data-bs-target="#viewAnnouncement"><i class="mdi mdi-eye"></i> View</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>

            </div>
        </div>       


    </div>

</body>

<script>
    $(function() {
        $('.v-ann').click(function(e) {
            e.preventDefault();
            var va = $(this).data('bs-id');
            getData(va);
        });

        $('.view').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            getData(id);
        });
    });

    function getData(id) {
        $.ajax({
            method: "GET", 
            url: '/getDataAnn/' + id,
            success: function(response) {
                console.log(response);
                $('.annID').val(response.data.ID);
                var createdDate = new Date(response.data.created_at);
                $('#Headline').html(response.data.Headline);
                $('#Image').attr('src', "{{asset('/storage/images/')}}"+ '/' + response.data.Image);
                $('#Description').html(response.data.Description);
                $('#Author').html(response.data.Author);
                $('#CreatedAt').html(createdDate.toLocaleDateString('en-us',{year: 'numeric', month: 'long', day:'numeric'}));
                $('#EHeadline').val(response.data.Headline);
                $('#EDescription').val(response.data.Description);
                $('#EPostedAt').val(response.data.PostedAt);
                $('#EAuthor').val(response.data.Author);
                 $('#Delete').html(response.data.Headline);


            }
        }); 
    }
</script>

@include('./partials.footer')