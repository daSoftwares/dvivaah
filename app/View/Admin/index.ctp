<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 center-block"></div>
            <div class="col-lg-4 center-block username-password-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" action="<?php echo $this->webroot;?>admin/index.html" method="post">
                        <?php echo $this->element('action-msg-div');?>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="<?php echo $this->webroot;?>admin/forgotPassword.html" class="btn btn-default" type="reset">Forgot Password</a>
                        </form>
                    </div>
                </div>                           
            </div>
        </div>
    </div>
</div> 
<!-- /#page-wrapper -->