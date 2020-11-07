<?php
    // Include autoloader 
    require_once '../../dompdf/autoload.inc.php'; 
    
    // Reference the Dompdf namespace 
    use Dompdf\Dompdf; 
    
    // Instantiate and use the dompdf class 
    $dompdf = new Dompdf();
    // Load HTML content
    $html = file_get_contents("print.html");
    $dompdf->loadHtml($html); 
    
    // (Optional) Setup the paper size and orientation 
    $dompdf->setPaper('A4', 'portrayed');
    
    // Render the HTML as PDF 
    $dompdf->render(); 
    
    // Output the generated PDF to Browser 
    $dompdf->stream("relatorio.pdf");
?>
