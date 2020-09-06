<?php
header("Content-type: application/json");
require 'Menudatafile.php';


$req = $_GET['req'] ?? null;

if ($req) {
    $jsondata1 = file_get_contents("restaurant.json");
    $item_list = json_decode($jsondata1, true)['menu_items'];
    try {
        $Data_restaurant = new RestaurantMenu($item_list);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'menu_name_list':
        echo $Data_restaurant->getRestaurant_menu_name();
        break;
    
    case 'menuName':
        $name=$_GET['name'] ?? null;
        echo $Data_restaurant->getRestaurant_menu_details($name);
        break;

    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>