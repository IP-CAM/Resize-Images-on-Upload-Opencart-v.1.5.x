<?php
class ControllerModuleResizeimageupload extends Controller {
	private $error = array();

	public function index() {
        $language = $this->load->language('module/resizeimageupload');
        $this->data = array_merge($this->data, $language);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('resizeimageupload', $this->request->post);			
			$this->session->data['success'] = $this->language->get('text_success');						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_keep'] = $this->language->get('text_keep');

		$this->data['text_intro_instructions'] = sprintf($this->language->get('text_intro'), $this->language->get('text_resize_ext'), 'derek@garudacrafts.com', $this->language->get('href_resize_ext'));

		$this->data['text_multiupload_extensions'] = sprintf($this->language->get('text_multiupload_help'), $this->language->get('href_pim_ext') . ', ' . $this->language->get('href_imp_ext') . ', or ' . $this->language->get('href_mui_ext'));
		$this->data['text_unsupported_scale_pim'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_pim_ext') . '</i>') . ' ' . $this->language->get('text_auto_scale');
		$this->data['text_unsupported_min_pim'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_pim_ext') . '</i>');
		$this->data['text_unsupported_max_pim'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_pim_ext') . '</i>');
		$this->data['text_unsupported_scale_imp'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_imp_ext') . '</i>') . ' ' . $this->language->get('text_auto_scale');
		$this->data['text_unsupported_min_imp'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_imp_ext') . '</i>');
		$this->data['text_unsupported_max_imp'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_imp_ext') . '</i>');
		$this->data['text_unsupported_filetype_pim'] = sprintf($this->language->get('text_unsupported'), '<i>' . $this->language->get('text_pim_ext') . '</i>');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		$error_messages = array(
			'image_upload_filesize_max'		=>	'error_image_upload_filesize_max',
			'image_dimensions_min'			=>	'error_image_dimensions_min',
			'image_dimensions_keep'			=>	'error_image_dimensions_keep',
			'image_dimensions_resize'		=>	'error_image_dimensions_resize',
			'image_filename'				=>	'error_image_filename',
			'image_types'					=>	'error_image_types'
		);

        foreach ($error_messages as $error_message_key => $error_message_value) {
            if (isset($this->error[$error_message_key])) {
				$this->data[$error_message_value] = $this->error[$error_message_key];
            } else {
				$this->data[$error_message_value] = '';
            }
        }

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/resizeimageupload', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = $this->url->link('module/resizeimageupload', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['resizeimageupload_status'])) {
			$this->data['resizeimageupload_status'] = $this->request->post['resizeimageupload_status'];
		} elseif (!is_null($this->config->get('resizeimageupload_status'))) {
			$this->data['resizeimageupload_status'] = $this->config->get('resizeimageupload_status');
		} else {
			$this->data['resizeimageupload_status'] = '1';
		}

		$this->data['multiupload_extensions'] = array();
		
		$this->data['multiupload_extensions'][] = array(
			'id'		=> 0,
      		'name'		=> $this->language->get('text_none'),
			'href'		=> ''
   		);
		
		$this->data['multiupload_extensions'][] = array(
			'id'		=> 1,
      		'name'		=> $this->language->get('text_mui_ext'),
			'href'		=> $this->language->get('href_mui_ext')
   		);
		
		$this->data['multiupload_extensions'][] = array(
			'id'		=> 2,
      		'name'		=> $this->language->get('text_pim_ext'),
			'href'		=> $this->language->get('href_pim_ext')
   		);
		
		$this->data['multiupload_extensions'][] = array(
			'id'		=> 3,
      		'name'		=> $this->language->get('text_imp_ext'),
			'href'		=> $this->language->get('href_imp_ext')
   		);

		if (isset($this->request->post['resizeimageupload_multiupload'])) {
			$this->data['resizeimageupload_multiupload'] = $this->request->post['resizeimageupload_multiupload'];
		} elseif (!is_null($this->config->get('resizeimageupload_multiupload'))) {
			$this->data['resizeimageupload_multiupload'] = $this->config->get('resizeimageupload_multiupload');
		} else {
			$this->data['resizeimageupload_multiupload'] = '0';
		}

		if (isset($this->request->post['resizeimageupload_image_manager_link'])) {
			$this->data['resizeimageupload_image_manager_link'] = $this->request->post['resizeimageupload_image_manager_link'];
		} elseif (!is_null($this->config->get('resizeimageupload_image_manager_link'))) {
			$this->data['resizeimageupload_image_manager_link'] = $this->config->get('resizeimageupload_image_manager_link');
		} else {
			$this->data['resizeimageupload_image_manager_link'] = '1';
		}
	    
		if (isset($this->request->post['resizeimageupload_image_upload_filesize_max'])) {
      		$this->data['resizeimageupload_image_upload_filesize_max'] = $this->request->post['resizeimageupload_image_upload_filesize_max'];
    	} elseif ($this->config->get('resizeimageupload_image_upload_filesize_max')) {
			$this->data['resizeimageupload_image_upload_filesize_max'] = $this->config->get('resizeimageupload_image_upload_filesize_max');
		} else {
      		$this->data['resizeimageupload_image_upload_filesize_max'] = '1024';
    	}
		
		if (isset($this->request->post['resizeimageupload_image_dimensions_min_width'])) {
      		$this->data['resizeimageupload_image_dimensions_min_width'] = $this->request->post['resizeimageupload_image_dimensions_min_width'];
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_min_width')) {
			$this->data['resizeimageupload_image_dimensions_min_width'] = $this->config->get('resizeimageupload_image_dimensions_min_width');
		} else {
      		$this->data['resizeimageupload_image_dimensions_min_width'] = '900';
    	}
		
		if (isset($this->request->post['resizeimageupload_image_dimensions_min_height'])) {
      		$this->data['resizeimageupload_image_dimensions_min_height'] = $this->request->post['resizeimageupload_image_dimensions_min_height'];
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_min_height')) {
			$this->data['resizeimageupload_image_dimensions_min_height'] = $this->config->get('resizeimageupload_image_dimensions_min_height');
		} else {
      		$this->data['resizeimageupload_image_dimensions_min_height'] = '900';
    	}
    	
		if (isset($this->request->post['resizeimageupload_image_dimensions_ratio'])) {
      		$this->data['resizeimageupload_image_dimensions_ratio'] = $this->request->post['resizeimageupload_image_dimensions_ratio'];
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_ratio')) {
			$this->data['resizeimageupload_image_dimensions_ratio'] = $this->config->get('resizeimageupload_image_dimensions_ratio');
		} else {
      		$this->data['resizeimageupload_image_dimensions_ratio'] = '';
    	}

		if (isset($this->request->post['resizeimageupload_image_dimensions_keep'])) {
      		$this->data['resizeimageupload_image_dimensions_keep'] = $this->request->post['resizeimageupload_image_dimensions_keep'];
    	} elseif (!$this->config->get('resizeimageupload_image_dimensions_ratio')) {
			$this->data['resizeimageupload_image_dimensions_keep'] = '';
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_keep')) {
			$this->data['resizeimageupload_image_dimensions_keep'] = $this->config->get('resizeimageupload_image_dimensions_keep');
		} else {
      		$this->data['resizeimageupload_image_dimensions_keep'] = '';
    	}
		
		if (isset($this->request->post['resizeimageupload_image_dimensions_resize_width'])) {
      		$this->data['resizeimageupload_image_dimensions_resize_width'] = $this->request->post['resizeimageupload_image_dimensions_resize_width'];
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_resize_width')) {
			$this->data['resizeimageupload_image_dimensions_resize_width'] = $this->config->get('resizeimageupload_image_dimensions_resize_width');
		} else {
      		$this->data['resizeimageupload_image_dimensions_resize_width'] = '900';
    	}
		
		if (isset($this->request->post['resizeimageupload_image_dimensions_resize_height'])) {
      		$this->data['resizeimageupload_image_dimensions_resize_height'] = $this->request->post['resizeimageupload_image_dimensions_resize_height'];
    	} elseif ($this->config->get('resizeimageupload_image_dimensions_resize_height')) {
			$this->data['resizeimageupload_image_dimensions_resize_height'] = $this->config->get('resizeimageupload_image_dimensions_resize_height');
		} else {
      		$this->data['resizeimageupload_image_dimensions_resize_height'] = '900';
    	}

		if (isset($this->request->post['resizeimageupload_image_filename_min'])) {
      		$this->data['resizeimageupload_image_filename_min'] = $this->request->post['resizeimageupload_image_filename_min'];
    	} elseif ($this->config->get('resizeimageupload_image_filename_min')) {
			$this->data['resizeimageupload_image_filename_min'] = $this->config->get('resizeimageupload_image_filename_min');
		} else {
      		$this->data['resizeimageupload_image_filename_min'] = '3';
    	}
		
		if (isset($this->request->post['resizeimageupload_image_filename_max'])) {
      		$this->data['resizeimageupload_image_filename_max'] = $this->request->post['resizeimageupload_image_filename_max'];
    	} elseif ($this->config->get('resizeimageupload_image_filename_max')) {
			$this->data['resizeimageupload_image_filename_max'] = $this->config->get('resizeimageupload_image_filename_max');
		} else {
      		$this->data['resizeimageupload_image_filename_max'] = '255';
    	}

		$this->data['file_types'] = array(
			'.jpg',
			'.jpeg',
			'.gif',
			'.png',
			'.flv'
		);

		if (isset($this->request->post['resizeimageupload_image_types'])) {
			$this->data['resizeimageupload_image_types'] = $this->request->post['resizeimageupload_image_types'];
		} elseif ($this->config->get('resizeimageupload_image_types')) {
			$this->data['resizeimageupload_image_types'] = $this->config->get('resizeimageupload_image_types');	
		} else {
			$this->data['resizeimageupload_image_types'] = array('.jpg','.jpeg');			
		}

		$this->template = 'module/resizeimageupload.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/resizeimageupload')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['resizeimageupload_image_upload_filesize_max']){
			$this->error['image_upload_filesize_max'] = $this->language->get('error_image_upload_filesize_max');
		}

		if (!$this->request->post['resizeimageupload_image_dimensions_min_width'] || !$this->request->post['resizeimageupload_image_dimensions_min_height']){
			$this->error['image_dimensions_min'] = $this->language->get('error_image_dimensions_min');
		}

		if (isset($this->request->post['resizeimageupload_image_dimensions_ratio']) && empty($this->request->post['resizeimageupload_image_dimensions_keep'])){
			$this->error['image_dimensions_keep'] = $this->language->get('error_image_dimensions_keep');
		}

		if (!$this->request->post['resizeimageupload_image_dimensions_resize_width'] || !$this->request->post['resizeimageupload_image_dimensions_resize_height']){
			$this->error['image_dimensions_resize'] = $this->language->get('error_image_dimensions_resize');
		}

		if (!$this->request->post['resizeimageupload_image_filename_min'] || !$this->request->post['resizeimageupload_image_filename_max'] || $this->request->post['resizeimageupload_image_filename_min'] < 3 || $this->request->post['resizeimageupload_image_filename_max'] > 255){
			$this->error['image_filename'] = $this->language->get('error_image_filename');
		}

		if (($this->request->post['resizeimageupload_multiupload'] != 2) && !isset($this->request->post['resizeimageupload_image_types'])){
			$this->error['image_types'] = $this->language->get('error_image_types');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	public function install() {		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('resizeimageupload', array('resizeimageupload_status' => 1));
	}
   
	public function uninstall() {         
        $this->load->model('setting/setting');
        $this->model_setting_setting->editSetting('resizeimageupload', array('resizeimageupload_status' => 0));
	}

}
?>