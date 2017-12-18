<div class="modal-dialog modal-md">
	<?php
			session_start();
			$user = $_SESSION["user"];
	?>
	<form role="form" class="form-horizontal" id="edituser_form" method="post">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">User Information</h4>
			</div>
			<div class="modal-body">
				<div id="error">
					<!-- error will be shown here -->
				</div>
				<div class="content text-justify">
					<div class="row">
						<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
							<div class="row">
								<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
									<label>First Name:</label>
								</div>
								<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
									<span class="text-justify" id="fitstNameData">
										<?php
											echo $user["firstname"];
										?>
									</span>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter First Name" name="firstname" id="firstname"  value="<?php echo $user["firstname"];?>"/>
										<span id="check-e"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
									<label>Last Name:</label>
								</div>
								<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
									<span class="text-justify" id="lastNameData">
										<?php
											echo $user["lastname"];
										?>
									</span>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" id="lastname"  value="<?php echo $user["lastname"];?>"/>
										<span id="check-e"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
									<label>Email:</label>
								</div>
								<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
									<span class="text-justify" id="emailData">
										<?php
											echo $user["email"];
										?>
									</span>
									
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Enter email" name="email" id="email"  value="<?php echo $user["email"];?>"/>
										<span id="check-e"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<button type="button" name="edit-user-btn" class="btn btn-default btn-md" id="edit-user-btn">Edit</button>
						</div>
					</div>
					<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
									<input type="button" name="edit-pwd-btn" class="btn btn-default" id="edit-pwd-btn" value="Change Password" />
								</div>
							</div>
							<div class="content" id="divChangePwd">
								<div class="row">
											<h3> Change Password </h3>									
								</div>

								<div class="row" id="divCurrentPwd">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<label>Current Password:</label>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Current Password" name="currentpassword" id="currentpassword"/>
											<span id="check-e"></span>
										</div>
									</div>
								</div>
								<div class="row" id="divNewPwd">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<label>New Password:</label>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword"/>
											<span id="check-e"></span>
										</div>
									</div>
								</div>
								<div class="row" id="divConfirmPwd">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<label>Confirm Password:</label>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
											<span id="check-e"></span>
										</div>
									</div>
								</div>
							</div>							
				</div>
		</div>
			<div class="modal-footer">
				<button type="button" name="cancel-user-btn" class="btn btn-default btn-md" id="cancel-user-btn">Cancel</button>&nbsp;
				<button type="submit" name="submit-user-btn" class="btn btn-default btn-md" id="submit-user-btn">Submit</button>&nbsp;&nbsp;
				<input type="hidden" name="actionType" id="actionType" value=""/>	
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $user["id"];?>"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<script src="/todo/resources/js/edituser.js"></script>
		</form>
	</div>
</div>