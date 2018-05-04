                    <div class="panel panel-default" style="">
                        <div class="panel-heading" id="title-panel-select">
                            Questões Selecionadas
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                <?php 
                                    // ATRIBUTOS DA CLASS PARA CONEXÃO 
                                    $host = 'localhost';
                                    $dbname = 'p1teste';
                                    $user = 'root';
                                    $password = '';

                                    $conn = new PDO('mysql:host=localhost;dbname=p1teste', $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


                                    
                                    $sql = "
                                    SELECT
                                        P.prova_questoes_selecionadas_id,
                                        Q.disciplina_assunto_questao_id,
                                        Q.disciplina_assunto_questao_nome    
                                    FROM
                                        `prova_questoes_selecionadas` AS P
                                    INNER JOIN disciplina_assunto_questao AS Q
                                    ON
                                        Q.disciplina_assunto_questao_id = P.prova_questoes_selecionadas_disciplina_assunto_questao_id
                                    and P.prova_questoes_selecionadas_user_id = $id_user ";

                                    $result = $conn->query($sql);
                                ?>
                                <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $rows['disciplina_assunto_questao_id']; ?></td>
                                        <td><?php echo $rows['disciplina_assunto_questao_nome'];  ?></td>
                                        <td>
                                            <a href="./function/questao_selecionar_deletar?id=<?php echo $rows['prova_questoes_selecionadas_id']; ?>" class="btn btn-xs btn-danger" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                Unset
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer option-select">
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default">Clear All</button>
                                </div>
                                
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default">Print</button>
                                </div>

                            </div>
                        </div>
                    </div>