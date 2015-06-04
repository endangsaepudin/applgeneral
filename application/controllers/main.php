<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->home();
	}
	
	public function home()
	{
		$this->template->title('Dashboard');
		$this->template->set_partial('navigation', 'layouts/navigation');
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>");
		$this->template->build('home');
	}
	
	public function group()
	{
		$this->template->title('Group');	
		$this->template->set_partial('navigation', 'layouts/navigation');
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>");
		$this->template->append_metadata("<link href='".base_url()."resources/jqueryui/jquery-ui.min.css' rel='stylesheet'>");
		$this->template->build('group');
	}
	
	public function menu()
	{
		$this->template->title('Menu');
		$this->template->set_partial('navigation', 'layouts/navigation');
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>");
		$this->template->build('menu');
	}
	
	public function location()
	{
		$this->template->title('Location');	
		$this->template->set_partial('navigation', 'layouts/navigation');
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>");
		$this->template->build('location');
	}
	
	public function user()
	{
		$this->template->title('User');	
		$this->template->set_partial('navigation', 'layouts/navigation');
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css' rel='stylesheet'>");
		$this->template->append_metadata("<link href='".base_url()."resources/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>");
		$this->template->build('user');
	}
}