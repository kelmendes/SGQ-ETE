<?php
    // ADICIONANDO A CLASS PRONCIPAL DO FPDF
    require('./class/fpdf.php');

    // ADICIONANDO A CLASS PARA CONEXAO COM BANCO DE DADOS
    require ('./class/configdb.php');

    // COONEXAO COM DB TEMPORARIA 

    // ATRIBUTOS DA CLASS PARA CONEXÃO 
    $host = 'localhost';
    $dbname = 'p1teste';
    $user = 'root';
    $password = '';

    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));



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



    // CORPO DA PROVA 

    // QUEBRA DE LINHA 
    $pdf->Ln();
    $pdf->Ln();

    // TEMPLATE QUESTAO DISSERTATIVA
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(10,6,'xx )',1,0, 'L');
    $pdf->MultiCell(180, 4, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae felis fringilla, dictum quam vel, tincidunt enim. Duis mollis mollis aliquam. Aliquam ullamcorper velit ligula, non ultricies risus congue vulputate. Etiam vitae viverra massa. Proin cursus diam tincidunt eleifend venenatis. Phasellus tincidunt eu libero sed tristique. Duis sed convallis magna. Nulla vitae sodales leo. Aenean vulputate nibh nunc, vitae iaculis elit sodales in. Ut a nibh tempor, egestas tortor quis posuere.') ,0,'J');
    $pdf->Ln();
    // EDN TEMPLATE QUESTAO DISSERTATIVA


    // TEMPLATE QUESTAO MULTIPLA ESCOLHA
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(10,6,'xx )',1,0, 'L');
    $pdf->MultiCell(180, 4, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae felis fringilla, dictum quam vel, tincidunt enim. Duis mollis mollis aliquam. Aliquam ullamcorper velit ligula, non ultricies risus congue vulputate. Etiam vitae viverra massa. Proin cursus diam tincidunt eleifend venenatis. Phasellus tincidunt eu libero sed tristique. Duis sed convallis magna. Nulla vitae sodales leo. Aenean vulputate nibh nunc, vitae iaculis elit sodales in. Ut a nibh tempor, egestas tortor quis posuere.') ,0,'J');
    // ALTERNATIVAS TEMPLATE - MULTIPLA ESCOLHA
    $pdf->Ln();
    $pdf->Cell(10,6,'xx )',1,0, 'L');
    $pdf->MultiCell(180, 4, utf8_decode('Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ut orci urna. Aenean quam neque, luctus eget laoreet vitae, consequat in orci. Donec ipsum sem, ultricies quis vulputate eget, egestas a ex posuere.') ,0,'J');
    // END ALTERNATIVAS TEMPLATE - MULTIPLA ESCOLHA
    $pdf->Ln();
    // END  TEMPLATE QUESTAO MULTIPLA ESCOLHA
    
    

    


    // END CORPO DA PROVA 


    // EXIBINDO PDF
    $pdf->Output();
?>