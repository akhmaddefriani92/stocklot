<?php
     ob_start();
     session_start();
     require_once 'lib/config.php';
     require_once 'lib/rupiah.php';
     include 'lib/ongkir.php';
     
     // if session is not set this will redirect to login page
     if( !isset($_SESSION['user']) ) {
        header("Location: home.php");
        exit;
     }

     else{
        $user_id = $_SESSION['user'];
     }


     function get_user($user_id){
        $user_id = $user_id;

        $query = mysql_query("SELECT * FROM user WHERE user_id = '$user_id'");
        while($result=mysql_fetch_array($query)){
            $alamat = $result['alamat'];

            if ($alamat == "") {
                $fill_status = false;
            }

            else{
                $fill_status = true;
            }
        }

        return $fill_status;
     }

 ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Foundry Multi-purpose HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body class="scroll-assist">

        <?php include 'header.php';?>

        <div class="main-container">

         <!--
            <section class="page-title page-title-4 bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="uppercase mb0">Checkout</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <ol class="breadcrumb breadcrumb-2">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#">Shop</a>
                                </li>
                                <li class="active">Checkout</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        -->
            <section class="pt48 pb48" style="background-color: #f8f8f8;">
                <div class="container">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">


                            <div class="row">
                                <div class="col-md-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12 pt32 pb16" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                    <div class="text-center">
                                        <h4 class="uppercase" style="color: #47b475;">Customer Details</h4>
                                        <hr>
                                    </div>







                            <?php
                                $fill_status = get_user($user_id);

                                if ($fill_status == true) {

                                    $query = mysql_query("SELECT * FROM user WHERE user_id = '$user_id'");

                                    while($result=mysql_fetch_array($query)){
                                        $fname = $result['firstname']; 
                                        $lname = $result['lastname']; 
                                        $hp = $result['hp']; 
                                        $gender = $result['gender']; 
                                        $alamat = $result['alamat'];
                                        $kecamatan = $result['kecamatan'];
                                        $kota = $result['kota'];  
                                        $provinsi = $result['provinsi']; 
                                        $kode_pos = $result['kode_pos']; 

                                        $tgl = $result['tanggal_lahir'];
                                        $tgl = explode('-',$tgl);

                                        $year = $tgl[0];
                                        $month = $tgl[1];
                                        $day = $tgl[2];


                                        if ($month == "01") {
                                            $month_name = "Januari";
                                        }
                                        else if ($month == "02") {
                                            $month_name = "Februari";
                                        }
                                        else if ($month == "03") {
                                            $month_name = "Maret";
                                        }
                                        else if ($month == "04") {
                                            $month_name = "April";
                                        }
                                        else if ($month == "05") {
                                            $month_name = "Mei";
                                        }
                                        else if ($month == "06") {
                                            $month_name = "Juni";
                                        }
                                        else if ($month == "07") {
                                            $month_name = "Juli";
                                        }
                                        else if ($month == "08") {
                                            $month_name = "Agustus";
                                        }
                                        else if ($month == "09") {
                                            $month_name = "September";
                                        }
                                        else if ($month == "10") {
                                            $month_name = "Oktober";
                                        }
                                        else if ($month == "11") {
                                            $month_name = "November";
                                        }
                                        else if ($month == "12") {
                                            $month_name = "Desember";
                                        }
                            ?>


                                        <form class="customer-details mb-xs-40" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-user">
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Depan:</span>
                                                <input type="text" name="fname" value="<?php echo "$fname"; ?>" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Belakang:</span>
                                                <input type="text" name="lname" value="<?php echo "$lname"; ?>" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>

                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Tanggal Lahir:</span>
                                                <select name="day" style="width: 17%;">
                                                    <option selected="selected" value='<?php echo "$day"; ?>'><?php echo "$day"; ?></option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>

                                                <select name="month" style="width: 50%;">
                                                    <option selected="selected" value='<?php echo "$month"; ?>'><?php echo "$month_name"; ?></option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>

                                                <select name="year" style="width: 30%;">
                                                    <option selected="selected" value='<?php echo "$year"; ?>'><?php echo "$year"; ?></option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1939">1939</option>
                                                    <option value="1938">1938</option>
                                                    <option value="1937">1937</option>
                                                    <option value="1936">1936</option>
                                                    <option value="1935">1935</option>
                                                    <option value="1934">1934</option>
                                                    <option value="1933">1933</option>
                                                    <option value="1932">1932</option>
                                                    <option value="1931">1931</option>
                                                    <option value="1930">1930</option>
                                                    <option value="1929">1929</option>
                                                    <option value="1928">1928</option>
                                                    <option value="1927">1927</option>
                                                    <option value="1926">1926</option>
                                                    <option value="1925">1925</option>
                                                    <option value="1924">1924</option>
                                                    <option value="1923">1923</option>
                                                    <option value="1922">1922</option>
                                                    <option value="1921">1921</option>
                                                    <option value="1920">1920</option>
                                                    <option value="1919">1919</option>
                                                    <option value="1918">1918</option>
                                                    <option value="1917">1917</option>
                                                    <option value="1916">1916</option>
                                                    <option value="1915">1915</option>
                                                    <option value="1914">1914</option>
                                                    <option value="1913">1913</option>
                                                    <option value="1912">1912</option>
                                                    <option value="1911">1911</option>
                                                    <option value="1910">1910</option>
                                                    <option value="1909">1909</option>
                                                    <option value="1908">1908</option>
                                                    <option value="1907">1907</option>
                                                    <option value="1906">1906</option>
                                                    <option value="1905">1905</option>
                                                </select>
                                            </div>

                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Jenis Kelamin:</span>
                                                <select name="gender">
                                                    <option selected="" value="<?php echo "$gender"; ?>"><?php echo "$gender"; ?></option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>


                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Handphone:</span>
                                                <input type="text" name="hp" value="<?php echo "$hp"; ?>" pattern="[0-9]{11,13}" placeholder="ex: 08xx xxxx xxxx" maxlength="13" required />
                                            </div>
                                            <div class="input-with-label col-sm-12 text-left">
                                                <span>Alamat:</span>
                                                <input type="text" name="address" value="<?php echo "$alamat"; ?>" pattern="[A-Za-z0-9-_\.\s]{10,100}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kecamatan:</span>
                                                <input type="text" name="kec" value="<?php echo "$kecamatan"; ?>" pattern="[A-Za-z-_\.\s]{2,50}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kode Pos:</span>
                                                <input type="text" name="pos" value="<?php echo "$kode_pos"; ?>" pattern="[0-9]{2,6}" required />
                                            </div>
                                            <div class="col-sm-6 input-with-label text-left">
                                                <span>PROVINSI:</span>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                
                                                        
                                                        <?php get_city(); ?>                                        
                                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-6 input-with-label text-left">
                                                <span>KOTA:</span>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                   <select id="kabupaten" name="kabupaten"></select><br><br>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-sm-offset-4">
                                                <input type="submit" form="form-user" class="" value="Confirm Edit" name="confirmedit" />
                                            </div>
                                        </form>


                            <?php
                                    }
                                }

                                else{
                            ?>

                                        <form class="customer-details mb-xs-40" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-user">
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Depan:</span>
                                                <input type="text" name="fname" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Belakang:</span>
                                                <input type="text" name="lname" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>

                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Tanggal Lahir:</span>
                                                <select name="day" style="width: 17%;">
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>

                                                <select name="month" style="width: 50%;">
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>

                                                <select name="year" style="width: 30%;">
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1939">1939</option>
                                                    <option value="1938">1938</option>
                                                    <option value="1937">1937</option>
                                                    <option value="1936">1936</option>
                                                    <option value="1935">1935</option>
                                                    <option value="1934">1934</option>
                                                    <option value="1933">1933</option>
                                                    <option value="1932">1932</option>
                                                    <option value="1931">1931</option>
                                                    <option value="1930">1930</option>
                                                    <option value="1929">1929</option>
                                                    <option value="1928">1928</option>
                                                    <option value="1927">1927</option>
                                                    <option value="1926">1926</option>
                                                    <option value="1925">1925</option>
                                                    <option value="1924">1924</option>
                                                    <option value="1923">1923</option>
                                                    <option value="1922">1922</option>
                                                    <option value="1921">1921</option>
                                                    <option value="1920">1920</option>
                                                    <option value="1919">1919</option>
                                                    <option value="1918">1918</option>
                                                    <option value="1917">1917</option>
                                                    <option value="1916">1916</option>
                                                    <option value="1915">1915</option>
                                                    <option value="1914">1914</option>
                                                    <option value="1913">1913</option>
                                                    <option value="1912">1912</option>
                                                    <option value="1911">1911</option>
                                                    <option value="1910">1910</option>
                                                    <option value="1909">1909</option>
                                                    <option value="1908">1908</option>
                                                    <option value="1907">1907</option>
                                                    <option value="1906">1906</option>
                                                    <option value="1905">1905</option>
                                                </select>
                                            </div>

                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Jenis Kelamin:</span>
                                                <select name="gender">
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Handphone:</span>
                                                <input type="text" name="hp" pattern="[0-9]{11,13}" placeholder="ex: 08xx xxxx xxxx" maxlength="13" required />
                                            </div>
                                            <div class="input-with-label col-sm-12 text-left">
                                                <span>Alamat:</span>
                                                <input type="text" name="address" pattern="[A-Za-z0-9-_\.\s]{10,100}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kecamatan:</span>
                                                <input type="text" name="kec" pattern="[A-Za-z-_\.\s]{2,50}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kode Pos:</span>
                                                <input type="text" name="pos" pattern="[0-9]{2,6}" required />
                                            </div>
                                            <div class="col-sm-6 text-left">
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                    <select name="prov">
                                                        <option selected="" value="">Provinsi</option>
                                                        <?php get_city(); ?>                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-left">
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                    <select name="kota">
                                                        <option selected="" value="">Kota/Kabupaten</option>
                                                        <?php get_prov(); ?>                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" form="form-user" class="" value="Confirm Edit" name="confirmedit" />
                                            </div>
                                        </form>

                            <?php
                                    }
                            ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of container-->




        <?php


            if (isset($_POST['confirmedit'])) {
                $namakot = $_POST['kabupaten'];
                $namaprov = $_POST['provinsi'];

                 $kota1 = explode("&&", $namakot);

$provinsi1 = explode("&&", $namaprov);



                $fname = $_POST['fname'];
                $lname = $_POST['lname'];

                $day = $_POST['day'];
                $month = $_POST['month'];
                $year = $_POST['year'];
                $birthday = $year . '-' . $month . '-' . $day;

                $gender = $_POST['gender'];
                $hp = $_POST['hp'];
                $address = $_POST['address'];
                $kec = $_POST['kec'];
                $pos = $_POST['pos'];
                $kota = $kota1[1];
                $idkot = $kota1[0];
                $prov = $provinsi1[1];
                $idprov = $provinsi1[0];

                $user_id = $_SESSION['user'];


                $update = mysql_query("UPDATE user SET firstname = '$fname', lastname = '$lname', hp = '$hp', tanggal_lahir = '$birthday', gender = '$gender', alamat = '$address', id_kota = '$idkot', kota = '$kota', id_provinsi = '$idprov', provinsi = '$prov', kecamatan = '$kec', kode_pos = '$pos' WHERE user_id = '$user_id'") or die(mysql_error());


                if ($update === TRUE) {

    ?>

                            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='account.php'">
                                <h2>Update Informasi berhasil</h2>
                                <p>
                                    Terima kasih.
                                </p>
                            </div>

    <?php

                }

                else{
    ?>
                            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='account.php'">
                                <h2>Update Informasi gagal</h2>
                                <p>
                                    Maaf, update anda gagal.
                                </p>
    <?php           
                }
            }



            else{
            }
        ?>





            </section>

            <hr class="mb0">
            <?php include 'footer.php';?>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/flickr.js"></script>
        <script src="js/flexslider.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/masonry.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript">

    $(document).ready(function(){
        $('#provinsi').change(function(){

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
            var value = document.getElementById("provinsi").value;
            var split = value.split("&&");
            var v1 = split[0];
            var v2 = split[1];
       

            $.ajax({
                type : 'GET',
                url : 'http://localhost/stocklot/cek_kabupaten.php',
                data :  'prov_id=' + v1,
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });

        $("#cek").click(function(){
            //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
            var asal = $('#asal').val();
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();
            var berat = $('#berat').val();

            $.ajax({
                type : 'POST',
                url : 'http://localhost/rajaongkir/cek_ongkir.php',
                data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                    $("#ongkir").text(data);
                    $("#kota").text(data);
                }
            });
        });
    });
</script>
    </body>
</html>
<?php ob_end_flush(); ?>