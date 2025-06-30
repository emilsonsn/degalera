<template>
  <div class="container">
    <header class="header">

    </header>

    <div class="headlines">
      <h1>Uma nova forma de conhecer pessoas!</h1>
      <p>Vote com a galera e descubra onde será o próximo encontro.</p>
    </div>

    <main class="main-content">
      <section class="image-section">
        <img src="../../../public/imgs/pessoas.png" alt="">
      </section>

      <section class="login-section">
        <h2>Bem-vindo de volta!</h2>
        <form @submit.prevent="login">
          <div>
            <label for="email">Email</label>
            <input v-model="email" type="email" id="email" placeholder="Seu email" required />
          </div>
          <div>
            <label for="password">Senha</label>
            <input v-model="password" type="password" id="password" placeholder="Sua senha" required />
          </div>
          <div class="login-links" style="text-align: right; margin-bottom: 15px;">
            <a href="#">Esqueceu sua senha?</a>
          </div>
          <button type="submit">Entrar</button>
          <div class="login-links" style="margin-top: 20px;">
            <p>Não tem uma conta? <a href="/register">Cadastre-se</a></p>
          </div>
        </form>
      </section>
    </main>

    <footer class="footer">
      <a href="#">Sobre</a> |
      <a href="#">Contato</a> |
      <a href="#">Termos</a> |
      <a href="#">Dúvidas</a>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    login() {
      console.log('Login com', this.email, this.password);
    }
  }
};
</script>

<style scoped>
body {
  font-family: sans-serif;
  margin: 0;
  background-color: #ffffff;
  color: #212529;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.headlines {
  text-align: center;
  margin-bottom: 30px;
}
.headlines h1 {
  font-size: 2.5em;
  margin-bottom: 10px;
  color: #212529;
}
.headlines p {
  font-size: 1.2em;
  color: #6c757d;
}
.main-content {
  display: flex;
  gap: 20px;
  background-color: #ffffff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.image-section {
  flex: 60%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #e0e0e0;
  border-radius: 8px;
  min-height: 300px;
}
.image-section img{
    width: 100%;
}
.image-placeholder {
  text-align: center;
  color: #6c757d;
}
.login-section {
  flex: 40%;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 8px;
}
.login-section h2 {
  margin-top: 0;
  color: #212529;
}
.login-section label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}
.login-section input[type='email'],
.login-section input[type='password'] {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ced4da;
  border-radius: 4px;
}
.login-section button {
  background-color: #4285f4;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  font-size: 1em;
}
.login-section button:hover {
  background-color: #3367d6;
}
.login-links {
  margin-top: 15px;
  text-align: center;
}
.login-links a {
  color: #4285f4;
  text-decoration: none;
  font-size: 0.9em;
}
.login-links a:hover {
  text-decoration: underline;
}
.footer {
  text-align: center;
  padding: 20px 0;
  margin-top: 30px;
  border-top: 1px solid #ddd;
  font-size: 0.9em;
}
.footer a {
  margin: 0 10px;
  color: #6c757d;
  text-decoration: none;
}
.footer a:hover {
  text-decoration: underline;
}

@media (max-width: 768px) {
  .main-content {
    flex-direction: column;
  }
  .image-section,
  .login-section {
    flex: 100%;
  }
}
</style>
