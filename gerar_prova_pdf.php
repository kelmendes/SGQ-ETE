<?php
    //  INICIANDO SESSAO 
    session_start();

    // ADICIONANDO A CLASS PRONCIPAL DO FPDF
    require('./class/fpdf.php');

    // ADICIONANDO CLASS
    require './class/questões.php';

    // ESTANIANDO CLASS 
    $questaD = new Questões();

    // PEGANDO ID DO USUARIO 
    $user_id = $_SESSION['id_usuario'];


    // COONEXAO COM DB TEMPORARIA 

    // ATRIBUTOS DA CLASS PARA CONEXÃO 
    $host = 'localhost';
    $dbname = 'teste2';
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
    $pdf->Image('./imagem/logo_ETE.jpg',10,5,-400);
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
    $pdf->Cell(60,6,'Turma: ',0,0, 'L');
    $pdf->Cell(12,6,'Data: ',0,0, 'L');
    $pdf->Cell(32,6,'___ / ___ / _____ ',0,1, 'L');



    // PEGAR QUESTOES SELECIONADAS PELO USUARIO 
    $select_from_user = "SELECT * FROM prova_questoes_selecionadas AS S INNER JOIN disciplina_assunto_questao AS Q ON S.prova_questoes_selecionadas_disciplina_assunto_questao_id = Q.disciplina_assunto_questao_id WHERE S.prova_questoes_selecionadas_user_id = $user_id ";

    // EXECUTANDO QUERY 
    $select_from_user_resultado = $conn->query($select_from_user);

    // CORPO DA PROVA 
    // QUEBRA DE LINHA 
    $pdf->Ln();
    $pdf->Ln();

    // CONTAR QUESTAO 
    $num_questao = 1;

    while ( $rows_select_from_user = $select_from_user_resultado->fetch(PDO::FETCH_ASSOC) ) {
        

        // TESTAR QUAL TIPO DE QUESTÃO PARA PODER FAZER A QUERY 
        if ( $rows_select_from_user['disciplina_assunto_questao_mutipla_escolha'] == 0){

            // TEMPLATE QUESTAO DISSERTATIVA
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(10,6, $num_questao . " - " ,0,0, 'L');
            $num_questao ++;
            $pdf->MultiCell(180, 4, utf8_decode( $rows_select_from_user['disciplina_assunto_questao_pergunta']) ,0,'J');
            $pdf->Ln();
            // EDN TEMPLATE QUESTAO DISSERTATIVA

        } elseif ( $rows_select_from_user['disciplina_assunto_questao_mutipla_escolha'] == 1) {

            // TEMPLATE QUESTAO MULTIPLA ESCOLHA
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(10,6, $num_questao . " - " , 0,0, 'L');
            $num_questao ++;
            $pdf->MultiCell(180, 4, utf8_decode($rows_select_from_user['disciplina_assunto_questao_pergunta']) ,0,'J');

            $alternativas = $questaD->getQuestaoMultiEscolhaAlternativas($rows_select_from_user['disciplina_assunto_questao_id']);

            // ARRAY COM ALFABETO 
            $letras_questao = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','p','q','r','s','t','u','v','w','x','y','z'];
            $temp_posicao_letra = 0;
            while ( $rows_alternativas =  $alternativas->fetch(PDO::FETCH_ASSOC)){ 
                // ALTERNATIVAS TEMPLATE - MULTIPLA ESCOLHA
                $pdf->Ln();
                // ESPACO IDENTACAO
                $pdf->Cell(10,6,'',0,0, 'L');
                $pdf->Cell(9, 4,$letras_questao[$temp_posicao_letra] . ' )',0,0, 'L');
                $temp_posicao_letra ++;
                // CONSULTANDO AS ALTERNATIVAS 
                $pdf->MultiCell(170, 3, utf8_decode($rows_alternativas['disciplina_assunto_questao_mutipla_escolha_text']) ,0,'J');
                // END ALTERNATIVAS TEMPLATE - MULTIPLA ESCOLHA
                // END  TEMPLATE QUESTAO MULTIPLA ESCOLHA
            } 
            $pdf->Ln();

        }
    }

    // END CORPO DA PROVA 


    // EXIBINDO PDF
    $pdf->Output();
?>