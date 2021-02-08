<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transaction Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body>
<style>
    .paginate_button{
        margin-left: 2px;
        margin-right: 2px;
    }
</style>
<center > <h2> Transaction Report </h2>  </center>
    <div class="container" style="margin-top: 50px;">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Purchaser</th>
                        <th>Distributor</th>
                        <th>Referred By</th>
                        <th>Order Date</th>
                        <th>Order Total</th>
                        <th>Perscentage</th>
                        <th>Commission</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody id="tbodyBody">
                    @foreach($coms as $comm)
                    <tr>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td>{{$comm->id}}</td>
                        <td><button type="button" class="btn btn-link">View Items</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script type="text/javascript">

                $(document).ready(function() {
                    $('#example').DataTable();
                 } );

        </script>

</body>
</html>





