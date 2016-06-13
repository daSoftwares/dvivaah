<?php echo $this->element('admin-navbar');?>
<div id="page-wrapper" class="approve-profile-image">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Revenue
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-fw fa-users"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i>  Revenue
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="date-picker-wrapper clearfix">
        	<form action="" method="post">
            <div class="date-picker-container">
                <div class="input-daterange input-group" id="input-daterange">
                    <input type="text" class="input-sm form-control" name="start" />
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary apply-date-range">Apply</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Total Amount </th>
                    <th>Paid Online </th>
                    <th>Paid By Cash</th>
                    <th>Paid By Cheque</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><?php  echo $data['total'];?></th>
                    <td><?php  echo $data['online'];?></td>
                    <td><?php  echo $data['cash'];?></td>
                    <td><?php  echo $data['cheque'];?></td>
                    
                  </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->