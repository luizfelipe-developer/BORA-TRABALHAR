<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" type="imagem/x-icon" href="componentes/imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="componentes/css/login_form_email_cpf.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="javascript:history.back()"><img src="componentes/imgs/icones/voltar.png" alt="">Voltar</a></div>
				<div class="contact">
					<form action="testLogin.php" method="POST">
          <a href="../../../index.html" class="config_logo"><img src="componentes/imgs/logo/logo-sem-fundo.png" class="logo"></a>
						<h3>Nome do Usuario</h3>
						<input type="text" placeholder="Nome" name="nome" required>
            <!-- <div>
              <input type="password" placeholder="SENHA" name="senha" id="senha" required>
              <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
            </div> -->
						<button class="submit" name="submit">ENTRAR</button>
            <div class="separator">
              <hr class="line">
              <span>Ou</span>
              <hr class="line">
            </div>
            <button class="button" name="bt-entrar">
              <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262">
                <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
              </svg>
              Entrar com Google
            </button>

            <p class="note">Termos de uso &amp; Condições</p>
					</form>

				</div>
			</div>
			<div class="right">
				<div class="right-text">
          <div>
					<img src="componentes/imgs/logo/logo-sem-fundo.png" alt="">
        </div>
				</div>
				<div class="right-inductor"><img src="" alt=""></div>
			</div>
		</div>
	</section>
  <script src="../../js/senha.js"></script>
</body>
</html>