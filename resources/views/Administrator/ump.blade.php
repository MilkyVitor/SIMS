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

            {{-- NAV TAB START --}}
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home Tab </button>
                    <button class="nav-link" id="nav-announcements-tab" data-bs-toggle="tab" data-bs-target="#nav-announcements" type="button" role="tab" aria-controls="nav-announcements" aria-selected="false"> Announcement Tab </button>
                    <button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false"> About Tab</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

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
                                                    <button class="btn btn-outline-success btn-flat home" data-bs-id="{{$homerow->ID}} " data-bs-toggle="modal" data-bs-target="#homeUpdateModal"><i class="mdi mdi-pencil"></i> Update</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        
                </div>
                <div class="tab-pane fade" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">

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

                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab" tabindex="0">

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card m-1 overflow-y-auto">
                            <div class="card-body">
        
                                <h1 class="card-title">About's Tab</h1>
        
                                <table class="table table-responsive data-table">
                                    <thead>
                                        <tr>
                                            <th>About</th>
                                            <th>Mission</th>
                                            <th>Vision</th>
                                            <th>Tools</th>
                                            
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                        @foreach ($about as $aboutrow)
                                            <tr>
                                                <td>{{$aboutrow->About}}</td>
                                                <td>{{$aboutrow->Mission}}</td>
                                                <td>{{$aboutrow->Vision}}</td>   
                                                <td>
                                                    <button class="btn btn-outline-success btn-flat about" data-bs-id="{{$aboutrow->ID}}" data-bs-toggle="modal" data-bs-target="#editAbout"><i class="mdi mdi-pencil"></i> Update</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
        
                                </table>
        
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            {{-- NAV TAB END --}}

            
            

           


        
    </div>

    <script>
       $(function() {
       
        $('.home').click(function(e) {
            e.preventDefault();
            var home = $(this).data("bs-id");
            $('#home').modal("show");
            getHomeData(home);
        });

        $('.announcement').click(function(e) {
            e.preventDefault();
            var announcement = $(this).data("bs-id");
            $('#announcement').modal("show");
            getAnnouncementData(announcement);
        });

        $('.about').click(function(e) {
            e.preventDefault();
            var about = $(this).data("bs-id");
            //INALIS YUNG MODAL SHOW
            getAboutData(about);
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

    function getAboutData(id){
        $.ajax({
            method: 'POST',
            url: '/about-data',
            data: {
                _token: '{{csrf_token()}}', //PARA MAGAMIT MO YUNG POST METHOD, NEED NG CSRF
                id:id
            },
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('.aboutID').val(response.data.ID);
                $('#about').val(response.data.About);
                $('#mission').val(response.data.Mission);
                $('#vision').val(response.data.Vision);
              

            }
        });
    }
    </script>


</body>

@include('./partials.footer')