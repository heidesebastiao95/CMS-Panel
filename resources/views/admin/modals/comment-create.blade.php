<div class="modal fade text-left" id="comment-modal" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="category_title">Comment Post </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="comment-form">
                
                <div class="modal-body">
                    <label>Comment: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="comment-content" name="name" placeholder="type...">
                        <input type="text" class="form-control" id="post-id" style="display: none">
                        <div class="invalid-feedback alert alert-light-danger color-danger" style="display: none" id="error-comment">
                            <i class="bx bx-radio-circle"></i>
                            The name field cannot be empty
                        </div>
                    </div>
                

                </div>
                <div class="modal-footer">

                    <input type="reset" value="Cancel" class="btn btn-primary ml-1" data-bs-dismiss="modal">

                    
                    <button class="btn btn-primary ml-1" type="button">
                        <span id="comment-submit" onclick="comment_put()">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
