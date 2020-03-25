<?php

class Slider
{

    const TARGET_DIR = '/wp-content/uploads/offer_slider/';
    private $file_name;
    private $czy_przeslano_plik = false;
    /**
     * Zwraca wszystkie recordy z tabeli iten_slider
     */
    public function list_slider()
    {
        global $wpdb;
        $data = $wpdb->get_results("SELECT * FROM offer_slider ORDER BY active DESC ");
        include 'listSlider.html';
    }

    public function create_or_edit_slider()
    {
        global $wpdb;
		
		$query_AllID = array(
			'post_type' => 'post',
			'order' => 'ASC',
			'post_status' => 'publish', 
			'category_name' => 'produkty-oferta'
		);
		
		$counter = 0;
		$allPostsID = array();
		$execute_query1 = new WP_Query( $query_AllID ); 
		while ( $execute_query1->have_posts() ) : $execute_query1->the_post();
			$allPostsID[$counter] = get_the_ID();
			$counter++;	
		endwhile;
		wp_reset_query();

        if ($_GET['id']) {
            $id = $_GET['id'];
            $data = $wpdb->get_row("SELECT * FROM offer_slider WHERE id = $id");
        } else {
            // Default variable
            $defaultVariable = array(
				"offer_id" => null,
				"upload_link_photo" =>	"",
				"product_name" =>	"",
				"link_to_page" =>	"",
				"active" =>	"tak"
            );
            $data = (object) $defaultVariable;
        }
        include 'editSlider.html';
    }

    public function delete_slider()
    {
        global $wpdb;
        $wpdb->delete( 'offer_slider', array( 'id' => $_GET['id'] ), array( '%d' ) );
        $this->list_slider();
    }

    public function save_slider()
    {
        if ($this->upload() == 1) {
            if ($_GET['id']) {
                $this->update();
            } else {
                $this->create();
            }
        }
        $this->list_slider();
    }

    private function create()
    {
		global $wpdb;
        $wpdb->insert(
            'offer_slider',
            array(
				'offer_id' => $_POST['offer_id'],
                'upload_link_photo' => home_url() . Slider::TARGET_DIR . $this->file_name,
                'product_name' => trim($_POST['product_name']),
                'link_to_page' => trim($_POST['link_to_page']),
                'active' => $_POST['active']
            ),
            array('%s', '%s', '%s', '%s', '%s')
        );
    }

    private function update()
    {
        global $wpdb;
        $wpdb->update(
            'offer_slider',
            array(
				'offer_id' => $_POST['offer_id'],
                'upload_link_photo' =>  $this->czy_przeslano_plik == false ? $_POST['upload_link_photo'] : home_url() . Slider::TARGET_DIR . $this->file_name,
                'product_name' => trim($_POST['product_name']),
                'link_to_page' => trim($_POST['link_to_page']),
                'active' => $_POST['active']
            ),
            array( 'id' => $_POST['id'] ),
            array('%s', '%s', '%s', '%s', '%s')
        );
    }

    private function upload()
    {
//        $target_dir =  $_SERVER['DOCUMENT_ROOT'] . Slider::TARGET_DIR;
        $target_dir =  __DIR__ . '/../../..' . Slider::TARGET_DIR;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Sprawdza czy odebrano obraz
        // Jesli była aktualizacja moze nie byc obrazu - to jest w porzadku
        if(isset($_POST["submit"])) {
            $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check == false) {
                $this->czy_przeslano_plik = false;
                $uploadOk = 1;
            } else {
                $this->czy_przeslano_plik = true;
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 2000000) {
                    $uploadOk = 0;
                }
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($this->czy_przeslano_plik  == false) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
        $this->file_name = basename($_FILES["fileToUpload"]["name"]);
        return $uploadOk;
    }

}