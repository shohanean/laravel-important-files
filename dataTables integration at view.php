#table should look like this

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>SL. No.</th>
      <th>Project Name</th>
      <th>Project Address</th>
      <th>ProjectYear</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allProjects as $allProject)
      <tr>
        <td></td>
        <td>{{$allProject->project_name}}</td>
        <td>{{$allProject->project_address}}</td>
        <td>{{$allProject->project_year}}</td>
      </tr>
    @endforeach
  </tbody>
</table>

#add these style and scripts

CSS:
1) https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css
2) https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css

JS:
1) https://code.jquery.com/jquery-1.12.4.js
2) https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
3) https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js

#after all these add below js code individual page

@section('footer_scripts')
<script>
$(document).ready(function(){
  var t = $('#example').DataTable( {
        "order": [[ 1, 'asc' ]],
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>
@endsection