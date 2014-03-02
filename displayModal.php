
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="loginModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="doLogin.php" method="POST" role="form">
                        <div class="form-group">
                            <!-- <label for="email" class="col-md-8 control-label">Email Address</label>
                                <div class="col-md-15">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div> -->
                            <label for="MemberName" class="col-md-8 control-label">Username</label>
                                <div class="col-md-15">
                                    <input type="text" class="form-control" name="MemberName" placeholder="Username">
                                </div>
                        </div>
                        <div class="form-group">
                          <label for="MemberPassword" class="col-md-8 control-label">Password</label>
                              <div class="col-md-15">
                                  <input type="password" class="form-control" name="MemberPassword" placeholder="Password">
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-8 col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <ul class="list-inline">
                                            <li><input type="checkbox" style="width:0px;"></li>
                                            <li>Remember me?</li>
                                        </ul>
                                    </label>
                                </div>
                                <!-- <input type="submit" class="btn btn-primary" name="submit" value="Sign In"> -->
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>

                        </div>
                      
                    </form>
                                       
                </div>
                <div class="modal-footer">
                    <ul class="list-inline">
                        <li class="pull-left"><h6>Don't have an account? <a href="signup.php"><b>Sign Up!</b></a></h6></li>
                        <!-- <li class="pull-right"><button type="submit" class="btn btn-primary">Sign In</button></li> -->
                        <!-- <li class="pull-right"><input type="submit" class="btn" value="Sign In"></li> -->
                        <!-- <li class="pull-right"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="searchModalLabel">Search</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <form action="doSearch.php" method="POST">
                        <div class="input-group">
                          <input type="text" class="form-control input-lg" style="width:510px;" placeholder="Search" name="searchQuery">
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search"></span></button>
                          </span>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
           <!--  <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="updateProfileModalLabel">Update Profile Picture</h4>
            </div>
            <div class="modal-body">
            <?  $result = mysql_query("SELECT MemberID, MemberFbPhoto FROM Member WHERE MemberID = '$_SESSION[MemberID]'");
                $query = mysql_fetch_array($result); ?>

                    <form action="editProfilePicture.php?memberID=<? echo $_SESSION['MemberID'] ?>" method="POST" class="form-inline">
                        
                        <?  if(!empty($query['MemberFbPhoto'])){
                                echo "<div align='center'><a href='deleteProfilePicture.php?memberID=$_SESSION[MemberID]'><img src='http://graph.facebook.com/$query[MemberFbPhoto]/picture?width=100&height=100' class='img-thumbnail'></a>
                                <span class='help-block'><i>Current Profile Picture or click on photo to remove current.</i></span></div>";
                                echo '<hr>';
                            }
                        ?>
                       <div class="row">
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" style="width:400px;" placeholder="Type your facebook username here" name="MemberFbPhoto">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                    </span>
                                  <!-- <input type="text" class="form-control" placeholder="Type your facebook username here" name="MemberFbPhoto"> -->
                                </div>
                    </form>
                            </div>
                                  </div>
            </div>
           <!--  <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>