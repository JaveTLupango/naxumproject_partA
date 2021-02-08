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
<body  style="margin-top: 10px;">
<style>
    .paginate_button{
        margin-left: 2px;
        margin-right: 2px;
    }
</style>
<center > <h2> Transaction Report </h2>  </center>
    <div class="container" style="margin-top: 25px;">
        <form method="POST" action="" style="margin-bottom: 25px; ">
            <div class="row">
                <div class="col-12" style="margin-bottom:5px;">
                    <div class="input-group col-6">
                        <input type="text" class="form-control" placeholder="Distributor Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                </div><br/>
                <div class="col-12" style="margin-bottom:5px;">
                    <div class="input-group col-6">
                       <h4>  Date From : </h4> <input type="date" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                       <h4>  To : </h4>  <input type="date" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="col-12" style="margin-bottom:5px;">
                    <div class="input-group col-3">
                        <button type="button" class="btn btn-info col-6" onClick="viewModal()">Filter</button>
                    </div>
                </div>
            </div>
        </form>

        <table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 20px">
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
                        <td>{{$comm->invoice_number}}</td>
                        <td>{{$comm->purchaser}}</td>
                        <td>{{$comm->destributor}}</td>
                        <td>{{$comm->ReferredDisc}}</td>
                        <td>{{$comm->order_date}}</td>
                        <td>{{$comm->totalOrder}}</td>
                        <td>{{$comm->percentage}}</td>
                        <td>{{$comm->commission}}</td>
                        <td><button type="button" class="btn btn-info" onClick="viewModal()">View Items</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>

        <script type="text/javascript">

                $(document).ready(function() {
                    $('#example').DataTable();
                 } );

                 function viewModal()
                 {
                    //alert('asdasdads');
                    $("#myModal").modal();
                 }
        </script>

</body>
</html>





