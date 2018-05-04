<?php
    // ADICIONANDO A CLASS PRONCIPAL DO FPDF
    require('./class/fpdf.php');

    // ADICIONANDO A CLASS PARA CONEXAO COM BANCO DE DADOS
    require ('./class/configdb.php');

    // COSTUMIZANDO O FOOTER
    Class myPDF extends FPDF{
        // ESTILO FOOTER
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            //Numeração das páginas
            //$this->Cell(0,29,'Page '.$this->PageNo(),0,0,'C');
            $this->Cell(0,5, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new myPDF();
    $pdf->AddPage();

    // ADICIONANDO LOGO
    $pdf->Image('./imagem/logo_ETE.jpg',10,5,-1100);
    $pdf->Image('./imagem/logo_INTEGRAL.png',155,5,-160);

    // NOME ESCOLA
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(190,5,utf8_decode(''),0,1, 'C');
    $pdf->Cell(190,5,utf8_decode('Escola Técnica Estadual de Palmares'),0,1, 'C');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(190,5,utf8_decode('BR-101, Palmares - PE, 55540-000'),0,1, 'C');

    // QUEBRA DE LINHA APOS NOME DA ESCOLA 
    $pdf->Ln();
    $pdf->Ln();

    // INFORMACOES DO ALUNO, PROFESSOR E DISCIPLINA 
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(19,6,'Aluno (a): ',0,1, 'L');
    $pdf->Cell(80,6,'Curso: ',0,0, 'L');
    $pdf->Cell(80,6,'Disciplina: ',0,1, 'L');
    $pdf->Cell(80,6,'Professor: ',0,0, 'L');
    $pdf->Cell(80,6,'Turma: ',0,1, 'L');


    // EXIBINDO PDF
    $pdf->Output();
?>