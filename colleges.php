<?php 
 require 'layout/admin_header.php';
 ?>

<div class="container-fluid">
  <!-- Page Heading -->
   <div class="card mb-3">
          <div class="card-header">
             <span class="font-weight-bold"><i class="fas fa-table"></i>Colleges List</span> 
            <div class="float-md-right"><button class="btn btn-success">+ Add New</button></div>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>College Name</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Serial Number</th>
                    <th>Course Nmae</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
               	<tbody>
               		 <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                  </tr>
               	</tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
</div>


 <?php 
 require 'layout/admin_footer.php';
  ?>