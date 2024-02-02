<!doctype html>
<html>
  <header>
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
</header>
  <body>
    <div id="conteneur">
      <h1>Les équipes de National League</h1>    
      <table border= "1">
      <tr>
        <td>ID</td>
        <td>Club</td>
      </tr>
      <?php
        require('ctrl.php');

        $array = getEquipes();
        
        $i =1;
        function ajouteCellule($id, $equipe){
          echo "<tr><td> $id </td> <td> $equipe </td></tr>";
        
        
        
      }
          foreach($array as $equipe){
            
            ajouteCellule($i, $equipe);
            $i++;
            
     
      }
      ?>
      </table>
    </div>
  </body>
</html>