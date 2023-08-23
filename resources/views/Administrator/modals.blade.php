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