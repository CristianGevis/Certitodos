<?php
require('../fpdf/fpdf.php');
include('./conexion.php');


//Validar si se est� ingresando con sesi�n correctamente

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
	//Emitir un salto de p�gina en primer lugar si es necesario
	$this->CheckPageBreak($h);
	//Dibujar las celdas de la fila
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'P';
		//Guardar la posici�n actual
		$x=$this->GetX();
		$y=$this->GetY();
		//Dibujar borde
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,6,$data[$i],1,$a,'true');
		//Ponga la posici�n a la derecha de la celda
		$this->SetXY($x+$w,$y);
	}
	//Ir a la siguiente l�nea
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//Si la altura h causar�a un desbordamiento, a�adir una nueva p�gina inmediatamente
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Calcula el n�mero de l�neas de un ancho w MultiCell se
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
alert("N�mero de identificaci�n incorrecto")
self.location = "../index.php"
</script>';

}
else {

$inserta=mysqli_query($conex, "UPDATE participantes SET descarga=1 WHERE identi='$idins' and congreso=6");
$histo = mysqli_query($conex,"SELECT nombre FROM participantes WHERE identi='$idins'"); 
$nombre=mysqli_fetch_array($histo);
			
				$pdf=new FPDF('P','mm');			
				
				$pdf->AliasNbPages();
				$pdf->AddPage(array(0,0));
				$pdf->SetMargins(15,10,10);
				$pdf->Ln(5);
			
				$pdf->Image('./certificado.jpg' , 10, 5, 278);
				
				
				
				$pdf->SetFont('arial','',28); 
				$pdf->SetTextColor(48, 68, 127);
				$pdf->SetY(99);
				$pdf->SetX(10);
				$pdf->Cell(0,12, $nombre['nombre'],0,0, 'C');
				
			
				$pdf->Output();
}
?>