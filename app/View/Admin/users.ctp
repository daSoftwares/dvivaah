<?php echo $this->element('admin-navbar');?>
<div id="page-wrapper" class="user-details">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-users"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  USERS
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- Modal -->
            <div class="modal fade" id="editDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
                  </div>
                  <div class="modal-body" id="userSettings">
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
            <form action="<?php echo HTTP_PATH;?>admin/users.html">
            	<?php $user_term = isset($this->request->query['user']) ? $this->request->query['user'] : '';?>
                <select name="user" class="dashboard-selectbox" onchange="form.submit();">
                    <option value="users" <?php echo $user_term == 'users' ? 'selected' : '';?>>Total Users</option>
                    <option value="active_users" <?php echo $user_term == 'active_users' ? 'selected' : '';?>>Active Users</option>
                    <option value="paid_users" <?php echo $user_term == 'paid_users' ? 'selected' : '';?>>Paid Users</option>
                    <option value="female_users" <?php echo $user_term == 'female_users' ? 'selected' : '';?>>Total Active Female Users</option>
                    <option value="male_users" <?php echo $user_term == 'male_users' ? 'selected' : '';?>>Total Active Mail Users</option>
                    <option value="online_users" <?php echo $user_term == 'online_users' ? 'selected' : '';?>>Users Registered Online</option>
                    <option value="admins_users" <?php echo $user_term == 'admins_users' ? 'selected' : '';?>>Users Registered By Admin</option>
                    <option value="less30_users" <?php echo $user_term == 'less30_users' ? 'selected' : '';?>>Users With Less than 30 Days validity </option>
                    <option value="inactive_users" <?php echo $user_term == 'inactive_users' ? 'selected' : '';?>>Inactive Users</option>
                </select>
		 </form>
            <form action="<?php echo HTTP_PATH;?>admin/users.html">
            	<?php $search_term = isset($this->request->query['term']) ? $this->request->query['term'] : '';?>
            	<input type="text" name="term" value="<?php echo $search_term;?>" placeholder="Search" class="search-record">
            </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>User Id  <?php echo $this->Paginator->sort('id', "<span class='glyphicon glyphicon-sort'>", array('direction' => 'desc','escape' => false));?></th>
                            <th>Full Name <?php echo $this->Paginator->sort('full_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Email Id <?php echo $this->Paginator->sort('email', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>UserName <?php echo $this->Paginator->sort('user_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Package <?php echo $this->Paginator->sort('sub_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Registered on <?php echo $this->Paginator->sort('user_registered_on', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Last Subscribed <?php echo $this->Paginator->sort('date_created', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Gender <?php echo $this->Paginator->sort('user_type', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Source <?php echo $this->Paginator->sort('registered_source', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Status <?php echo $this->Paginator->sort('is_active', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(count($users)){
							  foreach($users as $user){?>
                          <tr>
                            <th scope="row"><?php echo $user->id;?></th>
                            <td><?php echo $user->full_name;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->user_name;?></td>
                            <td><?php echo $user->sub_name;?></td>
                            <td><?php echo date('Y-M-d', strtotime($user->user_registered_on));?></td>
                            <td><?php echo date('Y-M-d', strtotime($user->date_created));?></td>
                            <td><?php echo ($user->user_type ? 'Male' : 'Female');?></td>
                            <td><?php echo $user->registered_source;?></td>
                            <td><?php echo ($user->is_active ? 'Active' : 'Inactive');?></td>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-cog" onclick="fnEditDetails(<?php echo $user->id;?>)" ></span></td>
                          </tr>
                          <?php }
						  }else{?>
                          	<th scope="row" colspan="11">No Record Found!</th>
                          <?php }?>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                   <?php 
					echo $this->Paginator->prev(__('«'), array('tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('tag' => 'li','currentTag' => 'a', 'currentClass' => 'active', 'separator' => ''));
					echo $this->Paginator->next(__('»'), array('tag' => 'li', 'disabledTag' => 'a'));
					?>
                    </ul>
                </nav>
            </div>
        </div>
<!-- /#page-wrapper -->
<script>
function fnEditDetails(userId){
	$.blockUI({ message: '<h4>Just a moment...</h4>' });
		$.get('<?php echo HTTP_PATH;?>admin/updateUserSetting/'+userId, {}, function(data){	
		if(data){
			$.unblockUI();
			$('#userSettings').html(data);
			$('#editDetails').modal('show'); 
		}
	});	
}
</script>