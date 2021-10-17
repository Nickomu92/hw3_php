<!-- Модель "Home_model.php" -->
<?php
    class Home_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        // Метод для получения списка категорий товаров
        public function getCategories()
        {
            $res = $this->db->get('categories');
            return $res->result_array();
        }

        // Метод для получения списка всех товаров
        public function getItems()
        {
            $res = $this->db->get('items');
            return $res->result_array();
        }

        // Метод для получения списка товаров по Id
        public function getItemById($id)
        {
            $query = $this->db->get_where('items', array('id' => $id));
            return $query->result_array();
        }

        // Метод для получения списка товаров по определенной категории 
        public function getItemsByCategory($catid)
        {
            $query = $this->db->get_where('items', array('catid' => $catid));
            return $query->result_array();
        }

        // Метод добавления изображений в таблицу "images"
        public function addImages($data)
        {
            $insert = $this->db->insert('images', $data);
            if($insert)
            {
                return $this->db->insert_id();
            }

            else 
            {
                return false;
            }
        }
    }
?>