<?php
    session_start();
    require("../controller/api_connect_db.php");
    require("../fpdf.php");
    class PDF extends FPDF
    {
        function BasicTable($data)
        {
            foreach(['Nom', 'Quantité', 'Matière'] as $col)
                $this->Cell(40,7,$col,1);
            $this->Ln();
            foreach($data as $row)
            {
                $this->Cell(40,6,$row[0],1);
                $this->Cell(40,6,$row[1],1);
                $this->Cell(40,6,$row[2],1);
                $this->Ln();
            }
        }
    }
    
    $result = $bdd->query("SELECT f.nom as nom, MAX(l.quantite) as quantite, m.nom as matiere
                            FROM fourniture f, liste l, link_eleve le, link_prof lp, matiere m
                            WHERE f.id = l.fourniture_id
                            AND lp.classe_id = le.classe_id
                            AND l.prof_id = lp.prof_id
                            AND f.matiere_id = m.id
                            AND le.eleve_id = ".$_SESSION['id']."
                            GROUP BY m.id,f.id"
			);

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->BasicTable($result);
    $pdf->Output();

?>