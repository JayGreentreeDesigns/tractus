<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('tickets_model');
		
		
	}

	public function index()
	{
	
		$cats = $this->tickets_model->get_categories();
		$priorities = $this->config->item('priority_settings');
		$statuses = $this->config->item('status_settings');
		$users = $this->tickets_model->get_users();
		
		
		$this->load->view('tickets/index', array('categories' => $cats, 'priorities' => $priorities, 'statuses' => $statuses, 'users' => $users));
	}
	
	public function add() {
		
		$ticket_title = $this->input->post('ticket_title');
		$ticket_raised_by = $this->input->post('ticket_raised_by');
		$ticket_assigned_to = $this->input->post('ticket_assigned_to');
		$ticket_status = $this->input->post('ticket_status');
		$ticket_category = $this->input->post('ticket_category');
		$ticket_priority = $this->input->post('ticket_priority');
		$ticket_description = $this->input->post('ticket_description');
		$ticket_received = $this->input->post('ticket_received');
		$ticket_resolved = $this->input->post('ticket_resolved');

		$this->tickets_model->add($ticket_title, $ticket_raised_by, $ticket_assigned_to, $ticket_status, $ticket_category, $ticket_priority, $ticket_description, $ticket_received, $ticket_resolved);
		
		mkdir('./uploads/'.mysql_insert_id());
		mkdir('./uploads/thumbnails/'.mysql_insert_id());
		
		
	}
	
	public function edit() {
		
		$ticket_title = $this->input->post('ticket_title');
		$ticket_raised_by = $this->input->post('ticket_raised_by');
		$ticket_assigned_to = $this->input->post('ticket_assigned_to');
		$ticket_status = $this->input->post('ticket_status');
		$ticket_category = $this->input->post('ticket_category');
		$ticket_priority = $this->input->post('ticket_priority');
		$ticket_description = $this->input->post('ticket_description');
		$ticket_received = $this->input->post('ticket_received');
		$ticket_resolved = $this->input->post('ticket_resolved');
		$id = $this->input->post('id');

		
		$this->tickets_model->edit($ticket_title, $ticket_raised_by, $ticket_assigned_to, $ticket_status, $ticket_category, $ticket_priority, $ticket_description, $ticket_received, $ticket_resolved, $id);
	}
	
	public function delete() {
	
		$id = $this->input->post('id');
		
		$this->tickets_model->delete($id);
		
	}
	
	function view($id = null) {
		if(!empty($id) && is_numeric($id)) {
		
			// Load in the view.
			// Data will be loaded through jQuery GET request, passing the last URI segment to the function, coming from the view.
		
			$this->load->view('tickets/view');
			
		}
		else {
			redirect('dashboard');
		}
	}
	
	function add_comment() {
		
		$comment = $this->input->post('comment');
		$user_id = $this->input->post('user_id');
		$ticket_id = $this->input->post('ticket_id');
		
		$this->tickets_model->add_comment($comment, $user_id, $ticket_id);
		
	}
	
	function upload_file($id) {
		
		$config = array(
            'script_url' => site_url().'/tickets/upload_file/'.$id.'/',
            'upload_dir' => './uploads/'.$id.'/',
            'upload_url' => base_url().'/uploads/'.$id.'/',
            'param_name' => 'files',
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            'accept_file_types' => '/.+$/i',
            'max_number_of_files' => null,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to true to rotate images based on EXIF meta data, if available:
            'orient_image' => false,
            'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images. You can also add additional versions with
                // their own upload directories:
                /*
                'large' => array(
                    'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/files/',
                    'upload_url' => $this->getFullUrl().'/files/',
                    'max_width' => 1920,
                    'max_height' => 1200,
                    'jpeg_quality' => 95
                ),
                */
                'thumbnail' => array(
                    'upload_dir' => './uploads/thumbnails/'.$id.'/',
                    'upload_url' => base_url().'/uploads/thumbnails/'.$id.'/',
                    'max_width' => 80,
                    'max_height' => 80
                )
            )
        );
		
		$this->load->library('uploadhandler');
		
		$this->uploadhandler->setup($config);

header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Content-Disposition: inline; filename="files.json"');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
        break;
    case 'HEAD':
    case 'GET':
        $this->uploadhandler->get();
        break;
    case 'POST':
        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
              $this->uploadhandler->delete();
        } else {
              $this->uploadhandler->post();
        }
        break;
    case 'DELETE':
         $this->uploadhandler->delete();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}
	}
}
