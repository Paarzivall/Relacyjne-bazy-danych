<!DOCTYPE html>
<html>
    <head>
        <title>Projekt zaliczeniowy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid mt-5 d-flex justify-content-center">
            <a href="klient.php" class="btn btn-secondary col-md-5"><h1>Klient</h1></a>
            <a href="pracownik.php" class="btn btn-secondary col-md-5 ml-2"><h1>Pracownik</h1></a>
        </div>
        <div class="container-fluid mt-5 text-center">
            <h1 class="text-center">Aktualnie Gramy</h1>
            <?php
                include("dane.php");
                $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
                or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
                mysqli_set_charset($connection, "utf-8");
                
                $zapytanie="SELECT seanse.Tytul_Filmu, seanse.Typ_Seansu, seanse.Data_Seansu, seanse.Godzina_Seansu, seanse.ID_Sali, sale_kinowe.Ilosc_Miejsc
                FROM seanse
                LEFT JOIN sale_kinowe ON seanse.ID_Sali = sale_kinowe.ID_Sali";
                $rezultat=mysqli_query($connection, $zapytanie);
                
                while($bufor=mysqli_fetch_assoc($rezultat))
                {
                    echo "<h2 class='text-danger mt-4'>".$bufor["Tytul_Filmu"]." (".$bufor["Typ_Seansu"].")</h2>";
                    echo "<h3>".$bufor["Data_Seansu"]."</h3>";
                    echo "<h3>".$bufor["Godzina_Seansu"]."</h3>";
                    echo "<h3> Sala numer: ".$bufor["ID_Sali"]."</h3>";
                }
                echo "</select>";


                mysqli_close($connection);  
            ?>
        </div>
    </body>
</html>