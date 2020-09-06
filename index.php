<!DOCTYPE html>
    <head>
        <title>Restaurant_Menu</title>
        
		<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		
       
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       
    </head>
    <body id="mainb">
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
		  <a class="navbar-brand" href="#">
			<img src="main.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
			GoodChef: Restaurant Menu 
		  </a>
		</nav>
       

        <div class="cont2">
            <h1">Select Your Menu</h1>
          </div>
          
          <div class="container">
            <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant">
              <option value="">Select Menu</option>
          </select>
          <br>
        
          <table id="table" class="table table-light table table-hover table-bordered table_data">
            <tr>
              <th>Name</th>
              <td id="menuname"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="psmall"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="plarge"></td>
            </tr>
            <tr>
              <th>Small Portion Name</th>
              <td id="spname"></td>
            </tr>
            <tr>
              <th>Large Portion Name</th>
              <td id="lpname"></td>
            </tr>
          </table>
        
      
          </div>
        

        
        <script>
        let base_url = "restautantdetail.php";

        $("document").ready(function(){
            getRestaurantData();
            document.querySelector("#restaurant").addEventListener("change",getList_Items);
        });

        function getRestaurantData() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(value,success){
                for (const a in value) {
                let opt = document.createElement("option");
                opt.textContent = value[a].name;
                opt.value = value[a].name; 
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }

        
            function getList_Items(k)
            {
                
                let index=k.target.value;
                
                console.log(index);
                let url=base_url + "?req=menuName&name="+index;
                $.get(url,function(val,success){
                    
                        
                        if(val != null){
                        let x = val;
                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        let smallpname = x.small_portion_name;
                        if(smallpname == null)
                        {
                            smallpname = "Not Available";
                        }
                        let largepname = x.large_portion_name;
                        if(largepname == null)
                        {
                            largepname = "Not Available";
                        }
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                        document.querySelector("#spname").textContent = smallpname;
                        document.querySelector("#lpname").textContent = largepname;
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
        

    </script>

       
        
        
        <footer class= "foota">
		  © Details:
				  <a href="mailto:vcdangri@mitaoe.ac.in">vcdangri@mitaoe.ac.in</a>
		 
		</footer>
		
		<script src="jquery-3.5.1.min.js"></script>
				
        
    </body>
</html>
