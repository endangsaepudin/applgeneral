         <style>
			div.dataTables_scrollHeadInner table { margin-bottom: 5px !important }
			div.dataTables_scrollBody  > table.dataTable thead .sorting:after {
				content: "";
			}
			div.dataTables_scrollBody  > table.dataTable thead .sorting_asc:after {
				content: "";
			}
			div.dataTables_scrollBody  > table.dataTable thead .sorting_desc:after {
				content: "";
			}
		</style>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
						<div class="panel-heading">
                            <button type="button" class="btn btn-primary btn-sm"  onclick="addData();">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
								<div id="viewdata"></div>								
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
		<!-- Modal -->
		<div class="modal fade" id="winFormUser" tabindex="-1" role="dialog" aria-labelledby="winFormUserLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="formUser" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="winFormUserLabel">Add Group</h4>
					</div>
					<div class="modal-body">
						<input type="text" id="id" value="0" hidden>
						<div class="form-group">								
							<label for="name">Name</label>								
							<input type="text" class="form-control" id="name" name="name" data-minlength="5" placeholder="Enter name" required>
							<span class="help-block">Minimum of 5 characters</span>
						</div>
						<div class="form-group">								
							<label for="username">Username</label>								
							<input type="text" class="form-control" id="username" name="username" data-minlength="5" placeholder="Enter username" required>
							<span class="help-block">Minimum of 5 characters</span>
						</div>
						<div class="form-group">
							<label for="email">Email</label>								
							<input type="email" class="form-control" name="email" id="email" data-error="Email address is invalid" placeholder="Email" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">								
							<label for="department_id">Department Id</label>								
							<input type="number" class="form-control" id="department_id" name="department_id" placeholder="Enter department id" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">								
							<label for="rank_id">Rank Id</label>								
							<input type="number" class="form-control" id="rank_id" name="rank_id" placeholder="Enter rank id" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>resources/startbootstrap-sb-admin-2-1.0.7/dist/js/sb-admin-2.js"></script>
	
	<!-- JQuery UI -->
    <script src="<?php echo base_url(); ?>resources/jqueryui/jquery-ui.min.js"></script>
	
	<!-- Form Validator -->
	<script src="<?php echo base_url(); ?>resources/validator/validator.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>		
		function addData(){
			$('#winFormUser').modal('show');
			$('#winFormUserLabel').html("Add User");
		}
		$('#winFormUser').on('hidden.bs.modal', function(){
			$(this).find('form')[0].reset();
		});
		$('#formUser').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) {
				// handle the invalid form...
				//alert("error");
			} else {
				var id = $("#id").val();
				var name = $("#name").val();
				var department_id = $("#department_id").val();
				var rank_id = $("#rank_id").val();
				var username = $("#username").val();
				var email = $("#email").val();
				var datap = "";
				if(id == 0){
					datap = "name="+name+"&username="+username+"&email="+email+"&department_id="+department_id+"&rank_id="+rank_id;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."user/insert_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormUser').modal('hide');
						$('#dataTables-user').DataTable({
							responsive: true,
							"scrollX": true
						});
					});
				} else {
					datap = "id="+id+"&name="+name+"&username="+username+"&email="+email+"&department_id="+department_id+"&rank_id="+rank_id;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."user/update_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormUser').modal('hide');
						$('#dataTables-user').DataTable({
							responsive: true,
							"scrollX": true
						});
					});
				}
				return false;
			}
		});
		function editData(id,name,username,email,idelete,department_id,rank_id){
			$('#winFormUser').modal('show');			
			$('#winFormUserLabel').html("Edit User");
			$("#id").val(id);
			$('#name').val(name);
			$('#username').val(username);
			$('#email').val(email);
			$('#department_id').val(department_id);
			$('#rank_id').val(rank_id);
		}
		function deleteData(id) {
			if (confirm("Are you sure?")) {
				datap = "id="+id;
				$.ajax({
					type: 'POST',
					data: datap,
					url: "<?php echo base_url()."user/delete_data" ?>"
				}).done(function(data){
					$("#viewdata").html( data );
					$('#winFormUser').modal('hide');
					$('#dataTables-user').DataTable({
						responsive: true,
						"scrollX": true
					});
				});
			}
			return false;
		}
		$(document).ready(function() {	
			$.ajax({
				type: 'GET',
				url: "<?php echo base_url()."user/view_data" ?>"
			}).done(function(data){
				$("#viewdata").html( data );
				$('#dataTables-user').DataTable({
					responsive: true,
					"scrollX": true
				});
			});		
		});
    </script>
