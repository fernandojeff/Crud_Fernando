<?php
    $oper = $_GET ['op'];

    //CADASTRO
    if ($oper == 1) {

        $entrada = $_GET ['entrada'];
        
        if ($entrada == 1) {
            echo"
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Cadastro</title>
                </head>
                <body>
                <fieldset>
                    <legend>Cadastrar novo funcionário</legend>
                    <form action='principal.php' method='get'>
                        <label for='codigo'>Codigo:</label>
                        <input type='number' name='codigo'>
                        <br>
                        <label for='nome'>Nome:</label>
                        <input type='text' name='nome'>
                        <br>
                        <label for='cpf'>CPF:</label>
                        <input type='text' name='cpf'>
                        <br>
                        <label for='nascimento'>Data de nascimento:</label>
                        <input type='date' name='nascimento'>
                        <br>
                        <label for='endereco'>Endereço:</label>
                        <input type='text' name='endereco'>
                        <br>
                        <label for='sexo'>Sexo:</label>
                        <input type='radio' name='sexo' value='Masculino'>Masculino
                        <input type='radio' name='sexo' value='Feminino'>Feminino
                        <br>
                
                        <input type=hidden name=op value= $oper> 
                        <input type=hidden name='entrada' value=2>    
                        <input class='botao' type=submit value='Enviar'>
                        <input class='botao' type=reset  value='Limpar'>
                    </form>
                </fieldset>
                <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
            ";
        }
        if ($entrada == 2) {
            $cod = $_GET ['codigo'];
            $nom = $_GET ['nome'];
            $cpf = $_GET ['cpf'];
            $nas = $_GET ['nascimento'];
            $end = $_GET ['endereco'];
            $sex = $_GET ['sexo'];

            //testanto se já existe 
            
            $sql = "SELECT * FROM funcionarios WHERE cod_funcionario = '$cod'";
            
            $conn = mysqli_connect("127.0.0.1","root","","iftec");

            $dados = mysqli_query($conn, $sql);
            
            $quantidade = mysqli_num_rows($dados); //no. de respostas

            if ($quantidade > 0) {
                echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Pesquisa</title>
                    </head>
                    <body>
                        <fieldset>
                            <legend>Erro!!</legend>
                            <p>O código informado já está em uso!</p>
                        </fieldset>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </body>
                    </html>
                ";
            } else {
                // montando a instrução sql
                $sql = "insert into funcionarios values('$cod','$nom','$cpf','$nas','$end','$sex')";

                // estabelecendo a conexão com o banco de dados
                $conn = mysqli_connect("127.0.0.1","root","","iftec");

                // aplico o sql na conexão e status tem o retorno
                $status = mysqli_query($conn, $sql);

                if($status = true) {
                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Cadastro</title>
                </head>
                <body>
                <div class='meio'>
                        <h1>CADASTRO REALIZADO COM SUCESSO!</h1>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </div>
                </body>
                </html>
                ";
                } else {
                    echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Cadastro</title>
                    </head>
                    <body>
                    <div class='meio'>
                        <h1>HOUVE UM ERRO! VERIQUE COM UM ADMINISTRADOR.</h1>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </div>
                    </body>
                    </html>
                    ";
                }
            }
        }
    }

    //PESQUISA
    if ($oper == 2) {
        $entrada = $_GET ['entrada'];
        
        if ($entrada == 1) {
            echo"
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Pesquisa</title>
                </head>
                <body>
                <fieldset>
                    <legend>Pesquisar funcionário</legend>
                    <form action='principal.php' method='get'>
                        <label for='Nome'>Nome:</label>
                        <input type='text' name='nome'>
                        <br>
                        <input type=hidden name=op value= $oper> 
                        <input type=hidden name='entrada' value=2>    
                        <input class='botao' type=submit value='Enviar'>
                        <input class='botao' type=reset  value='Limpar'>
                    </form>
                </fieldset>
                <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
            ";
        }
        if ($entrada == 2) {
            $nom = $_GET ['nome'];

            //montando o sql
            $sql = "select * from funcionarios where nome = '$nom'";

            // estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","iftec");    

            // aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);

            // quero saber a quantidade de registro que contem $dadaos
            $quantidade = mysqli_num_rows($dados);

            if($quantidade > 0) {
                  // pegando o primeiro registro de $dados
                  $linha = mysqli_fetch_array($dados);  
                  //exibindo os dados
                  $cod = $linha ['cod_funcionario'];
                  $nom = $linha ['nome'];
                  $cpf = $linha ['cpf'];
                  $end = $linha ['endereco'];
                  $nas = $linha ['nascimento'];
                  $sex = $linha ['sexo'];
                  

                  echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Pesquisa</title>
                    </head>
                    <body>
                        <fieldset>
                            <legend>Funcionário encontrado</legend>
                            <p>
                                <b>Codigo:</b> $cod <br>
                                <b>Nome:</b> $nom <br>
                                <b>CPF:</b> $cpf <br>
                                <b>Endereço:</b> $end <br>
                                <b>Nascimento:</b> $nas <br>
                                <b>Sexo:</b> $sex <br>
                            </p>
                        </fieldset>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </body>
                    </html>
                  ";
            }  else {
                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Pesquisa</title>
                </head>
                <body>
                    <fieldset>
                        <legend>Erro!!</legend>
                        <p> Nenhum funcioário encontrado na base de dados, por favor retorne à página inicial e cadastre um novo funcionário. </p>
                    </fieldset>
                    <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
                ";
            }
        }
    }

    //LISTAR
    if ($oper == 3) {
        //montando o sql
        $sql = "select * from funcionarios";
            // estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","iftec");    

            // aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);

            // quero saber a quantidade de registro que contem $dadaos
            $quantidade = mysqli_num_rows($dados);

            if($quantidade > 0) {
                  // pegando o primeiro registro de $dados
                  $linha = mysqli_fetch_array($dados); 
                  
             echo "
                  <html>
                  <head>
                      <meta charset='utf-8'>
                      <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Lista de funcionarios</title>
                  </head>
                  <body>
                    <div class='meio'>
                      <h1>Listagem de funcionários</h1>
                       <table border=1>
                       <tr><th>Codigo:</TH><TH>Nome:</TH><TH>CPF:</TH><TH>Nascimento:</TH><TH>Endereço:</TH><th>Sexo:</th></tr>
                   ";       

            for( $i=0 ; $i<$quantidade ; $i++){           

                  //exibindo os dados
                  $cod = $linha ['cod_funcionario'];
                  $nom = $linha ['nome'];
                  $cpf = $linha ['cpf'];
                  $end = $linha ['endereco'];
                  $nas = $linha ['nascimento'];
                  $sex = $linha ['sexo'];
            echo"<tr><td>$cod</Td><Td>$nom</Td><Td>$cpf</Td><Td>$end</Td><Td>$nas</Td><td>$sex</td></TR>";
                   
            $linha=mysqli_fetch_assoc($dados);       
       }   // fim do loop

             echo " </table></div></body></html>
                    <br>
                    <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
             ";   
            
            }  else {
                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Lista de funcionarios</title>
                </head>
                <body>
                    <div class'meio'>
                        <h1> Nenhum funcionário foi encontrado! </h1>
                        <br>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
                ";
            }
    }

    //EXLCUIR
    if ($oper == 4) {
        $entrada = $_GET ['entrada'];
        
        if ($entrada == 1) {
            echo"
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Pesquisa</title>
                </head>
                <body>
                <fieldset>
                    <legend>Pesquisar funcionário que deseja excluir</legend>
                    <form action='principal.php' method='get'>
                        <label for='codigo'>Codigo:</label>
                        <input type='text' name='codigo'>
                        <br>
                        <input type=hidden name=op value= $oper> 
                        <input type=hidden name='entrada' value=2>    
                        <input class='botao' type=submit value='Enviar'>
                        <input class='botao' type=reset  value='Limpar'>
                    </form>
                </fieldset>
                <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
            ";            
        }
        if ($entrada == 2) {
            $cod = $_GET ['codigo'];

            //montando o sql
            $sql = "select * from funcionarios where cod_funcionario = '$cod'";

            // estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","iftec");    

            // aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);

            // quero saber a quantidade de registro que contem $dadaos
            $quantidade = mysqli_num_rows($dados);

            if($quantidade > 0) {
                // pegando o primeiro registro de $dados
                $linha = mysqli_fetch_array($dados);  
                //exibindo os dados
                $cod = $linha ['cod_funcionario'];
                $nom = $linha ['nome'];
                $cpf = $linha ['cpf'];
                $end = $linha ['endereco'];
                $nas = $linha ['nascimento'];
                $sex = $linha ['sexo'];
                

                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Pesquisa</title>
                </head>
                <body>
                    <form action='principal.php' method='get'>
                        <fieldset>
                            <legend>Funcionário encontrado</legend>
                            <p>
                                <b>Codigo:</b> $cod <br>
                                <b>Nome:</b> $nom <br>
                                <b>CPF:</b> $cpf <br>
                                <b>Endereço:</b> $end <br>
                                <b>Nascimento:</b> $nas <br>
                                <b>Sexo:</b> $sex <br>
                            </p>
                            <br>
                            <p>Deseja mesmo excluir?</p>
                            <br>
                            <input type='radio' name='escolha' value='1'>Sim
                            <input type='radio' name='escolha' value='2'>Não
                            <br>
                            <input class='botao' type='submit' value='Enviar'>
                            <input type=hidden name=op value=$oper>
                            <input type=hidden name=entrada value=3>
                            <input type=hidden name=codigo value=$cod>
                        </fieldset>
                    </form>
                </body>
                </html>
                ";
            } else {
                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Pesquisa</title>
                </head>
                <body>
                    <fieldset>
                        <legend>Erro!!</legend>
                        <p> Nenhum funcioário encontrado na base de dados, por favor retorne à página inicial e cadastre um novo funcionário. </p>
                    </fieldset>
                    <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                </body>
                </html>
                ";
            }

        } 
        if ($entrada == 3){
            $cod = $_GET['codigo'];
            $escolha = $_GET ['escolha'];

            if ($escolha == 2) {
                echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Pesquisa</title>
                    </head>
                    <body>
                    <div class='meio'>
                        <h1>Retorne a página inicial!</h1>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </div>
                    </body>
                    </html>
                ";
                exit();
            }
            
                //montando o sql
                $sql = "delete from funcionarios where cod_funcionario = $cod";
    
                // estabelecendo a conexão com o banco de dados
                $conn = mysqli_connect("127.0.0.1","root","","iftec");    

                // aplico o sql na conexão e status tem o retorno
                $status = mysqli_query($conn, $sql);

                if($status = true) {
                echo "
                <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='style.css'>
                    <title>IFtec System - Cadastro</title>
                </head>
                <body>
                <div class='meio'>
                        <h1>EXCLUSÃO REALIZADA COM SUCESSO!</h1>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </div>
                </body>
                </html>
                ";

                } else {
                    echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Cadastro</title>
                    </head>
                    <body>
                    <div class='meio'>
                            <h1>Houve um erro ao realizar a exclusão</h1>
                            <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                        </div>
                    </body>
                    </html>
                    
                    ";
                }
            
        }
    }
    
    //ALTERAR 
    if ($oper == 5) {
        $entrada = $_GET ['entrada'];

        if ($entrada == 1) {
            echo "
            <html>
            <head>
                <meta charset='utf-8'>
                <link rel='stylesheet' href='style.css'>
                <title>IFtec System - Pesquisa</title>
            </head>
            <body>
            <fieldset>
                <legend>Pesquisar funcionário que deseja alterar</legend>
                <form action='principal.php' method='get'>
                    <label for='codigo'>Codigo:</label>
                    <input type='text' name='codigo'>
                    <br>
                    <input type=hidden name=op value= $oper> 
                    <input type=hidden name='entrada' value=2>    
                    <input class='botao' type=submit value='Enviar'>
                    <input class='botao' type=reset  value='Limpar'>
                </form>
            </fieldset>
            <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
            </body>
            </html>
            ";
        }
        if ($entrada == 2) {
            $cod = $_GET['codigo'];

            //montando o sql
            $sql = "select * from funcionarios where cod_funcionario = $cod";
    
            // estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","iftec");    
    
            // aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);
    
            // quero saber a quantidade de registro que contem $dadaos
            $quantidade = mysqli_num_rows($dados);
    
            if($quantidade > 0) {
                // pegando o primeiro registro de $dados
                $linha = mysqli_fetch_array($dados);  
                //exibindo os dados
                $cod = $linha['cod_funcionario'];
                $nom = $linha['nome'];
                $cpf = $linha['cpf'];
                $nas = $linha['nascimento'];
                $end = $linha['endereco'];
                $sex = $linha['sexo'];
                echo "
                    <html>
                        <head>
                            <meta charset='utf-8'>
                            <link rel='stylesheet' href='style.css'>
                            <title>IFtec System - Pesquisa</title>
                        </head>
                        <body>
                            <form action='principal.php' method='get'>
                                <fieldset>
                                    <legend>Funcionário encontrado</legend>
                                    <p>
                                        <b>Codigo:</b> $cod <br>
                                        <b>Nome:</b> <input type=text name=nome value='$nom'> <br>
                                        <b>CPF:</b> <input type=text name=cpf value='$cpf'> <br>
                                        <b>Endereço:</b> <input type=text name=endereco value='$end'> <br>
                                        <b>Nascimento:</b> <input type=date name=nascimento value='$nas'> <br>
                                        <b>Sexo:</b> <input type=text name=sexo value='$sex'> <br>
                                    </p>
                                    
                                    <input class='botao' type='submit' value='Enviar'>

                                    <input type=hidden name=op value=$oper>
                                    <input type=hidden name=entrada value=3>
                                    <input type=hidden name=codigo value=$cod>
                                </fieldset>
                            </form>
                        </body>
                    </html>
                    ";
            } else {
                echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Pesquisa</title>
                    </head>
                    <body>
                    <div class='meio'>
                        <h1>Funccionario não encontrado!</h1>
                        <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                    </div>
                    </body>
                    </html>
                ";
            }
            

        }
        if ($entrada == 3) {
            $cod = $_GET ['codigo'];
            $nom = $_GET ['nome'];
            $cpf = $_GET ['cpf'];
            $nas = $_GET ['nascimento'];
            $end = $_GET ['endereco'];
            $sex = $_GET ['sexo'];

            //testanto se já existe 
            
            $sql = "update funcionarios set nome='$nom', cpf='$cpf', nascimento='$nas', endereco='$end', sexo='$sex' where cod_funcionario='$cod'";
            
            $conn = mysqli_connect("127.0.0.1","root","","iftec");

            $status = mysqli_query($conn, $sql);

            if ($status = true) {
                echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Cadastro</title>
                    </head>
                    <body>
                    <div class='meio'>
                            <h1>ALTERAÇÃO REALIZADA COM SUCESSO!</h1>
                            <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                        </div>
                    </body>
                    </html>
                ";
            } else {
                echo "
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <link rel='stylesheet' href='style.css'>
                        <title>IFtec System - Cadastro</title>
                    </head>
                    <body>
                    <div class='meio'>
                            <h1>HOUVE UM ERRO, RETORNE E TENTE NOVAMENTE</h1>
                            <a href=principal.html><input class='botao' type='button' value='Voltar para pagina incial'></a>
                        </div>
                    </body>
                    </html>
                ";
            }
        }
    }
?>