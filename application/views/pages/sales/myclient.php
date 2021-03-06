

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Client
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>sales/c_sales/choose_client" class="btn btn-primary btn-sm" >Add Client</a> </h3>
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>sales/c_sales/print_myclient"  target="_blank" class="btn btn-warning btn-sm" >Print All</a></h3>
              <?php foreach ($event as $event1) { if ($event1->event_status == "undone") {?>
                <h3 class="box-title"> <a href="<?php echo base_url(); ?>sales/c_sales/print_myclient_specific/<?php echo $event1->event_id; ?>"  target="_blank" class="btn btn-warning btn-sm" >Print <?php echo $event1->event_name; ?></a></h3>
              <?php } }?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Company</th>
                  <th>Status</th>
                  <th>Sqm</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($booking)) {
                  $no = 1;
                   foreach($booking as $booking2){
                     if ($booking2->user_id === $this->session->userdata('id') && $booking2->event_status == "undone") {
                 ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php $date = date_create($booking2->booking_updated_at); echo date_format($date, 'd/m/Y H:i:s'); ?></td>
                  <td><?php echo $booking2->event_name ?></td>
                  <td><?php echo $booking2->company_name ?></td>
                  <td><span <?php if ($booking2->status_name == "Form") { ?>
                    class="label label-success"
                  <?php }elseif ($booking2->status_name == "Cancel") { ?>
                    class="label label-danger"
                  <?php }elseif ($booking2->status_name == "Normal") { ?>
                    class="label label-info"
                  <?php }elseif ($booking2->status_name == "Booking") { ?>
                    class="label label-warning"
                  <?php }elseif ($booking2->status_name == "Approach") { ?>
                    class="label label-warning"
                  <?php } ?> ><?php echo $booking2->status_name ?></span></td>
                  <td><?php echo $booking2->sqm?></td>
                  <td><?php echo $booking2->notes ?></td>
                  <td>
                    <form>
                          <a class="btn btn-success btn-xs" <?php echo anchor('sales/c_sales/edit_myclient/'.$booking2->booking_id,'Edit'); ?></a>
                    </form>
                  </td>
                </tr>
              <?php } } }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
