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


<div class="modal fade" id="viewPayment">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">View Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Date Due</label>
                        <input type="text" class="form-control datedue" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date Paid</label>
                        <input type="text" class="form-control datepaid" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Amount</label>
                        <input type="text" class="form-control amount" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Attachment Receipt</label>
                        <img alt="receipt" class="form-control vImage image-fluid image-responsive">
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>
</div> 

<div class="modal fade" id="viewPendingPayment">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">View Pending Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Attachment</label>
                        <img class="form-control vImage img-fluid img-responsive" >
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</div> 


<div class="modal fade" id="sendPayment">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Send Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <form action="/sendReceipt" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="transactID" name="transactID">
                    <label> Send Attachment </label>
                    <img class="form-control image-responsive img-fluid" id="pInputImage" style="display: none">
                    <input type="file" name="attachment" class="form-control" id="imageinput" onchange="addingimagepreview(this, 'pInputImage')" required>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-success"><i class="mdi mdi-send"></i> Upload Receipt</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="requestDocument">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Request Document</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-center">Documents</p>
                <form action="/sendRequest" method="POST">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->unique_id}}" name="studentID">
                <div class="form-group col-md-12">
                    <label>
                    <input type="checkbox" name="documents[]" value="Form 137" > 
                    Form 137
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label>
                    <input type="checkbox"  name="documents[]" value="Certificate" > Certificate
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label>
                    <input type="checkbox" name="documents[]" value="Grades" > True Copy of Grades
                    </label>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-primary"><i class="mdi mdi-send"></i> Request</button>
            </form>

            </div>
        </div>
    </div>
</div>



