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
        <div class="container-fluid">
            <div class="col-md-6 float-left">
                <h1 class="text-center">Kup Bilet</h1>
                <form class="mx-auto col-md-6"  method="POST">
                    <div class="form-group">
                        <label for="name">Podaj Imie</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Imie..." required>
                    </div>
                    <div class="form-group">
                        <label for="sec_name">Podaj Nazwisko</label>
                        <input type="text" class="form-control" id="sec_name" name="sec_name" placeholder="Nazwisko..." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Podaj Email</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label for="birth">Podaj Date Urodzenia (dd-mm-rrrr)</label>
                        <input type="text" class="form-control" id="birth" name="birth" placeholder="Data Urodzenia..." required>
                    </div> 
                    <div class="form-group">
                        <label for="ul">Podaj Ulice</label>
                        <input type="text" class="form-control" id="ul" name="ul" placeholder="Ulica..." required>
                    </div>
                    <div class="form-group">
                        <label for="city">Podaj Miasto</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Miasto..." required>
                    </div>
                    <div class="form-group">
                        <label for="kod">Podaj Kod Pocztowy (Format: 12-345)</label>
                        <input type="text" class="form-control" id="kod" name="kod" placeholder="Kod pocztowy..." required>
                    </div>
                    <div class="form-group">
                        <h3 class="text-center">Wybierz film</h3>
                        <?php
                            $zapytanie="SELECT ID_seansu, Tytul_Filmu, Typ_Seansu FROM seanse";
                            $rezultat=mysqli_query($connection, $zapytanie);
                            
                            echo '<select class="form-control mb-2" id="exampleFormControlSelect1" name="seans" id="seans">';
                            while($bufor=mysqli_fetch_assoc($rezultat))
                            {
                                echo '<option value='.$bufor['ID_seansu'].'>'.$bufor['Tytul_Filmu'].' ('.$bufor['Typ_Seansu'].')</option>';
                            }
                            echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                    <select class="form-control mb-2" id="exampleFormControlSelect1" name="typ" id="typ">
                        <option value="1_1">Normalny</option>
                        <option value="1_2">Ulgowy</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto col-12">Zamów</button>
                </form>
            </div>
            
            <div class="col-md-6 float-left">
                <h1 class="text-center">Sprawdź swoje zamówienia</h1>
                <form class="mx-auto col-md-6"  method="POST">
                    <div class="form-group">
                        <label for="email2">Podaj E-mail</label>
                        <input type="text" class="form-control" id="email2" name="email2" placeholder="E-mail..." require>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto col-12">Sprawdź</button>
                </form>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <a href="index.php" class="btn btn-secondary mt-4 col-xl-4"><h1>Do Strony Głównej</h1></a>
        </div>
    </body>
    <?php
        if(isset($_POST["name"])){
            $nam = $_POST["name"];
            $sec_nam = $_POST["sec_name"];
            $email = $_POST["email"];
            $birt = $_POST["birth"];
            $ulica = $_POST["ul"];
            $miasto = $_POST["city"];
            $kod_p = $_POST["kod"];
            
            $seans  = $_POST["seans"];
            $typ = $_POST["typ"];
            $zap = 'SELECT Id_klienta FROM klienci WHERE Email="'.$email.'"';
            $rez = mysqli_query($connection, $zap);
            $bufor = mysqli_fetch_assoc($rez);

            if($bufor["Email"] == NULL){
                $query = "insert into klienci(Imie, Nazwisko, Email, Data_Urodzenia, Ulica, Miasto, Kod_Pocztowy) values (?, ?, ?, ?, ?, ?, ?)";
                $statement = $connection->prepare($query);
                $statement->bind_param("sssssss", $nam, $sec_nam, $email ,$birt, $ulica, $miasto, $kod_p);
                
                $nam = $connection->real_escape_string($nam);
                $sec_nam = $connection->real_escape_string($sec_nam);
                $email = $connection->real_escape_string($email);
                $birt = $connection->real_escape_string($birt);
                $ulica = $connection->real_escape_string($ulica);
                $miasto = $connection->real_escape_string($miasto);
                $kod_p = $connection->real_escape_string($kod_p);
                $statement->execute();
                $statement->close();
            }

            $query = "insert into bilety(Typ_Biletu) values (?)";
            $statement = $connection->prepare($query);
            $statement->bind_param("s", $typ);
            $typ = $connection->real_escape_string($typ);
            $statement->execute();
            $statement->close();


            //łączenie klienta z biletem
            $zapytanie1 = "SELECT ID_Biletu FROM bilety order By ID_Biletu DESC LIMIT 1";
            $rezultat1 = mysqli_query($connection, $zapytanie1);     
            $bufor1 = mysqli_fetch_assoc($rezultat1);
            $bilet = $bufor1["ID_Biletu"];

            $zapytanie2 = 'SELECT Id_klienta FROM klienci WHERE Email="'.$email.'"';
            $rezultat2 = mysqli_query($connection, $zapytanie2); 
            $bufor2 = mysqli_fetch_array($rezultat2);   
            $klient = $bufor2["Id_klienta"];

            $zapytanie3 = "SELECT ID_seansu FROM seanse WHERE ID_seansu=".$seans;
            $rezultat3 = mysqli_query($connection, $zapytanie3);     
            $bufor3 = mysqli_fetch_assoc($rezultat3);
            $seans = $bufor3["ID_seansu"];

            $query = "insert into zamowienia(ID_Biletu, ID_Klienta, ID_Seansu) values (?, ?, ?)";
            $statement = $connection->prepare($query);
            $statement->bind_param("sss", $bilet, $klient, $seans);
                
            $bilet = $connection->real_escape_string($bilet);
            $klient = $connection->real_escape_string($klient);
            $seans = $connection->real_escape_string($seans);
            $statement->execute();
            $statement->close();
        }

          if(isset($_POST["email2"])){
            $email = $_POST["email2"];
            $zapytanie = 'SELECT bilety.ID_biletu, zamowienia.ID_Biletu, zamowienia.ID_Klienta, zamowienia.ID_Seansu, klienci.Id_klienta, seanse.ID_seansu, seanse.Tytul_Filmu, seanse.Typ_Seansu , seanse.Data_Seansu, seanse.Godzina_Seansu, seanse.ID_Sali, klienci.Email
            FROM seanse INNER JOIN (klienci INNER JOIN (bilety INNER JOIN zamowienia ON bilety.ID_biletu = zamowienia.ID_Biletu) ON klienci.Id_klienta = zamowienia.ID_Klienta) ON seanse.ID_seansu= zamowienia.ID_Seansu
            WHERE (((klienci.Email)="'.$email.'"))';
            $rezultat=mysqli_query($connection, $zapytanie);   
            echo '<div class="mt-5 text-center">';    
            while($bufor=mysqli_fetch_assoc($rezultat))
            {
                 echo "<h3>Nazwa Konta: ".$bufor['Email']."</h3>";
                 echo "<h4>Numer Biletu: ".$bufor['ID_biletu']."</h4>";
                 echo "<h4>Tytuł Filmu: ".$bufor["Tytul_Filmu"]." (".$bufor["Typ_Seansu"].")</h4>";
                 echo "<h4>Data seansu: ".$bufor["Data_Seansu"]."</h4>";
                 echo "<h4>Godzina Seansu: ".$bufor["Godzina_Seansu"]."</h4>";
            }
            echo '</div>';
        }



        mysqli_close($connection);                 
    ?>
</html>