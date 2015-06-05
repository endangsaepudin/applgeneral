<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function index()
	{
	}
	
	public function view_data()
	{
		$query = $this->db->get("menu")->result();
	?>
		<table class="table table-striped table-bordered table-hover" id="dataTables-menu">
			<thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
					<th>CODE</th>
                    <th>IDELETE</th>
					<th>ACTION</th>
				</tr>
            </thead>
            <tbody>
			<?php
			$this->load->model("model_idelete");
			foreach($query as $result){
				$idelete_name = $this->model_idelete->get_idelete_name($result->idelete);
			?>
				<tr>
				<td><?php echo $result->id; ?></td>
				<td><?php echo $result->name; ?></td>
				<td><?php echo $result->code; ?></td>
				<td><?php echo $idelete_name; ?></td>
				<td>
					<a class="btn btn-success btn-sm" onclick="editData(<?php echo $result->id; ?>,'<?php echo $result->name; ?>','<?php echo $result->code; ?>',<?php echo $result->idelete; ?>);">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a class="btn btn-danger btn-sm" onclick="deleteData(<?php echo $result->id; ?>);">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
				</td>
				</tr>
			<?php
			}
			?>
            </tbody>
        </table>
	<?php
	}
	
	public function insert_data()
	{
		$name = $this->input->post("name",true);
		$code = $this->input->post("code",true);
		$idelete = 0;
		$data = array("name"=>$name,'code'=>$code,"idelete"=>$idelete);
		if($this->db->insert("menu",$data)){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> Data has been saved successfully.
			</div>
		<?php
			$this->view_data();
		} else {
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> Data can not be saved.
			</div>
		<?php
		}
	}
	
	public function update_data()
	{
		$id = $this->input->post("id",true);
		$name = $this->input->post("name",true);
		$code = $this->input->post("code",true);
		$idelete = 0;
		$data = array("name"=>$name,'code'=>$code,"idelete"=>$idelete);
		if($this->db->where("id",$id)->update("menu",$data)){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> Data has been updated successfully.
			</div>
		<?php
			$this->view_data();
		} else {
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> Data can not be updated.
			</div>
		<?php
		}
	}
	
	public function delete_data()
	{
		$id = $this->input->post("id",true);
		if($this->db->where("id",$id)->delete("menu")){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> Data has been deleted successfully.
			</div>
		<?php
			$this->view_data();
		} else {
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> Data can not be deleted.
			</div>
		<?php
		}
	}
}