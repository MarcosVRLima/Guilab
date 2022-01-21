<form>
	<div class="container">
		<div class="row">
			<div class="form-group col-md col-sm">	
				<label for="paciente">Paciente:</label>
				<input class="form-control" type="text" name="paciente" id="paciente" placeholder="Digite o nome do paciente">
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">
				<label for="nomem">Nome da mãe:</label>
				<input class="form-control" type="text" name="nomem" id="nomem" placeholder="Digite o nome da mãe">
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">
				<label for="end">Endereço:</label>
				<input class="form-control" type="text" name="end" id="end" placeholder="Digite o endereço">
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="datanas">Data de Nascimento:</label>
				<input class="form-control" type="date" name="datanas" id="datanas">
			</div>	
			<div class="form-group col-md-3 col-sm">
				<label for="cns">CNS:</label>
				<input class="form-control" type="number" name="cns" id="cns" placeholder="Digite o número do Cartão Nacional de Saúde" required>
			</div>
			<div class="form-group col-md-3 col-sm">
				<label for="datames">DUM:</label>
				<input class="form-control" type="date" name="datames" id="datames" required>
			</div>
			<div class="form-group col-md-3 col-sm">
				<label for="dataparto">DPP:</label>
				<input class="form-control" type="date" name="dataparto" id="dataparto" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-sm">
				<label for="inipre">Início do Pré-Natal:</label>
				<input class="form-control" type="date" name="inipre" id="inipre" required>
			</div>	
			<div class="form-group col-md-4">
				<label for="class">Classificação de Risco Gestacional:</label>
				<input class="form-control" type="" name="class" id="class" required>
			</div>
			<div class="form-group col-md-5 col-sm">
				<label for="acs">ACS:</label>
				<input class="form-control" type="text" name="acs" id="acs" placeholder="Digite o nome do Agente Comunitário de Saúde" required>
			</div>
		</div>
		<div class="row">
			<div class="form-check col-md col-sm">
				<label>Recebe Bolsa Família: </label>
		  		<input class="form-check-input ml-1" type="radio" name="radios" id="Radiossim" value="Sim" checked>
		  		<label class="form-check-label ml-3" for="Radiossim">Sim</label>
		  		<input class="form-check-input ml-1" type="radio" name="radios" id="Radiosnao" value="Não" checked>
		  		<label class="form-check-label ml-3" for="Radiosnao">Não</label>
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md col-sm">
				<label>Observações:</label>
				<textarea class="form-control" name="obs" rows="4" cols="50"></textarea>	
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-secondary">Cadastrar</button>
			<button type="reset" class="btn btn-secondary">Limpar</button>
		</div>	
	</div>
</form>