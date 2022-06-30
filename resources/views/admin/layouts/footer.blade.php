<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>V 1.0 &copy; Lupin Soft</p>
        </div>
        <div class="float-end">
            <p>Producted
                by <a href="#">HS One</a></p>
        </div>
    </div>


<script src="{{ asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>



{{-- Inclusão dos modals --}}{{-- Includes Modals --}}
{{-- <div class="card">@include('admin.modals.danger')</div> --}}
<div class="card">@include('admin.modals.create-user-form')</div>
<div>@include('admin.modals.post-modal')</div>
<div>@include('admin.modals.category-edit')</div>
<div>@include('admin.modals.comment-create')</div>
<div>@include('admin.modals.comment-edit')</div>





@include('admin.layouts.scripts')
</footer>
 {{-- foooter --}}


