<?php
//error_reporting(E_ALL);
//echo '<pre>';print_r($_FILES);
//move_uploaded_file($_FILES['filename']['tmp_name'], $_FILES['filename']['name']);

	require_once('fpdf/fpdf.php');
	require_once('fpdi/src/autoload.php');
	use \setasign\Fpdi\Fpdi;
	
	$excel_file_name=$_FILES['filename']['tmp_name'];
	include('SimpleXLSX.php');
	if ( $xlsx = SimpleXLSX::parse($excel_file_name) ) {
		$data=$xlsx->rows();
		//echo '<pre>';print_r( $xlsx->rows() );
	} else {
		//echo SimpleXLSX::parseError();
	}
	$pdf = new FPDI();
	$pageCount = $pdf->setSourceFile('demo-new1.pdf');
	unset($data[0]);
	for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
		// import a page
		$templateId = $pdf->importPage($pageNo);
		// get the size of the imported page
		$size = $pdf->getTemplateSize($templateId);
		/*echo '<pre>';
		print_r($size);
		print_r($data);die;*/
		// create a page (landscape or portrait depending on the imported page size)
		$pdf -> SetFont('Arial');
		if ($size['width'] > $size['height']) {
			$pdf->AddPage('L', array($size['width'], $size['height']));
		} else {
			$pdf->AddPage('P', array($size['width'], $size['height']));
		}

		// use the imported page
		//$pdf -> AddPage();
		//if()
		//echo '<pre>';	print_r($data);die;
		$pdf->useTemplate($templateId);
		foreach ($data as $key=>$value){
			$page = $value[0];
			$label = $value[1];
			$price = $value[2];
			
			$coordinateArray = explode(',', $value[3]);
			$x = $coordinateArray[0];
			$y = $coordinateArray[1];
				//echo '<pre>';print_r($value);echo '<br>';
				//echo "page==>".$page."pageNo==>".$pageNo;//die;
				if($page==$pageNo){
					$pdf -> SetXY($x, $y);
					$pdf->setFillColor(255,255,255); 
					$pdf->Cell(12,5,"$".$price,0,1,'L',1);
				}
		}/*
		
		$page = $value[0];
		$label = $value[1];
		$price = $value[2];
		$coordinateArray = explode(',', $value[3]);
		$x = $coordinateArray[0];
		$y = $coordinateArray[1];
		//echo '<pre>';print_r($value);echo '<br>';
		$pdf -> SetXY($x, $y);
		$pdf->setFillColor(255,255,255); 
		$pdf->Cell(12,5,"$"."book",0,1,'L',1);
			
		

		$pdf->SetFont('Helvetica');
		$pdf->SetXY(5, 5);
		$pdf->Write(8, 'A complete document imported with FPDI');*/
	}
	

	
	$pdf -> Output('New-PDF.pdf', 'D');
?>