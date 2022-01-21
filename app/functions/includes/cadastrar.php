<?php 
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $conexao = conectar();

  if (isset($_POST['cadastraUsuario'])) {
    
    ##DADOS do agendamento##############################################################################################################################
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $matricula = (int) filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = password_hash(generateRandomString(8), PASSWORD_DEFAULT);
    $codigoV = generateRandomString(32);
    $curso = isset($_POST['cursos']) ? $_POST['cursos'] : "";

    $attributes_usuario = [
      "matricula" => $matricula,
      "nome" => $nome,
      "email" => $email,
      "senha" => $senha,
      "codigoValidacao" => $codigoV,
      "curso" => $curso,
      "admin" => 0
    ];

    $usuarioCadastrado = cadastrar("usuario", $attributes_usuario);
    if($usuarioCadastrado != "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '" . $email ."' for key 'email_UNIQUE'"){
      
      $mail = new PHPMailer(true);

      try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';                                    

        //Recipients
        $mail->setFrom('', ''); //email and name
        $mail->addAddress($email, $nome);     // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Seja bem vindo ao Guilab, ' . $nome;
        $mail->Body    = 'Você se cadastrou em nosso sistema, clique no <a href="localhost/guilab/cadastraSenha.php?code=' . $codigoV .'">link</a> para confirmar sua conta';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients(aqui não sei oq colocar aindakkkkk)';

        $mail->send();
        
        $mensagem = ["<h6 class='white-text'>Cadastrado com sucesso, verifique seu email.</h6>", "green darken-1"];
      } catch (Exception $e) {
        $mensagem = ["<h6 class='white-text'>Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}</h6>", "yellow darken-1"];
      }
    }else{
      $mensagem = ["<h6 class='white-text'>Email já existe, tente com outro!</h6>", "yellow darken-1"];
    }
  }

  if(isset($_POST["cadNovaSenha"])){
    $id = $_POST["id"];
    $senha = password_hash($_POST["senha1"], PASSWORD_DEFAULT);

    $attributes_usuario = ["senha" => $senha];

    $usuarioCadastrado = atualizar($id, "usuario", $attributes_usuario);
    $_SESSION['mensagem'] = "Senha cadastrada com sucesso, entre com email e senha para fazer login!";
    header("Location: login.php");
  }

  if (isset($_POST['cadastraAmbiente'])) {
    $nome = filter_input(INPUT_POST, 'nomeAmbiente', FILTER_SANITIZE_STRING);
    $capacidade = (int) filter_input(INPUT_POST, 'capacidadeAmbiente', FILTER_SANITIZE_STRING);

    $attributes_ambiente = [
      "nome" => $nome,
      "capacidade" => $capacidade
    ];

    $ambienteCadastrado = cadastrar("ambiente", $attributes_ambiente);
    $_SESSION["mensagem"] = ($ambienteCadastrado) ? ["<h6 class='white-text'>Cadastrado com sucesso!</h6>", "green darken-1"] : ["<h6 class='white-text'>Ambiente não cadastrado!</h6>", "yellow darken-1"];
  }

  if (isset($_POST['cadastraHorario'])) {
    $dataI = date("Y-m-d", strtotime(inverteData($_POST['dataInicial'])));
    $dataF = date("Y-m-d", strtotime(inverteData($_POST['dataFinal'])));
    $ids = explode(" ", $_POST['ambiente']); // 0->responsavel, 1->ambiente
    $horarioI = $_POST['horarioInicial'] . ":00";
    $horarioF = date("H:i:s", (strtotime($_POST['horarioFinal'] . ":00")-60));
    $executa = true;
    $mensagem = "";
    
    $resultHora = listar('horarios');
    foreach($resultHora as $hora){
      if(strtotime($hora->dataInicial) <= strtotime($dataF) & strtotime($hora->dataFinal) >= strtotime($dataI)){
        if(strtotime($hora->horarioInicial) <= strtotime($horarioF) & strtotime($hora->horarioFinal) >= strtotime($horarioI)){
          $resultaResp = listarPorId($hora->responsavel_id, 'responsavel');
          if($resultaResp[0]->{'usuario_id'} == $_SESSION["id"]){
            $executa = false;
            $mensagem = "Você já é responsável por um ambiente neste horário";
            break;
          }else if($resultaResp[0]->{'ambiente_id'} == $ids[1]){
            $executa = false;
            $mensagem = "Este ambiente já está reservado neste horário";
            break;
          }
        }
      }
    }

    if($executa){
      $attributes = [
        "horarioInicial" => $horarioI,
        "horarioFinal" => $horarioF,
        "dataInicial" => $dataI,
        "dataFinal" => $dataF,
        "responsavel_id" => $ids[0]
      ];

      $horarioCadastrado = cadastrar("horarios", $attributes);
      $_SESSION['mensagem'] = ["<h6 class='white-text'>Horario Cadastrado com sucesso!</h6>", "green darken-1"];
      header("Refresh: 3, home.php?p=horario");
    }else{
      $_SESSION['mensagem'] =  ["<h6 class='white-text'>" . $mensagem . "!</h6>", "yellow darken-1"];
    }
  }
  
  if(isset($_POST['cadastraAgendamento'])){
    $data = $_POST['data'];
    $userId = $_POST['usuarioId'];
    $horarioId = $_POST['horarioId'];

    $ragenda = listarPorFK('agendamento', 'usuario_id', $userId);
    $executa = true;

    foreach($ragenda as $agenda){
      if($agenda->data == $data){
        $executa = false;
        break;
      }
    }

    if($executa){
      $attributes = [
        "data" => $data,
        "usuario_id" => $userId,
        "horarios_id" => $horarioId
      ];

      $horarioCadastrado = cadastrar("agendamento", $attributes);
      $_SESSION['mensagem'] = ["<h6 class='white-text'>Agendamento feito com sucesso!</h6>", "green darken-1"];
    }else{
      $_SESSION['mensagem'] = ["<h6 class='white-text'>Você já tem um agendamento pra esse mesmo horário e dia!</h6>", "yellow darken-1"];
    }
  }
?>