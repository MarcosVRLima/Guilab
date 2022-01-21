<div class="container lighten-5">
    <div class="row">
        <form class="col s12" action="" method="POST">
            <div class="row">
                <?php 
                    if(isset($_GET['code'])){
                        $resultaCode = listarPorCampo('usuario', 'codigoValidacao', $_GET['code']);
                        foreach ($resultaCode as $user):
                            if($user->codigoValidacao == $_GET['code']){
                                $_SESSION["mensagem"] = "Email cadastrado, crie uma senha para sua conta!";                    
                ?>
                <input hidden name="id" id="idId" type="text" value="<?= $user->id ?>">
                <div class="input-field col s12">
                    <input disabled name="nome" id="nomeId" type="text" class="validate">
                    <label for="nomeId"><?= $user->nome ?></label>
                </div>
                <div class="input-field col s12">
                    <input name="senha1" id="senha1Id" type="password" class="validate" required>
                    <label for="senha1Id">Digite sua nova senha</label>
                    
                    <div class="progress" style="display:none;" id="progressbarId">
                        <div class="determinate" style="width: 10%" id="progressCadId"></div>
                    </div>
                </div>
                <div class="input-field col s12" id="comparaId">
                    <input name="senha2" id="senha2Id" type="password" class="validate" required>
                    <label for="senha2Id" id="labelCompara">Digite novamente sua senha</label>
                    <p id="pCompara"></p>
                </div>
                <div class="input-field col s12 right-align">
                    <button class="waves-effect waves-light btn blue azul" type="submit" name="cadNovaSenha" id="cadNovaSenha">Cadastrar</button>
                </div>
                <?php
                            }else{
                                $_SESSION["mensagem"] = "Usuário não encontrado!";
                            }
                        endforeach;
                    }
                ?>
            </div>
        </form>
    </div>
</div>