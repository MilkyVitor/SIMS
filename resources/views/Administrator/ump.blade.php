@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <div class="container">
        <h1 class="text-center">Update Master Page</h1>
        <hr class="white-line">
        
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

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <h1 class="card-title">Home Tab</h1>
                        <table class="table table-responsive data-table " id="example1">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Sub-Title</th>
                                    <th>Image</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($home as $homerow)
                                    <tr>
                                        <td>{{$homerow->title}}</td>
                                        <td>{{$homerow->sub_title}}</td>
                                        <td>
                                            <img src="{{asset('storage/images/'.$homerow->image_url)}}" class="img-fluid img-responsive">
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-success btn-flat home" data-bs-id=" 1 " data-bs-toggle="modal" data-bs-target="#homeUpdateModal"><i class="mdi mdi-pencil"></i> Update</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <button class="btn btn-primary btn-flat" data-bs-toggle="modal" data-bs-target="#addAnnouncement"><i class="mdi mdi-plus"></i> Add Announcement</button>
                        <h1 class="card-title">Announcements Tab</h1>
                        <table class="table table-responsive data-table">
                            <thead>
                                <tr>
                                    <th>Headline</th>
                                    <th>Description</th>
                                    <th>Posted At</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($announcements as $annrow)
                                    <tr>
                                        <td>{{$annrow->Headline}}</td>
                                        <td>{{$annrow->Description}}</td>
                                        <td>{{$annrow->PostedAt}}</td>
                                        <td>{{$annrow->Author}}</td>
                                        <td>
                                            <img src="{{asset('storage/images/'. $annrow->Image)}}" class="img-fluid img-responsive">
                                        </td>
                                        
                                       
                                        
                                       
                                        <td>
                                            <button class="btn btn-outline-success btn-flat announcement" data-bs-id="{{$annrow->ID}}" data-bs-toggle="modal" data-bs-target="#editAnnouncement"><i class="mdi mdi-pencil"></i> Update</button>
                                            <button class="btn btn-outline-danger btn-flat announcement" data-bs-id="{{$annrow->ID}}" data-bs-toggle="modal" data-bs-target="#deleteAnnouncement"><i class="mdi mdi-delete"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        
    </div>

    <script>
       $(function() {
        $('.home').click(function(e) {
            e.preventDefault();
            var id = $(this).data("bs-id");
            $('#home').modal("show");
            getHomeData(id);
        });

        $('.announcement').click(function(e) {
            e.preventDefault();
            var id = $(this).data("bs-id");
            $('#announcement').modal("show");
            getAnnouncementData(id);
        });
    });

    function getHomeData(id){
        $.ajax({
            method: 'POST',
            url: '/home-data',
            data: {
                _token: '{{csrf_token()}}', //PARA MAGAMIT MO YUNG POST METHOD, NEED NG CSRF
                id:id
            },
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('.homeTabID').val(response.data.ID);
                $('#home-title').val(response.data.title);
                $('#home-subtitle').val(response.data.sub_title);
            }
        });
    }

    function getAnnouncementData(id){
        $.ajax({
            method: 'POST',
            url: '/announcement-data',
            data: {
                _token: '{{csrf_token()}}', //PARA MAGAMIT MO YUNG POST METHOD, NEED NG CSRF
                id:id
            },
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('.announcementID').val(response.data.ID);
                $('#headline').val(response.data.Headline);
                $('#remove-announcement').html(response.data.Headline);
                $('#description').val(response.data.Description);
                $('#postedAt').val(response.data.PostedAt);
                $('#postedAtName').val(response.data.PostedAt);
                $('#author').val(response.data.Author);

            }
        });
    }
    </script>


</body>

@include('./partials.footer')