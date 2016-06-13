<?php echo $this->element('admin-navbar');?>
<div id="page-wrapper" class="approve-profile-image">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Approve Profile Image 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-users"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  Approve Profile Image
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">
            <?php echo $this->element('action-msg-div');?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>User Id <?php echo $this->Paginator->sort('id', "<span class='glyphicon glyphicon-sort'>", array('direction' => 'desc','escape' => false));?></th>
                            <th>Full Name <?php echo $this->Paginator->sort('full_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Email Id <?php echo $this->Paginator->sort('email', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>UserName <?php echo $this->Paginator->sort('user_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Package <?php echo $this->Paginator->sort('sub_name', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Mobile No <?php echo $this->Paginator->sort('mob_no', "<span class='glyphicon glyphicon-sort'>", array('escape' => false));?></th>
                            <th>Image URL</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
						if(is_array($users) && count($users)){
							$i = 1;
							foreach($users as $user){?>
                          <tr id="row_<?php echo $i;?>">
                            <th scope="row"><?php echo $user->id;?></th>
                            <td><?php echo $user->full_name;?></td>
                            <td><?php echo $user->email ;?></td>
                            <td><?php echo $user->user_name;?></td>
                            <td><?php echo $user->sub_name;?></td>
                            <td><?php echo $user->mob_no;?></td>
                            <td><a target="_blank" href="<?php echo USER_PROFILE_HTTP_PATH.$user->full_pic;?>">Image Url</td>
                            <td>
                                <button data-dismiss="modal" onclick="fnRejectImg(<?php echo $i;?>, <?php echo $user->id;?>);" class="btn btn-danger" type="button">Decline</button>
                                <button class="btn btn-success"  onclick="fnApproveImg(<?php echo $i;?>, <?php echo $user->id;?>);" type="button">Approve</button></td>
                          </tr>
                          <?php $i++;
						  	}
						  }else{?>
                          	<tr><th scope="row" colspan="8">Record Not Found!</th></tr>
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
function fnRejectImg(rowId, userId){
		$.blockUI({ message: '<h4>Just a moment...</h4>' });
		$.post('<?php echo HTTP_PATH;?>admin/approveProfileImage.html', {id: userId, status: 'no'}, function(data){	
		if(data){
			$.unblockUI();
			fnSuccessDiv('commonMsgDiv', 'commonMsgClass','commonMsgIcon', 'commonMsgText', data);	
			$('#commonMsgDiv').fadeOut('500');
			$('#row_'+rowId).fadeOut('100');
		}
	});
}
	
function fnApproveImg(rowId, userId){
		$.blockUI({ message: '<h4>Just a moment...</h4>' });
		$.post('<?php echo HTTP_PATH;?>admin/approveProfileImage.html', {id: userId, status: 'yes'}, function(data){	
		if(data){
			$.unblockUI();
			fnSuccessDiv('commonMsgDiv', 'commonMsgClass','commonMsgIcon', 'commonMsgText', data);	
			$('#commonMsgDiv').fadeOut('500');
			$('#row_'+rowId).fadeOut('100');
		}
	});
}
</script>