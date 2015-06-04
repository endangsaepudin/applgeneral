        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Group</h1>
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
		<div class="modal fade" id="winFormGroup" tabindex="-1" role="dialog" aria-labelledby="winFormGroupLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="formGroup" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="winFormGroupLabel">Add Group</h4>
					</div>
					<div class="modal-body">						
						<input type="text" id="id" value="0" hidden>
						<div class="form-group">								
							<label for="name">Name</label>								
							<input type="text" class="form-control" id="name" name="name" data-minlength="5" placeholder="Enter group" required>
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
			$('#winFormGroup').modal('show');
			$('#winFormGroupLabel').html("Add Group");
		}
		
		$('#formGroup').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) {
				// handle the invalid form...
				//alert("error");
			} else {
				// everything looks good!
				var id = $("#id").val();
				var name = $("#name").val();
				var datap = "";
				if(id == 0){
					datap = "name="+name;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."group/insert_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormGroup').modal('hide');
						$('#dataTables-group').DataTable({
							responsive: true
						});
					});
				} else {
					datap = "id="+id+"&name="+name;
					$.ajax({
						type: 'POST',
						data: datap,
						url: "<?php echo base_url()."group/update_data" ?>"
					}).done(function(data){
						$("#viewdata").html( data );
						$('#winFormGroup').modal('hide');
						$('#dataTables-group').DataTable({
							responsive: true
						});
					});
				}
				return false;
			}
		})
		
		function editData(id,name,idelete){
			$('#winFormGroup').modal('show');			
			$('#winFormGroupLabel').html("Edit Group");
			$("#id").val(id);
			$('#name').val(name);
		}
		function deleteData(id) {
			if (confirm("Are you sure?")) {
				datap = "id="+id;
				$.ajax({
					type: 'POST',
					data: datap,
					url: "<?php echo base_url()."group/delete_data" ?>"
				}).done(function(data){
					$("#viewdata").html( data );
					$('#winFormGroup').modal('hide');
					$('#dataTables-group').DataTable({
						responsive: true
					});
				});
			}
			return false;
		}
		$(document).ready(function() {	
			$.ajax({
				type: 'GET',
				url: "<?php echo base_url()."group/view_data" ?>"
			}).done(function(data){
				$("#viewdata").html( data );
				$('#dataTables-group').DataTable({
					responsive: true
				});
			});		
		});
    </script>
