<script src="{{ asset('public/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}" defer></script>
<script src="{{ asset('public/backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('public/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('public/backend/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/backend/dist/js/pages/dashboard.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('public/backend/plugins/chart.js/Chart.min.js') }}"></script> --}}
<!-- Sparkline -->
<script src="{{ asset('public/backend/plugins/sparklines/sparkline.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- datatable --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="{{asset('public/backend/chart/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/chart/js/Chart.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    $(document).ready(function() {
        $('#categories_table').DataTable();
        $('#blogs_table').DataTable();
        $('#vCards_table').DataTable();
        $('#plan').DataTable();
        $('#user_list').DataTable();
    });

</script>

<script>
    @if (Session::has('Message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
        case 'info':
        toastr.info("{{ Session::get('Message') }}");
        break;

        case 'warning':
        toastr.warning("{{ Session::get('Message') }}");
        break;

        case 'success':
        toastr.success("{{ Session::get('Message') }}");
        break;

        case 'error':
        toastr.error("{{ Session::get('Message') }}");
        break;
        }
    @endif
</script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels  : ['May 21', 'May 22', 'May 23', 'May 20', 'May 20','May 20',],
            datasets: [{
                label: '# of Votes',
                data: [120, 259, 300, 125, 152, 333,234],
                backgroundColor: [
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                ],
                borderColor: [
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    {{-- Line Chart Data Starts--}}
    <script>

    $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/smartbiz/admin/get-chart-data',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    moon(response);

                },
                error:function(){
                   // console.log(response);
                }
        });
    function moon(data){
        var ctx = document.getElementById('myLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels  : data.months,
            datasets: [{
                label: '# of Votes',
                data: data.post_count_data,
                backgroundColor: [
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                ],
                borderColor: [
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)',
                    'rgba(204, 212, 225)',
                    'rgba(20, 122, 214)'
                ],
                fill: false,
                tension: 0,
                borderColor: "#127AF2",
                borderWidth:1,
                pointBackgroundColor : "white"



            }]
        }

        ,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    }
    </script>

{{-- Line Chart Data Ends --}}

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#emailUserModal').modal('show');
    @endif
</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#passwordModalCenter').modal('show');
    @endif
</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#exampleModalCenter').modal('show');
    @endif
</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#tutorialModalCenter').modal('show');
    @endif
</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#planModalCenter').modal('show');
    @endif

</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#customSettingsModalCenter').modal('show');
    @endif

</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Select Tax",
            allowClear: true
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple-two').select2({
            placeholder: "Select Setting",
            allowClear: true
        });
    });

</script>

<script>
    $('#summernote').summernote({
      placeholder: 'This is blog description..',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>

  <script>
      // import swal from 'sweetalert';
        $(document).on("click",".confirmDelete",function(){
            var record = $(this).attr("record");
            var recordid = $(this).attr("recordid");
            Swal.fire({
                title:'Are You Sure?',
                text:"You Won't Able to revert this!",
                icon:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
            }).then((result)=>{
                if(result.value){
                    window.location.href="/ProbashiBangla/admin/"+record+"/"+recordid;
                }
            });
        });
  </script>
