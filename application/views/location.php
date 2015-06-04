        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Location</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
						<div class="panel-heading">
                            <button type="button" class="btn btn-primary btn-lg"  onclick="addData();">
								Add
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
		<div class="modal fade" id="winFormLocation" tabindex="-1" role="dialog" aria-labelledby="winFormLocationLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="formLocation" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="winFormLocationLabel">Add Group</h4>
					</div>
					<div class="modal-body">
						<input type="text" id="id" value="0" hidden>
						<div class="form-group">								
							<label for="name">Name</label>								
							<input type="text" class="form-control" id="name" name="name" data-minlength="5" placeholder="Enter name" required>
							<span class="help-block">Minimum of 5 characters</span>
						</div>
						<div class="form-group">								
							<label for="left_id">Left Id</label>								
							<input type="text" class="form-control" id="left_id" name="left_id" placeholder="Enter left id" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">								
							<label for="right_id">Right Id</label>								
							<input type="text" class="form-control" id="right_id" name="right_id" placeholder="Enter right id" required>
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
			$('#winFormLocation').modal('show');
			$('#winFormLocationLabel').html("Add Location");
		}
		$('#winFormLocation').on('hidden.bs.modal', function(){
			$(this).find('form')[0].reset();
		});
		$('#formLocation').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) {
				// handle the invalid form...
				//alert("error");
			} else {
				var id = $("#id").val();
				var name = $("#name").val();
				var left_id = $("#left_id").val();
				var right_id = $("#right_id").val();
				var datap = "";
				if(id == 0){
					datap = "name="+name+"&left_id="+left_id+"&right_id="+right_id;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."location/insert_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormLocation').modal('hide');
						$('#dataTables-location').DataTable({
							responsive: true
						});
					});
				} else {
					datap = "id="+id+"&name="+name+"&left_id="+left_id+"&right_id="+right_id;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."location/update_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormLocation').modal('hide');
						$('#dataTables-location').DataTable({
							responsive: true
						});
					});
				}
				return false;
			}
		});
		function editData(id,name,left_id,right_id,idelete){
			$('#winFormLocation').modal('show');			
			$('#winFormLocationLabel').html("Edit Location");
			$("#id").val(id);
			$('#name').val(name);
			$('#left_id').val(left_id);
			$('#right_id').val(right_id);
		}
		function deleteData(id) {
			if (confirm("Are you sure?")) {
				datap = "id="+id;
				$.ajax({
					type: 'POST',
					data: datap,
					url: "<?php echo base_url()."location/delete_data" ?>"
				}).done(function(data){
					$("#viewdata").html( data );
					$('#winFormLocation').modal('hide');
					$('#dataTables-location').DataTable({
						responsive: true
					});
				});
			}
			return false;
		}
		$(document).ready(function() {	
			$.ajax({
				type: 'GET',
				url: "<?php echo base_url()."location/view_data" ?>"
			}).done(function(data){
				$("#viewdata").html( data );
				$('#dataTables-location').DataTable({
					responsive: true
				});
			});		
		});
    </script>
