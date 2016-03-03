<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">About</h3>
	</div>
	<p class="bg-primary">
		All fields marked with <span class="req">*</span> are required
	</p>
	<div class="panel-content">
		<form class="form-horizontal" autocomplete="off" action="signup/entry" method="post">
			<div class="form-group">
				<label for="first_name" class="col-sm-3 control-label">First name<span class="req">*</span>: </label>
				<div class="col-sm-9">
					<input type="text" name="f_name" class="form-control" id="first_name" required="" placeholder="You first name" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="last_name" class="col-sm-3 control-label">Last name<span class="req">*</span>: </label>
				<div class="col-sm-9">
					<input type="text" name="l_name" class="form-control" id="last_name" required="" placeholder="You last name">
				</div>
			</div>
			<div class="form-group">
				<label for="birthday" class="col-sm-3 control-label">Birthday: </label>
				<div class="col-sm-9">
					<input type="date" name="birthday" class="form-control" id="birthday" />
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-3 control-label">Phone<span class="req">*</span>: </label>
				<div class="col-sm-9">
					<input type="tel" name="phone" class="form-control" id="phone" required="" placeholder="(___) ___ __ __" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="male" class="col-sm-3 control-label">Male: </label>
				<div class="col-sm-9">
				
					<input type="radio" id="male" name="sex" value="male"> 
				</div>
			</div>
			<div class="form-group">
				<label for="female"  class="col-sm-3 control-label">Female: </label>
				<div class="col-sm-9">
					<input type="radio" id="female" name="sex" value="female" >
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="col-sm-3 control-label">Email<span class="req">*</span>: </label>
				<div class="col-sm-9">
					<input type="email" name="email" class="form-control" id="inputEmail" required="" placeholder="example@example.com" autocomplete="off" />
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-3 control-label">Password<span class="req">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="password" class="form-control" id="inputPassword3" required="" placeholder="Password" autocomplete="off" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="signup" class="btn btn-default">Sign up</button>
				</div>
			</div>
		</form>
	</div>
</div>