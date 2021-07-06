<?php
error_reporting( 0 );
require('../fpdf/fpdf.php');
require('conexion.php');



//Validar si se está ingresando con sesión correctamente



class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Ajuste el ancho de las columnas de la matriz
	$this->widths=$w;
}

function SetAligns($a)
{
	//Establecer el conjunto de alineaciones de columnas
	$this->aligns=$a;
}

function Row($data)
{
	//Calcular la altura de la fila
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=6*$nb;
	//Emitir un salto de página en primer lugar si es necesario
	$this->CheckPageBreak($h);
	//Dibujar las celdas de la fila
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'P';
		//Guardar la posición actual
		$x=$this->GetX();
		$y=$this->GetY();
		//Dibujar borde
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,6,$data[$i],1,$a,'true');
		//Ponga la posición a la derecha de la celda
		$this->SetXY($x+$w,$y);
	}
	//Ir a la siguiente línea
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//Si la altura h causaría un desbordamiento, añadir una nueva página inmediatamente
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Calcula el número de líneas de un ancho w MultiCell se
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','',10);
	
	//$this->Text(20,14,'Historial clinico',0,'C', 0);
	$this->Ln(25);
}

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	//$this->Cell(100,10,'Historial medico',0,0,'L');

}

}


//$codfactura=$_POST["cod"];
$idins = strip_tags($_GET['var']);


if (empty($_GET['var'])) {
echo '<script language = javascript>
alert("Número de identificaciòn incorrecto")
self.location = "../index.php"
</script>';
}

else {

$inserta=mysql_query("UPDATE participantes SET descarga=1 WHERE identi='$idins' and congreso=14" ,$conex);

$sql = "SELECT * FROM participantes WHERE identi='$idins' ";
$histo = mysql_query($sql); 

$nombre=mysql_result($histo,0,"nombre");

				
				$tam_pers[0]=278;
				$tam_pers[1]=198;
			
				$pdf=new PDF('P','mm',$tam_pers);			
				
				$pdf->Open();
				$pdf->AddPage();
				$pdf->SetMargins(15,10,10);
				$pdf->Ln(5);
			
				$pdf->Image('certificado.jpg' , 0 ,0, 278 , '','JPG');
				
				
				
				$pdf->SetFont('arial','',28); 
				$pdf->SetTextColor(48, 68, 127);
				$pdf->SetY(103);
				$pdf->SetX(10);
				$pdf->Cell(0,12, $nombre,0,0, 'C');
				
			
				$pdf->Output();
}
?>