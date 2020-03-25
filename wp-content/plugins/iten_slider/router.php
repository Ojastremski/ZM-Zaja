<?php
include 'Slider.php';
$slider = new Slider();

if (empty($_POST)) {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'createoredit':
                $slider->create_or_edit_slider();
                //echo 'jestem w createoredit';
                break;
            case 'delete':
                $slider->delete_slider();
                //echo 'jestem w delete';
                break;
        }
    } else {
        $slider->list_slider();
    }

} else {
    //Zapis formularza
    $slider->save_slider();

}