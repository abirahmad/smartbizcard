
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
<script src="{{asset('public/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend/dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('public/backend/dist/js/noty.min.js')}}"></script>
<!-- <script src="{{asset('public/backend/toaster/toastr.min.js')}}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('public/backend/CustomScript/RangerSlider.js')}}"></script>
<script src="{{asset('public/backend/dropify/js/dropify.min.js')}}"></script>
<script>
    $(".dropify").dropify();
</script>

<script src="{{asset('public/backend/chart/js/Chart.bundle.min.js')}}"></script>
{{-- paitce na --}}
<script src="{{asset('public/backend/chart/js/Chart.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>


<script>
    $( "#status" ).change(function() { 
        var status =$("#status").val();
        console.log(status);
        $.ajax({
            type: "GET",
            url: "barchart/"+ status,
            success: function(data){
            console.log(data);
            test(data);
            $("#barchart").val(data);
            },
        });
    });
function test(data){
    $(function(){
            var barCanvas = $('#barChart');
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data:{
                    labels:['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ''],
                    datasets:[
                        {
                            label: 'Scan Details of this year',
                            data:data,
                            backgroundColor:['red', 'orange', 'yellow', 'green', 'blue', 'indigo','violet', 'purple', 'pink', 'silver', 'gold', 'brown', 'black']
                        }
                    ]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            })
        });
}
</script>

<script>
    $(document).ready(function() {
        $('#userTransaction').DataTable();
    });
</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#tutorialModalCenter').modal('show');
    @endif

</script>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels  : ['J', 'F', 'M', 'A', 'M', 'J', 'J','A','S','O','N','D'],
          datasets: [{
            //   label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3,10,1,8,4],
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
  {{-- <script>
      $(".nav a").on("click", function() {
  $(".nav").find(".active").removeClass("active");
  $(this).parent().addClass("active");
});
  </script> --}}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
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


