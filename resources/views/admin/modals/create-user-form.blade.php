<div class="modal fade text-left" id="User-modal" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered .modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user_title">User Form </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="user-form" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="first-name-column">Name</label>
                                <input type="text"  class="form-control" placeholder="Name" name="name" id="user-name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Email</label>
                                    <input type="email"  class="form-control" name="email" placeholder="Email" id="user-email">
                                </div>
                            </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Username</label>
                                <input type="text"  class="form-control" placeholder="Username" name="username" id="user-username">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Role</label>
                                <fieldset class="form-group">
                                        <select class="form-select" name="role" id="user-role">
                                            <option>admin</option>
                                            <option>user</option>
                                        </select>
                                    </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Gender</label>
                                <fieldset class="form-group">
                                        <select class="form-select" name="gender" id="user-gender">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Phone</label>
                                <input type="text"  class="form-control" name="phone" id="user-phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Password</label>
                                <input type="password"  class="form-control" name="password" id="user-password">
                            </div>
                        </div>
                        
                        <div class="alert alert-light-success color-success mt-3"  id="user-success" style="display: none"><i class="bi bi-check-circle"></i> 
                            Successfuly.
                        </div>
                        <div class="alert alert-light-danger color-danger mt-3" style="display: none" id="user-error"><i class="bi bi-exclamation-circle"></i> This
                            is danger alert.
                        </div>
                </div>
                <div class="modal-footer">
                    
                    <input type="reset" value="Cancel" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <button class="btn btn-primary ml-1" type="button">
                        <span id="user-submit" onclick="user_create(this,'{{ route('users.store') }}')">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
