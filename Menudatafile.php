<?php

class RestaurantMenu {
    
    private $restaurant_menuList;

    function __construct(array $restaurant_menuList) {
        if (sizeof($restaurant_menuList)>0) {
            $this->restaurant_menuList = $restaurant_menuList;
        } else {
            throw new Exception("There is No such available");
        }
    }

    public function getRestaurant_menu_name() {
        $menuNameList = [];

        foreach($this->restaurant_menuList as $restaurant_var) {
            $restaurantNameList[] = array(
                "name"=>$restaurant_var['name']
            );
        }

        return json_encode($restaurantNameList);
    }

    public function getRestaurant_menu_details($name){
        $data_resp=["Invalid choice"];
        if($name){
            foreach($this->restaurant_menuList as $restaurant_var)
            {
                
                if($restaurant_var['name'] == $name)
                {
                    
                        $data_resp=$restaurant_var;
                        break;
                }
            }
        }
        return json_encode($data_resp);
    }

    
}
?>