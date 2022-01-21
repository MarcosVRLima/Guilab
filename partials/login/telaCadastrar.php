<div class="container lighten-5">
    <div class="row">
        <form class="col s12" action="" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input name="nome" id="nomeCadId" type="text" class="validate" required>
                    <label for="nomeId">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input name="matricula" id="matriculaCadId" type="number" class="validate" min="100000" max="999999" required>
                    <label for="matriculaId">Matrícula</label>
                </div>
                <div class="input-field col s12">
                    <input name="email" id="emailCadId" type="email" class="validate" required>
                    <label for="emailId">Email</label>
                </div>
                <div class="input-field col s12">
                    <select name="cursos" id="cursosCadId" class="validate">
                        <option value="" disabled selected>Escolha seu curso</option>
                        <option value="Ciências Econômicas">Ciências Econômicas</option>
                        <option value="Engenharia de Computação">Engenharia de Computação</option>
                        <option value="Engenharia Elétrica">Engenharia Elétrica</option>
                        <option value="Medicina">Medicina</option>
                        <option value="Música">Música</option>
                        <option value="Odontologia">Odontologia</option>
                        <option value="Psicologia">Psicologia</option>
                        <option value="">Nenhum</option>
                    </select>
                    <label>Curso</label>
                </div>
                <div class="input-field col s12 right-align">
                    <button class="waves-effect waves-light btn blue azul" type="submit" name="cadastraUsuario" id="idCadastraUsuario">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="progress" id="preloaderProgress" style="display:none;">
    <div class="indeterminate" id="preloaderIndeterminate"></div>
</div>