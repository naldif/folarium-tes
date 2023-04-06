<!-- JAVASCRIPT -->
<script src="{{ asset('/be/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('/be/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<script src="{{ asset('/be/assets/js/pages/form-validation.init.js') }}"></script>

<script src="{{ asset('/be/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

 <!-- Required datatable js -->
 <script src="{{ asset('/be/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Buttons examples -->
 <script src="{{ asset('/be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

 <script src="{{ asset('/be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
 <script src="{{ asset('/be/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

 {{-- Swallalert --}}
<script src="{{ asset('/be/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script> 

{{-- Toastr --}}
<script src="{{ asset('/be/assets/libs/toastr/build/toastr.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('/be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>


<!-- jquery.vectormap map -->
<script src="{{ asset('/be/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/be/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

<script src="{{ asset('/be/assets/js/pages/dashboard.init.js') }}"></script>

<!--tinymce js-->
<script src="{{ asset('/be/assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('/be/assets/js/pages/form-editor.init.js') }}"></script>

<!-- Datatable init js -->

<script src="{{ asset('/be/assets/js/pages/form-advanced.init.js') }}"></script>

<script src="{{ asset('/be/assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ asset('/be/assets/js/app.js') }}"></script>

<script type="text/javascript">
   $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         event.preventDefault();
         swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         })
         .then((result) => {
           if (result.isConfirmed) {
               form.submit();
               Swal.fire(
               'Deleted!',
               'Your data has been deleted.',
               'success'
               )
           }
       });
     });
</script>
@yield('script')


