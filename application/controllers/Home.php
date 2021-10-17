<!-- Контроллер "Home.php" -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('home_model');
        }

        public function index()
        {
            $data['title'] = 'Список категорий товаров';
            $data['text'] = 'The books of Clifford Donald Simak';
            $data['categories'] = $this->home_model-> getCategories();
            $this->load->view('page1', $data);
        }

        
        public function itemsList()
        {
            $data['title'] = 'Список товаров';
            $data['items'] = $this->home_model->getItems();
            $this->load->view('items', $data);
        }


        public function getItemInfo()
        {
            $send = $this->input->post('send');

            if(!$send)
            {
                $data['title'] = "Поиск товара по ID";
                $this->load->view('form_item_id', $data);
            }

            else
            {
                $id = $this->input->post('itemid');
                $item = $this->home_model->getItemById($id);
                $data['item'] = $item;
                $data['description'] = 'Описание товара № ' . $id;
                $this->load->view('item_info', $data);
            }
        }

        public function getItemInfo2()
        {
            if(!$this->input->post('send'))
            {
                $data['list'] = $this->home_model->getItems();
                $data['title'] = "Выбор товара из списка";
                $this->load->view('form_item_id2', $data);
            }

            else 
            {
                $id = $this->input->post('itemid');
                $item = $this->home_model->getItemById($id);
                $data['item'] = $item;
                $data['description'] = 'Описание товара №' . $id;
                $this->load->view('item_info', $data);
            }
        }

        public function selectImages()
        {
            if(!$this->input->post('send'))
                $this->load->view('form_upload');

            else
            {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('image'))
                {
                    $data = array('error'=>$this->upload->display_errors());
                    $this->load->view('form_upload', $data);
                }

                else
                {
                    $info = array('upload_data'=>$this->upload->data());
                    $path = 'assets/images/';

                    $data = array('itemid' => 1, 'imagepath' => $path . $info['upload_data']['file_name']);
                    $itemid = $this->home_model->addImages($data);

                    $info = array('result' => 'Успешно добавлено новое изображение с Id = ' .  $itemid);
                    $this->load->view('form_upload', $info);
                    
                }
            }
        }

        public function selectMultipleImages()
        {
            if(!$this->input->post('send'))
                $this->load->view('form_upload_multiple');


            else
            {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);
                $number_of_files = sizeof($_FILES['upfile']['tmp_name']);

                $files = $_FILES['upfile'];
                $error = array();
                $success = array();

                for($i = 0; $i < $number_of_files; $i++)
                {
                    $_FILES['upfile']['name'] = $files['name'][$i];
                    $_FILES['upfile']['type'] = $files['type'][$i];
                    $_FILES['upfile']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['upfile']['error'] = $files['error'][$i];
                    $_FILES['upfile']['size'] = $files['size'][$i];

                    if($_FILES['upfile']['error'][$i] != 0)
                    {
                        $error['msg' . $i] = 'Файл не загружен ' . $_FILES['upfile']['name'][$i];
                        continue;
                    }

                    if(!$this->upload->do_upload('upfile'))
                    {
                        $error['msg' . $i] = 'Файл не загружен ' . $_FILES['upfile']['name'][$i];
                    }

                    else 
                    {
                        $final_files_data[] = $this->upload->data();
                        $info = array('upload_data'=>$this->upload->data());

                        $path = 'assets/images/';

                        $data = array('itemid'=>2, 'imagepath'=>$path . $info['upload_data']['file_name']);
                        $itemid = $this->home_model->addImages($data);

                        $success['msg'. $i] = 'Успешно добавлено новое изображение с Id = ' . $itemid;
                    }
                }
                $result['error'] = $error;
                $result['success'] = $success;
                $this->load->view('form_upload_multiple', $result);
            }
        }

        public function registration()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('login', 'User name', 'trim|required|min_length[5]|max_length[12]|is_unique[customers.login]', array('required'=>'You have not filled %s.', 'is_unique'=>'Value %s already exists.'));
            $this->form_validation->set_rules('pass1', 'Password', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('pass2', 'Password Confirmation', 'required|matches[pass1]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('form_validation');
            }

            else
            {
                $data['success'] = 'Form data passed the validation';
                $this->load->view('form_validation', $data);
            }
        }


        public function getCatalog()
        {
            if(!$this->input->post('send'))
            {
                $data['title'] = 'Каталог товаров';
                $data['items'] = $this->home_model->getItems();
                sort($data['items']);
                $data['categories'] = $this->home_model->getCategories();

                $this->load->view('catalog', $data);
            }

            else
            {
                $category = $this->input->post('category');
                $price = $this->input->post('price');

                $data['title'] = 'Каталог товаров';
                $data['cat'] = $category;
                $data['price'] = $price;

                if($category > 0)
                    $data['items'] = $this->home_model->getItemsByCategory($category);

                else 
                    $data['items'] = $this->home_model->getItems();
             
                    if($price == 1)
                    {
                        usort($data['items'], function ($item1, $item2) {
                            if ((int)$item1['pricesale'] == (int)$item2['pricesale']) return 0;
                            return (int)$item1['pricesale'] < (int)$item2['pricesale'] ? -1 : 1;
                        });
                    }

                    if($price == 2)
                    {
                        usort($data['items'], function ($item1, $item2) {
                            if ((int)$item1['pricesale'] == (int)$item2['pricesale']) return 0;
                            return (int)$item1['pricesale'] > (int)$item2['pricesale'] ? -1 : 1;
                        });
                    }

                $data['categories'] = $this->home_model->getCategories();
                $this->load->view('catalog', $data);
            }
        }        
    }
?>