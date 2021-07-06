<?php


$identi =$_POST["cod"];
$evento =$_POST["even"];


if ($evento ==1){ header("Location: impresion/cartagena/imprimir.php?var=$identi"); }

if ($evento ==2){ header("Location: impresion/pasto/imprimir.php?var=$identi"); }

if ($evento ==3){ header("Location: impresion/stamarta/imprimir.php?var=$identi"); }

if ($evento ==4){ header("Location: impresion/medellin/imprimir.php?var=$identi"); }

if ($evento ==5){ header("Location: impresion/bogota/imprimir.php?var=$identi"); }

if ($evento ==6){ header("Location: impresion/simposio/imprimir.php?var=$identi"); }

if ($evento ==7){ header("Location: impresion/simposio2016/imprimir.php?var=$identi"); }

if ($evento ==8){ header("Location: impresion/uan2016/imprimir.php?var=$identi"); }

if ($evento ==9){ header("Location: impresion/simposio2017/imprimir.php?var=$identi"); }

if ($evento ==10){ header("Location: impresion/2017_5to_regional/imprimir.php?var=$identi"); }

if ($evento ==11){ header("Location: impresion/XXVIIIencuentro2017/imprimir.php?var=$identi"); }

if ($evento ==12){ header("Location: impresion/simposio2018/imprimir.php?var=$identi"); }

if ($evento ==13){ header("Location: impresion/XXIXencuentro2018/imprimir.php?var=$identi"); }

if ($evento ==14){ header("Location: impresion/XXXencuentro2019/imprimir.php?var=$identi"); }//

if ($evento ==15){ header("Location: impresion/2019Suroccidente/imprimir.php?var=$identi"); }

if ($evento ==16){ header("Location: impresion/simposio2020/imprimir.php?var=$identi"); }

if ($evento ==17){ header("Location: impresion/VIIIencuentro2020/imprimir.php?var=$identi"); }

if ($evento ==18){ header("Location: impresion/simposiocaribe2020/imprimir.php?var=$identi"); }

if ($evento ==19){ header("Location: impresion/prueba2021/imprimir.php?var=$identi"); }

//echo "$congreso";
//echo "$evento";

?>