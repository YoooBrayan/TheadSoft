<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
}
require 'logica/Persona.php';
require 'logica/Operario.php';
require 'logica/Corte.php';
require 'logica/Talla.php';
require 'logica/Color.php';
require 'logica/Representante.php';
require 'logica/Modelo.php';
require 'logica/Tarea.php';
require 'logica/Satelite.php';
require_once('librerias/fpdf/fpdf.php');


// cd D:\xampp\htdocs\IPSUD3\modelos\fpdf\font
//php D:\xampp\htdocs\IPSUD3\modelos\fpdf\makefont\makefont.php Montserrat-Regular.ttf

class MyPdf extends FPDF
{

	function Footer()
	{
		$this->SetY(-15);
		$this->Cell(0, 10, $this->PageNo() . '/{nb}', 0, 0, "R");
		$this->AliasNbPages();
	}

	function headerTable()
	{
		$this->Cell(15, 5, "Corte", 1, 0, "C");
		$this->Cell(40, 5, "Modelo", 1, 0, "C");
		$this->Cell(55, 5, "Tarea", 1, 0, "C");
		$this->Cell(30, 5, "Cantidad", 1, 0, "C");
		$this->Cell(30, 5, "Valor Operacion", 1, 0, "C");
		$this->Cell(18, 5, "Pago", 1, 0, "C");
		$this->Ln();
	}

	function viewTable($operario)
	{
		$this->Cell((strlen($operario->getId()) < 10 ? 10 : strlen($operario->getId()) + 18), 3, "ID: " . $operario->getId(), 0, 1, "C");
		$this->Cell(28, 8, "Nombre: " . $operario->getNombre(), 0, 1, "C");

		$this->headerTable();
		foreach ($_SESSION['cortes'] as $c) {
			$nominaCO = $operario->tareasNomina($c);
			foreach ($nominaCO as $n) {
				$this->Cell(15, 5, $c, 1, 0, "C");
				$this->Cell(40, 5, $n['modelo'], 1, 0, "C");
				$this->Cell(55, 5, $n['tarea'], 1, 0, "C");
				$this->Cell(30, 5, $n['cantidad'], 1, 0, "C");
				$this->Cell(30, 5, $n['valorU'], 1, 0, "C");
				$this->Cell(18, 5, $n['pago'], 1, 0, "C");
				$this->Ln();
				//echo $n['modelo'] . "<br><br>";
				//echo $n['tarea'] . "<br><br>";
				//echo $n['cantidad'] . "<br><br>";
				//echo $n['valorU'] . "<br><br>";
				//echo $n['pago'] . "<br><br>";
			}
		}
		$this->Ln();
		$pago = $operario->pagoNeto($_SESSION['cortes']);
		$this->SetFont('Arial', 'B');
		$this->Cell(25, 10, "Sueldo: " . $pago, 0, 1, "C");
		$this->cell(65);
		$this->Cell(58, 10, "*************************************************************************************************************************************", 0, 0, "C");
		$this->SetFont('Arial');
		$this->Ln();


		array_push($_SESSION['cortes'], 0);
	}
}

unset($_SESSION["cortes"][0]);

$operarios = array();
array_push($operarios, ['id' => 0]);

$pagoTotal = 0;
$pagoNomina = 0;
$insumos = 0;
$ganancias = 0;


foreach ($_SESSION['cortes'] as $c) {
	$corte = new Corte($c);
	$operario = $corte->operariosNomina();
	$pagoTotal += $corte->obtenerPagoTotal();
	$pagoNomina += $corte->obtenerTotalPagos();
	$ganancias += $corte->ganancias();
	foreach ($operario as $o) {

		$ids = array_column($operarios, 'id');
		$indice = array_search($o->getId(), $ids);

		if (!$indice) {
			$operarios[] = array(
				'id' => $o->getId(),
				'Nombre' => $o->getNombre(),
			);
		}
	}
}

unset($operarios[0]);

$socios = new Operario();
$listaSocios = $socios->listaSocios();
$pagoSocios = array();

$pdf = new MyPdf();

$pdf->SetTitle('Nomina ' . date('jnYhis'), true);


$pdf->AddPage();

$pdf->SetFont('arial', 'B', 16);
$pdf->Cell(195, 5, "Nomina", 0, 0, "C");
$pdf->Ln(15);
$pdf->SetFont('arial', '', 11);

foreach ($operarios as $o) {

	$operario = new Operario($o['id'], $o['Nombre']);
	$pdf->viewTable($operario);
	$pago = $operario->pagoNeto($_SESSION['cortes']);
	foreach ($listaSocios as $s) {
		if ($o['id'] == $s->getId()) {
			$pagoSocios[] = array(
				'socio' => $s->getNombre(),
				'pago' => $pago + (floor(($ganancias - $_GET['insumos']) / count($listaSocios)))
			);
		}
	}
}

$pdf->Cell(195, 5, "Ganancias", 0, 1, "C");
$pdf->Ln();
$pdf->Cell(35, 5, "Pago Total", 1, 0, "C");
$pdf->Cell(35, 5, "Nomina", 1, 0, "C");
$pdf->Cell(35, 5, "Insumos", 1, 0, "C");
$pdf->Cell(35, 5, "Ganancias", 1, 0, "C");
$pdf->Cell(45, 5, "Ganancias Divididas", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(35, 5, $pagoTotal, 1, 0, "C");
$pdf->Cell(35, 5, $pagoNomina, 1, 0, "C");
$pdf->Cell(35, 5, $_GET['insumos'], 1, 0, "C");
$pdf->Cell(35, 5, $ganancias, 1, 0, "C");
$pdf->Cell(45, 5, (floor(($ganancias - $_GET['insumos']) / count($listaSocios))), 1, 0, "C");

$pdf->Ln();
$pdf->Ln();

foreach ($pagoSocios as $s) {
	$pdf->Cell(30, 5, "Sueldo " . $s['socio'] .": " . $s['pago'], 0, 1, "C");
}

array_push($_SESSION['cortes'], 0);

$pdf->Output();

?>
<script>
	document.title = ' <?php echo "Nomina " . date('jnYhis'); ?> ';
</script>