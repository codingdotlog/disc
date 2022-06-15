<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$M = array();
	array_push($M, $_POST["q1most"]);
	array_push($M, $_POST["q2most"]);
	array_push($M, $_POST["q3most"]);
	array_push($M, $_POST["q4most"]);
	array_push($M, $_POST["q5most"]);
	array_push($M, $_POST["q6most"]);
	array_push($M, $_POST["q7most"]);
	array_push($M, $_POST["q8most"]);
	array_push($M, $_POST["q9most"]);
	array_push($M, $_POST["q10most"]);
	array_push($M, $_POST["q11most"]);
	array_push($M, $_POST["q12most"]);
	array_push($M, $_POST["q13most"]);
	array_push($M, $_POST["q14most"]);
	array_push($M, $_POST["q15most"]);
	array_push($M, $_POST["q16most"]);
	array_push($M, $_POST["q17most"]);
	array_push($M, $_POST["q18most"]);
	array_push($M, $_POST["q19most"]);
	array_push($M, $_POST["q20most"]);
	array_push($M, $_POST["q21most"]);
	array_push($M, $_POST["q22most"]);
	array_push($M, $_POST["q23most"]);
	array_push($M, $_POST["q24most"]);
	$count = array_count_values($M);
	$M_D = $count["D"];
	$M_I = $count["I"];
	$M_S = $count["S"];
	$M_C = $count["C"];
	$M_E = $count["-"];
	$L = array();
	array_push($L, $_POST["q1least"]);
	array_push($L, $_POST["q2least"]);
	array_push($L, $_POST["q3least"]);
	array_push($L, $_POST["q4least"]);
	array_push($L, $_POST["q5least"]);
	array_push($L, $_POST["q6least"]);
	array_push($L, $_POST["q7least"]);
	array_push($L, $_POST["q8least"]);
	array_push($L, $_POST["q9least"]);
	array_push($L, $_POST["q10least"]);
	array_push($L, $_POST["q11least"]);
	array_push($L, $_POST["q12least"]);
	array_push($L, $_POST["q13least"]);
	array_push($L, $_POST["q14least"]);
	array_push($L, $_POST["q15least"]);
	array_push($L, $_POST["q16least"]);
	array_push($L, $_POST["q17least"]);
	array_push($L, $_POST["q18least"]);
	array_push($L, $_POST["q19least"]);
	array_push($L, $_POST["q20least"]);
	array_push($L, $_POST["q21least"]);
	array_push($L, $_POST["q22least"]);
	array_push($L, $_POST["q23least"]);
	array_push($L, $_POST["q24least"]);
	$count = array_count_values($L);
	$L_D = $count["D"];
	$L_I = $count["I"];
	$L_S = $count["S"];
	$L_C = $count["C"];
	$L_E = $count["-"];
	//DB CONNECTION
	try
	{
		$MYSQLdb = new PDO("mysql:host=localhost;port=3306;dbname=disc;charset=utf8", "root", "12345678", array(PDO::ATTR_PERSISTENT => true));
		$MYSQLdb->query("SET CHARACTER SET utf8");
	}
	catch (PDOException $e)
	{
		print "Db connection error!";
		die();
	}
	//MOST D
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='M' AND FIELD='D' AND VAL='".$M_D."'");
	$sql->execute();
	$MD = $sql->fetch(PDO::FETCH_ASSOC);
	//MOST I
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='M' AND FIELD='I' AND VAL='".$M_I."'");
	$sql->execute();
	$MI = $sql->fetch(PDO::FETCH_ASSOC);
	//MOST S
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='M' AND FIELD='S' AND VAL='".$M_S."'");
	$sql->execute();
	$MS = $sql->fetch(PDO::FETCH_ASSOC);
	//MOST C
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='M' AND FIELD='C' AND VAL='".$M_C."'");
	$sql->execute();
	$MC = $sql->fetch(PDO::FETCH_ASSOC);
	//
	//LEAST D
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='L' AND FIELD='D' AND VAL='".$L_D."'");
	$sql->execute();
	$LD = $sql->fetch(PDO::FETCH_ASSOC);
	//LEAST I
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='L' AND FIELD='I' AND VAL='".$L_I."'");
	$sql->execute();
	$LI = $sql->fetch(PDO::FETCH_ASSOC);
	//LEAST S
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='L' AND FIELD='S' AND VAL='".$L_S."'");
	$sql->execute();
	$LS = $sql->fetch(PDO::FETCH_ASSOC);
	//LEAST C
	$sql = $MYSQLdb->prepare("SELECT POINT FROM disc WHERE TYPE='L' AND FIELD='C' AND VAL='".$L_C."'");
	$sql->execute();
	$LC = $sql->fetch(PDO::FETCH_ASSOC);
	/* LEAST */
	$most = array("D"=>$MD["POINT"], "I"=>$MI["POINT"], "S"=>$MS["POINT"], "C"=>$MC["POINT"]);
	$least = array("D"=>$LD["POINT"], "I"=>$LI["POINT"], "S"=>$LS["POINT"], "C"=>$LC["POINT"]);
	echo array_search(max($most), $most)." --> ".array_search(min($least), $least);
}
?>