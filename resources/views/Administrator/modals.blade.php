{{-- <div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Template</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>  --}}


<div class="modal fade" id="homeUpdateModal" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Home Update</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <form action="/updateHomeTab" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group col-md-12">
                        <input type="hidden" name="homeTabID" class="homeTabID">
                        <label for="home-title">Title</label>
                        <input type="text" class="form-control" name="title" id="home-title" placeholder="Update title..." required>

                        <label for="home-subtitle">Sub-Title</label>
                        <input type="text" class="form-control" name="sub_title" id="home-subtitle" placeholder="Update sub-title..." required>
                        
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="home-image" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success btn-flat" type="submit"><i class="mdi mdi-send"></i> Submit</button>
                    </div>
                </div>
                    </form>
            </div>

        </div>
    </div>

</div>

<div class="modal fade" id="addAnnouncement" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Add Announcement</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/addAnnouncement" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="">Headline</label>
                        <input type="text" class="form-control" name="headline" placeholder="Enter Headline..." required>
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" cols="5" rows="5" placeholder="Enter Description..."></textarea>
                        <label for="">Post for:</label>
                        <select name="postedAt" class="form-control" >
                            <option value="General">General</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Students">Students</option>
                        </select>
                        <input type="hidden" name="author" value="{{auth()->user()->account_type}}">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" required>
                     {{--    <label for="">Attachment</label>
                        <input type="file" name="attachment" class="form-control"> --}}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary btn-flat"><i class="mdi mdi-send"></i> Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editAnnouncement" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Edit Announcement</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/editAnnouncement" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" class="announcementID" name="announcementID">
                        <label for="">Headline</label>
                        <input type="text" class="form-control" name="headline" id="headline" placeholder="Enter Headline..." required>
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="5" rows="5" placeholder="Enter Description..." required></textarea>
                        <label for="">Post for:</label>
                        <select name="postedAt" class="form-control" id="postedAt" >
                            <option value="General">General</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Students">Students</option>
                        </select>
                        <label for="">Author</label>
                        <input type="text" name="author" class="form-control" id="author" placeholder="Edit Author..." required >
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" required>
                     {{--    <label for="">Attachment</label>
                        <input type="file" name="attachment" class="form-control"> --}}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary btn-flat"><i class="mdi mdi-send"></i> Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAnnouncement" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Delete Announcement</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/deleteAnnouncement" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body text-center">
                    <input type="hidden" class="announcementID" name="announcementID">
                    <input type="hidden" id="postedAtName" name="postedAt">
                    <p>Are you sure to delete?</p>
                    <h2 id="remove-announcement"></h2>
               
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary btn-flat"><i class="mdi mdi-delete"></i> Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editAbout" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title fs-5">Edit About</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <form action="/editAbout" method="POST">
                        @csrf
                    <div class="form-group col-md-12">
                        <input type="hidden" class="aboutID" name="aboutID">
                        <label for="">About</label>
                        <textarea name="about" id="about" class="form-control" cols="5" rows="5" placeholder="Edit About..." required></textarea>
                        <label for="">Mission</label>
                        <textarea name="mission" id="mission" class="form-control" cols="5" rows="5" placeholder="Edit Mission..." required></textarea>
                        <label for="">Vision</label>
                        <textarea name="vision" id="vision" class="form-control" cols="5" rows="5" placeholder="Edit Vision..." required></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success btn-flat" type="submit"><i class="mdi mdi-send"></i> Submit</button>
            </div>

                    </form>


        </div>
    </div>
</div>

<div class="modal fade" id="addAccounts" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/addAccount" method="POST">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option disabled selected>-Select-</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Cashier">Cashier</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm Email Address</label>
                            <input type="email" class="form-control" name="confirmemail" placeholder="Confirm Email" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-success btn-md"><i class="mdi mdi-account-plus"></i> Confirm Account</button>
            </div>
        </form>

        </div>
    </div>
</div>

<div class="modal fade" id="readFeedback">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <div class="modal-header">
                <h1 class="modal-title fs-5">Reading Feedback</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
            </div>
    
            <div class="modal-body">
                <div class="text-start">
                    <p>Date Written: <span class="date-created"></span></p>
                </div>
                <div class="card m-1 rounded">
                    <div class="card-body">
                        <p class="fst-italic text-centered">"<span class="feedback"></span>"</p>
                        <div class="text-end">
                            <h6>- <span class="name"></span></h6>
                        </div>
                    </div>
                </div>
                <form action="/acknowledge" method="POST">
                @csrf
                <input type="hidden" class="feedbackID" name="feedbackID">
                <input type="hidden" value="{{auth()->user()->name}}" name="name">
                <input type="hidden" class="name" name="from">
                <div class="form-group col-md-12">
                    <label>Comment: </label>
                    <textarea name="comment" class="form-control" cols="5" rows="5" placeholder="Enter your comment..."></textarea>
                </div>
            </div>
    
            <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-check"></i> Acknowledge</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewFeedback">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <div class="modal-header">
                <h1 class="modal-title fs-5">Reading Feedback</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
            </div>
    
            <div class="modal-body">
                <div class="text-start">
                    <p>Date Written: <span class="date-created"></span></p>
                </div>
                <div class="card m-1 rounded">
                    <div class="card-body">
                        <p class="fst-italic text-centered">"<span class="feedback"></span>"</p>
                        <div class="text-end">
                            <h6>- <span class="name"></span></h6>
                        </div>
                    </div>
                </div>
                
               
                <div class="form-group col-md-12">
                    <label>Comment: </label>
                    <textarea name="comment" class="form-control comment" cols="5" rows="5" placeholder="No Comment"></textarea>
                </div>
            </div>
    
        </div>
    </div>
</div>

<div class="modal fade" id="activateGrade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Activate Grade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <form action="/activateGrade" method="POST">
                    @csrf
                    <p class="text-center">Activate <span class="gradename"></span> by confirming password:</p>
                    <div class="form-group col-md-12">
                        <label>Password:</label>
                        <input type="hidden" class="gradeID" name="gradeID">
                        <input type="hidden" value="{{auth()->user()->email}}" name="email">
                        <input type="hidden" class="gradename" name="gradename">
                        <input type="password" class="form-control" name="password" placeholder="Enter password..." required>
                    </div>
              
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-success"><i class="mdi mdi-arrow-down-thin-circle-outline"></i> Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="editSubject">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/editSubject" method="POST">
                    @csrf
                    <input type="hidden" class="subID" name="subID">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control subjectname" name="subjectname" placeholder="Enter name..." required>
                </div>
                <div class="form-group col-md-12">
                    <label>Level</label>
                    <select name="level" class="form-control level" required>
                        <option disabled selected>-Select-</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Junior High-School">Junior High-School</option>
                        <option value="Senior High-School First">Senior High-School 1st Year </option>
                        <option value="Senior High-School Second">Senior High-School 2nd Year </option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-success"><i class="mdi mdi-pencil"></i> Edit</button>
            </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="removeSubject">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/deleteSubject" method="POST">
                    @csrf
                <p class="text-center">Are you sure to remove this subject?</p>
                <h1 class="text-center dsubjectname" style="color:black;"></h1>
                <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="hidden" class="subID" name="subID">
                    <input type="hidden" value="{{auth()->user()->email}}" name="email">
                    <input type="password" class="form-control" name="password" placeholder="Enter password to confirm..." required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-danger"><i class="mdi mdi-delete"></i> Remove</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="editRooms">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/editRoom" method="POST">
                    @csrf
                    <input type="hidden" class="roomID" name="roomID">
                    <input type="hidden" value="{{auth()->user()->email}}" name="email">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control roomname" name="roomname" placeholder="Enter name..." required>
                </div>

                <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password to confirm..." required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-success"><i class="mdi mdi-pencil"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="deleteRoom">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/removeRoom" method="POST">
                    @csrf
                    <input type="hidden" class="roomID" name="roomID">
                    <input type="hidden" value="{{auth()->user()->email}}" name="email">
                <p class="text-center">Are you sure to remove the room?</p>
                <h1 class="text-center droomname" style="color: black"></h1>

                <div class="form-group col-md-12">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password to confirm..." name="password" required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-danger"><i class="mdi mdi-delete"></i> Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>