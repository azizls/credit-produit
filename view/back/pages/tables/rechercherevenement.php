<?php
include '../config2.php';
$rows=0;
if (isset($_POST ['submit']))
{
    $key = $_POST['key'];
    $sql="SELECT *FROM evenement WHERE id_event LIKE :keyword OR nom_categorie LIKE :keyword OR nom_event LIKE :keyword ORDER BY date_event";
    $pdo = config2::getConnexion();
    $query = $pdo->prepare($sql);
    $query->bindValue(':keyword', '%'.$key.'%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll();
    $rows = $query->rowCount();
}
?>
<!DOCTYPE html>
<html lang="en">


      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">projet events, <span class="text-black fw-bold">évenements</span></h1>
           
          </li>
        </ul>
        
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->

      <!-- partial:../../partials/_sidebar.html -->
     

                <!-- Main -->
                    <article id="main">
                        <header>
                            <h2>liste des évenements</h2>
                          
                        </header>
                        <section class="wrapper style5">
                            <div class="inner">
                            <form action="rechercherevenement.php" method="post" >
                                        <div class="row gtr-uniform"> 
                                            <div class="col-10 col-12-xsmall"> 
                                                <input type="text" name="key"  placeholder="Recherche.." />
                                                <input type="submit" name="submit"  value="chercher" />
                                                
                                            </div>  
                                        </div>
                            </form>
                                <section>
                            
        <table border="1" align="center">
            <tr>
                <th>id_event</th>

                <th>nom_event</th>

                <th>date_event</th>

                <th>time</th>

                <th>nom_categorie</th>

                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            
            <?php
                { if ($rows!=0)
                    {foreach ($results as $evenement ) {
            ?>
            <tr>
                <td><?php echo $evenement['id_event']; ?></td>

                <td><?php echo $evenement['nom_event']; ?></td>

                <td><?php echo $evenement['date_event']; ?></td>

                <td><?php echo $evenement['time']; ?></td>

                <td><?php echo $evenement['nom_categorie']; ?></td>
               
                <td>
                    <form method="POST" action="modifierevenement.php?id_event=<?php echo  $evenement['id_event']; ?>" method="POST">
                        <input type="submit" name="modifier" value="modifier">
                        <input type="hidden" value=<?PHP echo $evenement['id_event']; ?> name="id_event">
                    </form>
                </td>
                <td>
                    <a href="supprimerevenement.php?id_event=<?php echo $evenement['id_event']; ?>">Supprimer</a>
                </td>
            </tr>
            <?php
              }}}
            ?>
        
           
            
        </table>
                                    
                                </section>
                            </div>
                        </section>
                    </article>


		<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.scrollex.min.js"></script>
			<script src="../../assets/js/jquery.scrolly.min.js"></script>
			<script src="../../assets/js/browser.min.js"></script>
			<script src="../../assets/js/breakpoints.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>


            
<script >
var b =document.getElementById("mybtn")

b.addEventListener("CLICK",myFunction() { alert ('WRONG') } ) ;
</script>
</body>

</html>

