<?php include "includes/header.php"; ?>
  
   <div class="container" style="margin-top:30px;">
       <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
                  <div class="panel-body">
                   <form role="form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username or Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password <a href="/sessions/forgot_password">(forgot password)</a></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-sm btn-default">Sign in</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
</div>