<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
	}
	
	public function view_data()
	{
		$query = $this->db->get("[user]")->result();
	?>
		<table class="table table-striped table-bordered table-hover" cellspacing="0" id="dataTables-user" width="1550">
			<thead>
                <tr>
                    <th width="100">ID</th>
                    <th width="150">NAME</th>
					<th width="150">USERNAME</th>
					<th width="150">EMAIL</th>
                    <th width="150">STATUS</th>
					<th width="150">ACTIVATION CODE</th>
					<th width="150">CREATED</th>
					<th width="150">UPDATED</th>
					<th width="150">DEPARTMENT</th>
					<th width="150">RANK</th>
					<th width="100">ACTION</th>
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
				<td><?php echo $result->username; ?></td>
				<td><?php echo $result->email; ?></td>
				<td><?php echo $idelete_name; ?></td>
				<td><?php echo $result->activation_code; ?></td>
				<td><?php echo $result->create_date; ?></td>
				<td><?php echo $result->edit_date; ?></td>
				<td><?php echo $result->department_id; ?></td>
				<td><?php echo $result->rank_id; ?></td>
				<td>
					<a class="btn btn-success btn-sm" onclick="editData(<?php echo $result->id; ?>,'<?php echo $result->name; ?>','<?php echo $result->username; ?>','<?php echo $result->email; ?>',<?php echo $result->idelete; ?>,<?php echo $result->department_id; ?>,<?php echo $result->rank_id; ?>);">
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
		$this->load->library('form_validation');
		$name = $this->input->post("name",true);
		$username = $this->input->post("username",true);
		$email = $this->input->post("email",true);
		$department_id = $this->input->post("department_id",true);
		$rank_id = $this->input->post("rank_id",true);
		$idelete = 0;
		$create_date = date("Y-m-d H:i:s",time());
		$activation_code = md5(uniqid());
		$data = array("name"=>$name,'username'=>$username,"email"=>$email,'rank_id'=>$rank_id,'department_id'=>$department_id,"idelete"=>$idelete,"create_date"=>$create_date,"activation_code"=>$activation_code);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[[user].email]');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[[user].username]');
		$this->form_validation->set_message('is_unique', '%s is taken');
		if($this->form_validation->run()){
			if($this->db->insert("[user]",$data)){
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
				$this->view_data();
			}
		} else {
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> Data can not be saved. <?php echo validation_errors(); ?>
			</div>
		<?php
			$this->view_data();
		}
	}
	
	public function update_data()
	{
		$this->load->library('form_validation');
		$id = $this->input->post("id",true);
		$name = $this->input->post("name",true);
		$username = $this->input->post("username",true);
		$email = $this->input->post("email",true);
		$department_id = $this->input->post("department_id",true);
		$rank_id = $this->input->post("rank_id",true);
		$idelete = 0;
		$edit_date = date("Y-m-d H:i:s",time());
		$activation_code = md5(uniqid());
		$data = array("name"=>$name,'username'=>$username,"email"=>$email,'rank_id'=>$rank_id,'department_id'=>$department_id,"edit_date"=>$edit_date);
		$old_data = $this->db->where("id",$id)->get("[user]")->row();
		$old_data->email;
		$old_data->username;
		$need_to_validate = false;
		if($old_data->username != $username){
			$this->form_validation->set_rules('username','Username','required|trim|is_unique[[user].username]');
			$need_to_validate = true;
		}
		if($old_data->email != $email){
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[[user].email]');
			$need_to_validate = true;
		}
		$this->form_validation->set_message('is_unique', '%s is taken');
		if(($this->form_validation->run() and $need_to_validate) or !$need_to_validate  ){
			if($this->db->where("id",$id)->update("[user]",$data)){
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
					<strong>Error!</strong> Data can not be updatedd.
				</div>
			<?php
				$this->view_data();
			}
		} else {
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> Data can not be updated. <?php echo validation_errors(); ?>
			</div>
		<?php
			$this->view_data();
		}
	}
	
	public function delete_data()
	{
		$id = $this->input->post("id",true);
		//if($this->db->where("id",$id)->delete("location")){
		$data = array("idelete"=>1);
		if($this->db->where("id",$id)->update("[user]",$data)){
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