<?php
/**
 * 
 */
class Template
{
	protected $_CI;
	
	public function __construct()
	{
		$this->_CI=&get_instance();
	}

	public function admin($admin, $data=null){
		$data['header'] = $this->_CI->load->view('template/header',$data,true);
		$data['sidebar'] = $this->_CI->load->view('template/sidebar',$data,true);
		$data['konten'] = $this->_CI->load->view($admin,$data,true);
		$this->_CI->load->view('template/template_admin.php', $data);
	}
}
?>