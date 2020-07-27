<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->
</div>
<!-- End container-fluid-->

</div><!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

    <!--Start footer-->
  <div class="fixed-bottom">
    <footer class="footer">
          <div class="container">
              <div class="text-center">
              Copyright © 2020 King Pro P4W
              
              </div>
          </div>
    </footer>
  </div>
    <!--End footer-->
      
      <!--start color switcher-->
     {{-- <div class="right-sidebar">
      <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
      </div>
      <div class="right-sidebar-content">
  
        <p class="mb-0">Gaussion Texture</p>
        <hr>
        
        <ul class="switcher">
          <li id="theme1"></li>
          <li id="theme2"></li>
          <li id="theme3"></li>
          <li id="theme4"></li>
          <li id="theme5"></li>
          <li id="theme6"></li>
        </ul>
  
        <p class="mb-0">Gradient Background</p>
        <hr>
        
        <ul class="switcher">
          <li id="theme7"></li>
          <li id="theme8"></li>
          <li id="theme9"></li>
          <li id="theme10"></li>
          <li id="theme11"></li>
          <li id="theme12"></li>
          <li id="theme13"></li>
          <li id="theme14"></li>
          <li id="theme15"></li>
        </ul>
        
       </div>
     </div> --}}
    <!--end color switcher-->
     
    </div><!--End wrapper-->
  
  
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('adminTemplate/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/js/bootstrap.min.js') }}"></script>
      
    <!-- simplebar js -->
    <script src="{{ asset('adminTemplate/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('adminTemplate/js/sidebar-menu.js') }}"></script>
    
    <!-- Custom scripts -->
    <script src="{{ asset('adminTemplate/js/app-script.js') }}"></script>
    <!--notification js -->
    <script src="{{ asset('adminTemplate/plugins/notifications/js/lobibox.min.js') }}""></script>
    <script src="{{ asset('adminTemplate/plugins/notifications/js/notifications.min.js') }}""></script>
    <script src="{{ asset('adminTemplate/plugins/notifications/js/notification-custom-script.js') }}""></script>
    <!--Select Plugins Js-->
    <script src="{{ asset('adminTemplate/plugins/select2/js/select2.min.js') }}"></script>
    <!--Data Tables js-->
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
    <!--Sweet Alerts -->
    <script src="{{ asset('adminTemplate/plugins/alerts-boxes/js/sweetalert2.js') }}"></script>


    {{-- <div class="jangan" style="display: none">@widget('AntrianWidget')</div> --}}

    <script>
      function explode(){
        let url="{{ route('freshAntri') }}"
        $.ajax({
          url: url, 
          });
          console.log(url)
      }
      setInterval(explode, 10000);

    </script>

    @stack('scripts')
      
  </body>
  </html>
  