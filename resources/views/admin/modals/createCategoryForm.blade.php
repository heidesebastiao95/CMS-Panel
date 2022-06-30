 <div class="modal fade text-left" id="Category-modal" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="category_title">Category Form </h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form id="category-form">
                                    

                                    <div class="modal-body">
                                        <label>Category: </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="category-name" name="name" placeholder="type...">
                                            <div class="invalid-feedback" style="display: none">
                                                <i class="bx bx-radio-circle"></i>
                                                The name field cannot be empty
                                            </div>
                                        </div>
                                    

                                    </div>
                                    <div class="modal-footer">

                                        <input type="reset" value="Cancel" class="btn btn-primary ml-1" data-bs-dismiss="modal">

                                        
                                        <button class="btn btn-primary ml-1" type="button">
                                            <span id="category-submit" onclick="category_create(this,'{{ route('categories.store') }}')">Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
