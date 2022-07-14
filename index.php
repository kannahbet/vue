<?php
if (isset($_POST['product'])) {

$curl=curl_init("http://localhost:6000/product");
$data=curl_exec($curl);
if($data===false){
var_dump(curl_error($data));
}
curl_close($curl);
}else if (isset($_POST['times'])) {
    $curl=curl_init("http://localhost:6000/temps");
    $data=curl_exec($curl);
    if($data===false){
    var_dump(curl_error($data));
    }
    
    curl_close($curl);
}else if (isset($_POST['faits'])) {
    $curl=curl_init("http://localhost:6000/faits");
$data=curl_exec($curl);
if($data===false){
var_dump(curl_error($data));
}
curl_close($curl);
}
    else if (isset($_POST['csv'])) {
        $curl=curl_init("http://localhost:6000/csv");
$data=curl_exec($curl);
if($data===false){
var_dump(curl_error($data));
}
curl_close($curl);
}


?>


<?php 
require('header.php')
?>
<div class="row">
    <div class="col"><form action="#" method="post"  >
          <label> Ajouter un prouduit</label>
          <button type="submit" name="product">Add Produit</button>
</form></div>
    <div class="col"><form action="#" method="post"  >
          <label> Ajouter les temps</label>
          <button type="submit" name="times">Add times</button>
</form></div>
    <div class="col"><form action="#" method="post"  >
          <label> Ajouter les faits</label>
          <button type="submit" name="faits">Add faits</button>
</form></div>
    <div class="col"><form action="#" method="post"  >
          <label> Extraire le csv</label>
          <button type="submit" name="csv">Extract csv</button>
</form></div>
<div class="col"></div>
        <div class="col"></div>
</div>
<br/>
            <br/>     <br/>
            <br/>
<div style={{width:'800px', height:'800px'}} class="row">
<div class="col">
  <form action="Dynamique.php" method="post" class="mb-3 row"  >
          <h3>Prediction</h3>
          <div class="row">
              <div class="col">   <label> Select console:</label>
          <select  name="Console" class="form-select" aria-label="Default select example">
                            <option value="PS2">PS2</option>
                            <option value="X360">X360</option>
                            <option value="PS3">PS3</option>
                            <option value="PC">PC</option>
            </select></div>
              <div class="col"> <label>Select category:</label>
            <select name="Category" class="form-select" aria-label="Default select example">
                            <option value="Action">Action</option>
                            <option value="Sport">Sport</option>
                            <option value="Shooter">Shooter</option>
                            <option value="Role-palying">Role-playing</option>
            </select></div>
             
          </div>
        
           
           <div class="row">
               <div class="col"><label>Select rating:</label>
            <select name="Rating" class="form-select" aria-label="Default select example">
                            <option value="T">T</option>
                            <option value="E">E</option>
                            <option value="M">M</option>
                            <option value="E10+">E10+</option>
            </select></div>
               <div class="col"> <label>Select User point:</label>
            <select name="User" class="form-select" aria-label="Default select example">
                            <option value="0.1">0.1</option>
                            <option value="0.5">0.5</option>
                            <option value="1.0">1.0</option>
                            <option value="1.5">1.5</option>
            </select></div>
           </div>
           <div class="row">
               <div class="col"><label>Select publisher</label>
            <select name="Publisher" class="form-select" aria-label="Default select example">
                        <option value="Electronic Art">Electronic Arts</option>
                            <option value="Activision">Activision</option>
                            <option value="Ubisoft">Ubisoft</option>
                            <option value="Nintendo">Nintendo</option>
            </select></div>
               <div class="col"> <label>Select critic points:</label>
            <select name="critic" class="form-select" aria-label="Default select example"> 
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
            </select></div>
           </div>
            
           
            
           <br/>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"><button type="submit" name="save">Predire</button></div>
                <div class="col"></div>
            </div>
          
        </form></div>
        <div class="col"></div>
       
        
</div>
</body>
</html>