<form class="">
	<div class="container">
		<div class="row mt-4 bg-dark">
			<div class="col-md">
				<center>
					<h4>DADOS DOS PAIS</h4>
				</center>	
			</div>
		</div>
		<!-- ############################# DADOS DA MÃE ############################# -->
		<div class="row">
			<div class="form-group col-md col-sm">	
				<label for="nomemae">Nome da Mãe:</label>
				<input class="form-control form-control-sm" type="text" name="nomemae" id="nomemae" placeholder="Digite o nome da mãe">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="idademae">Idade:</label>
				<input class="form-control form-control-sm" type="number" name="idademae" id="idademae" placeholder="Digite a idade da mãe">
			</div>
			<div class="form-group col-md-6 col-sm">
				<label for="profissaomae">Profissão:</label>
				<input class="form-control form-control-sm" type="text" name="profissaomae" id="profissaomae" placeholder="Digite a profissão da mãe">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="cprenatal">Nº de consultas de pré-natal:</label>
				<input class="form-control form-control-sm" type="number" name="cprenatal" id="cprenatal">
			</div>
			<div class="form-group col-md-3">
				<label for="filhosvivo">Filhos Nascidos Vivos:</label>
				<input class="form-control form-control-sm" type="number"  name="filhosvivo" id="filhosvivo" size="5px">
			</div>
			<div class="form-group col-md-3">
				<label for="filhosmorto">Mortos:</label>
				<input class="form-control form-control-sm" type="number" name="filhosmorto" id="filhosmorto">
			</div>
			<div class="form-group col-md-3">
				<label for="filhosaborto">Aborto:</label>
				<input class="form-control form-control-sm" type="number" name="filhosaborto" id="filhosaborto">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">	
				<label for="municipiopn">Município de realização do pré-natal:</label>
				<input class="form-control form-control-sm" type="text" name="municipiopn" id="municipiopn" placeholder="Realizou pré-natal em qual município?">
			</div>
		</div>
		<!-- ############################# DADOS DO PAI ############################# -->
		<div class="row">
			<div class="form-group form-group col-md col-sm">	
				<label for="nomemae">Nome do Pai:</label>
				<input class="form-control form-control-sm" type="text" name="nomepai" id="nomepai" placeholder="Digite o nome do pai">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="idadepai">Idade:</label>
				<input class="form-control form-control-sm" type="number" name="idadepai" id="idadepai" placeholder="Digite a idade do pai">
			</div>
			<div class="form-group col-md-6 col-sm">
				<label for="profissaopai">Profissão:</label>
				<input class="form-control form-control-sm" type="text" name="profissaopai" id="profissaopai" placeholder="Digite a profissão do pai">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4 col-sm">
				<label for="nummen">Nº de membros da família:</label>
				<input class="form-control form-control-sm" type="number" name="nummen" id="rendaf">
			</div>
			<div class="form-group col-md-4 col-sm">
				<label for="rendaf">Renda Familiar:</label>
				<input class="form-control form-control-sm" type="number" name="rendaf" id="rendaf">
			</div>
			<div class="form-group col-md-4 col-sm">
				<label for="acs">ACS:</label>
				<input class="form-control form-control-sm" type="text" name="acs" id="acs" placeholder="Digite o nome do Agente Comunitário de Saúde" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">
				<label>Observações:</label>
				<textarea class="form-control form-control-sm" name="obs" rows="4" cols="50"></textarea>	
			</div>
		</div>
		<!-- ############################# DADOS DA CRIANÇA ####################################### -->
		<div class="row mt-4 bg-dark">
			<div class="col-md">
				<center>
					<h4>DADOS DO RECÉM NASCIDO</h4>
				</center>	
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">
				<label for="nomern">Nome do RN:</label>
				<input class="form-control form-control-sm" type="text" name="nomern" id="nomern" placeholder="Digite o nome do recém nascido">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="datarn">Data de Nascimento</label>
				<input class="form-control form-control-sm" type="date" name="datarn" id="hora">
			</div>
			<div class="form-group col-md-3 col-sm">
				<label for="hora">Hora:</label>
				<input class="form-control form-control-sm" type="text" name="hora" id="hora">
			</div>
			<div class="form-group col-md-2 col-sm">
				<label for="sexo">Sexo:</label>
				<input class="form-control form-control-sm" type="text" name="sexo" id="sexo">
			</div>
			<div class="form-group col-md-4 col-sm">
				<label for="tipo">Tipo de parto:</label>
				<input class="form-control form-control-sm" type="text" name="tipo" id=tipo">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="peso">Peso:</label>
				<input class="form-control form-control-sm" type="number" name="peso" id="peso">
			</div>
			<div class="form-group col-md-3 col-sm">
				<label for="altura">Altura:</label>
				<input class="form-control form-control-sm" type="number" name="altura" id="altura">
			</div>
			<div class="form-group col-md-3 col-sm">
				
			</div>
			<div class="form-group col-md-3 col-sm">
				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-8 col-sm">
				<label for="end">Endereço:</label>
				<input class="form-control form-control-sm" type="text" name="end" id="end" placeholder="Ex: Rua Antonio Saturnino, Caroba">
			</div>
			<div class="form-group col-md-4 col-sm">
				<label for="localidade">Localidade:</label>
				<input class="form-control form-control-sm" type="text" name="localidade" id="localidade" placeholder="Ex: Sede">
			</div>
		</div>
		<div class="row">
			<div class="form-group">
			<button type="submit" class="btn btn-dark mb-4 mt-2">Cadastrar</button>
			<button type="reset" class="btn btn-dark mb-4 mt-2">Limpar</button>
		</div>	
		</div>	
	</div>
</form>