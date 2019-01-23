<!DOCTYPE html>
<html>
    <head>
        <title>Projekt zaliczeniowy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <?php
        include("dane.php");
        $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
        or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
        mysqli_set_charset($connection, "utf-8");
    ?>
        <div class="container-fluid ">
            <div class="col-md-6 float-left">
                <h1 class="text-center">Dodaj nowy seans</h1>
                <form class="mx-auto col-md-6"  method="POST">
                    <div class="form-group">
                        <label for="tytul">Podaj Tytuł Filmu</label>
                        <input type="text" class="form-control" id="tytul" name="tytul" placeholder="Tytuł filmu..." required>
                    </div>
                    <div class="form-group">
                        <label for="dat">Podaj Date seansu filmu</label>
                        <input type="text" class="form-control" id="dat" name="dat" placeholder="Data Seansu..." required>
                    </div>
                    <div class="form-group">
                        <label for="godz">Podaj Godzine seansu</label>
                        <input type="text" class="form-control" id="godz" name="godz" placeholder="Godzina Seansu..." required>
                    </div>
                    <div class="form-group">
                        <label for="sala">Wybierz Sale</label>
                        <?php
                            $zapytanie = "SELECT ID_Sali, Ilosc_Miejsc FROM sale_kinowe";
                            $rezultat = mysqli_query($connection, $zapytanie);
                            
                            echo '<select class="form-control mb-2" id="exampleFormControlSelect1" name="sala" id="sala">';
                            while($bufor = mysqli_fetch_assoc($rezultat))
                            {
                                echo '<option value='.$bufor['ID_Sali'].'>Sala nr.: '.$bufor['ID_Sali'].' Miejsc: '.$bufor['Ilosc_Miejsc'].'</option>';
                            }
                            echo "</select>";
                            
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="typ">Podaj Typ Seansu (2D/3D)</label>
                        <input type="text" class="form-control" id="typ" name="typ" placeholder="Typ Seansu..." required>
                    </div>
    
                    <button type="submit" class="btn btn-primary mx-auto col-12">Dodaj Seans</button>
                </form>
            </div>
            <div class="col-md-6 float-left">
                <h1 class="text-center">Usuń seans</h1>
                <form class="mx-auto col-md-6"  method="POST">
                    <div class="form-group">
                        <label for="del">Wybierz Sale</label>
                        <?php
                            $zapytanie = "SELECT ID_seansu, Tytul_Filmu FROM seanse";
                            $rezultat = mysqli_query($connection, $zapytanie);
                            
                            echo '<select class="form-control mb-2" name="del" id="del">';
                            while($bufor = mysqli_fetch_assoc($rezultat))
                            {
                                //echo $bufor["ID_seansu"];
                                echo '<option value='.$bufor['ID_seansu'].'>Nr.:'.$bufor['ID_seansu'].' -- '.$bufor['Tytul_Filmu'].'</option>';
                            }
                            echo "</select>";
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto col-12">Usuń seans</button>
                </form>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <a href="index.php" class="btn btn-secondary mt-4 col-xl-4"><h1>Do Strony Głównej</h1></a>
        </div>
            <?php
                if(isset($_POST["tytul"])&&isset($_POST["dat"])&&isset($_POST["godz"])&&isset($_POST["sala"])){
                    
                    $tytul = $_POST["tytul"];
                    $dat = $_POST["dat"];
                    $godz = $_POST["godz"];
                    $sala = $_POST["sala"];
                    $typ = $_POST["typ"];

                    $query = "insert into seanse(Tytul_Filmu, Data_Seansu, Godzina_Seansu, ID_Sali, Typ_Seansu) values (?, ?, ?, ?, ?)";
                    $statement = $connection->prepare($query);
                    $statement->bind_param("sssss", $tytul, $dat, $godz, $sala, $typ);         
                    $tytul = $connection->real_escape_string($tytul);
                    $dat = $connection->real_escape_string($dat);
                    $godz = $connection->real_escape_string($godz);
                    $sala = $connection->real_escape_string($sala);
                    $typ = $connection->real_escape_string($typ);
                    $statement->execute();         
                    $statement->close();
                }
                if(isset($_POST["del"])){
                    $id=$_POST["del"];
					$zapytanie="DELETE FROM seanse WHERE ID_seansu=".$id;
                    $rezultat=mysqli_query($connection, $zapytanie);			
					if($rezultat)
					{
						echo '<h5 class="mx-auto mb-5 text-danger">Usunięto</h5>';		
					}
                }
                mysqli_close($connection); 
            ?>
    </body>
</html>