<?php include_once("logado.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="print.css" rel="stylesheet" type="text/css" media="print">
		<title>Sistema EArte | Principal</title>
	</head>
	<body>
		<script>
		function confirma_exclusao(ficha){
			var resposta = confirm("Você realmente deseja excluir essa ficha?");
			if (resposta){
				window.location = "excluir.php?id="+ficha;
			}
		}
		</script>
		<br /><center><h2>Sistema EArte v2.0</h2></center><br />

		<?php if(estaLogado()): ?>
			<a class="button" href="formulario.php">Adicionar Nova Ficha</a>
			<a class="button" href="backup.php">Fazer backup</a>
		<?php else: ?>
			<a class="button" href="logar.php">Log In</a>
		<?php endif; ?>

		<a class="button" href="busca.php">Buscar</a>
		
		<?php if(estaLogado()): ?> <a class="button" href="sair.php">Sair</a> <?php endif;?> 

		<br><br><hr />

		<table>
		<?php
			set_time_limit ( 0 );
			date_default_timezone_set('America/Sao_Paulo');
			//require_once("dao\\IDAO.class.php");
			require_once("dao/DBFactory.class.php");

			if(estaLogado()):
				$sql = "SELECT f.id,f.codigo,f.consolidada,i.titulo,d.url_trabalho
						FROM ficha_classificacao AS f 
						LEFT JOIN identificacao AS i 
							ON f.id = i.id 
						LEFT JOIN detalhes_finais AS d
							ON f.id = d.id
						ORDER BY f.id ASC";
			else:
				$sql = "SELECT f.id,f.codigo,f.consolidada,i.titulo,d.url_trabalho
						FROM ficha_classificacao AS f 
						LEFT JOIN identificacao AS i 
							ON f.id = i.id
						LEFT JOIN detalhes_finais AS d
							ON f.id = d.id
						WHERE f.consolidada = 1 
						ORDER BY f.id ASC";
			endif;

			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
			$result = mysql_query($sql);
			$i = 0;
			$fichas=null;
			while($data = mysql_fetch_array($result)){
				$fichas[$i] = array($data['id'],$data['codigo'],$data['consolidada'],$data['titulo'],$data['url_trabalho']);
				$i++;
			}

/*			DEPRECATED

			$sql = "SELECT titulo FROM identificacao ORDER BY id ASC";
			$result = mysql_query($sql);
			$i = 0;
			$titulos=null;
			while($data = mysql_fetch_array($result)){
				$titulos[$i] = $data['titulo'];
				$i++;
			}
*/
			$i=0;
			DBFactory::closeConnection();
			if(isset($fichas)){
				while(isset($fichas[$i])){
					$titulo = $fichas[$i][3];
					$id_ficha = $fichas[$i][0];
					$codigo = $fichas[$i][1];
					$consolidada = ($fichas[$i][2])?"":"_nc";
					$url_trabalho = $fichas[$i][4];
					
					//Codigo e título
					echo
					"<tr>
					<td>$codigo</td>
					<td>$titulo</td>";

					//Url do trabalho
					echo "<td>";
					if(!empty($url_trabalho)){
						echo "<a href=\"".$url_trabalho."\"><img src=\"text.png\" alt=\"Abrir tese\"></a>";
					}
					echo "</td>";

					//Edição e remoção
					if(estaLogado()):
						echo "<td><a href=\"formulario.php?id=$id_ficha\"><img src=\"editar".$consolidada.".png\" alt=\"Editar\" /></a></td>";
						echo "<td><a href=\"javascript:void()\" onClick=\"confirma_exclusao($id_ficha);\"><img src=\"excluir.png\" alt=\"Excluir\" /></a></td>";
					endif;

					//Fechando linha
					echo "</tr>";
					$i++;
				}
			} else {
				echo "<br />Nenhuma ficha cadastrada";
			}
		?>
		</table>
	</body>
</html>
