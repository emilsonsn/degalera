<!-- RegisterPage.vue -->
<template>
  <div class="container">
    <header class="header"></header>

    <div class="headlines">
      <h1>Crie sua conta</h1>
      <p>Participe da votação e descubra onde será o próximo encontro!</p>
    </div>

    <main class="main-content">
      <section class="image-section">
        <img src="../../../public/imgs/pessoas2.png" alt="Pessoas se conhecendo" loading="lazy" />
      </section>

      <section class="login-section">
        <h2>Cadastro</h2>
        <form @submit.prevent="register">
          <div>
            <label for="name">Nome</label>
            <input v-model="name" id="name" type="text" maxlength="50" required />
          </div>
          <div>
            <label for="surname">Sobrenome</label>
            <input v-model="surname" id="surname" type="text" maxlength="50" required />
          </div>
          <div>
            <label for="email">E-mail</label>
            <input v-model="email" id="email" type="email" maxlength="50" required />
          </div>
          <div>
            <label for="gender">Sexo</label>
            <select v-model="gender" id="gender" required>
              <option value="">Selecione</option>
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
              <option value="Outro">Outro</option>
            </select>
          </div>
          <div>
            <label for="state">Estado</label>
            <select v-model="state" id="state" @change="loadCities" required>
              <option disabled value="">Selecione</option>
              <option v-for="uf in states" :key="uf" :value="uf">{{ uf }}</option>
            </select>
          </div>
          <div>
            <label for="city">Cidade</label>        
            <select v-model="city" id="city" required>
              <option v-for="c in filteredCities" :key="c" :value="c">{{ c }}</option>
            </select>
          </div>
          <div>
            <label for="password">Senha</label>
            <input v-model="password" id="password" type="password" minlength="6" maxlength="20" required />
          </div>
          <div>
            <label for="confirmPassword">Confirmar Senha</label>
            <input v-model="confirmPassword" id="confirmPassword" type="password" required />
          </div>
          <div style="margin-top: 10px;">
            <input type="checkbox" v-model="termsAccepted" id="terms" />
            <label for="terms">
              Ao se registrar, você concorda com nossos <a href="#">Termos & Condições</a>.
            </label>
          </div>
          <button type="submit" :disabled="!formValid">Cadastrar</button>
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
      name: '',
      surname: '',
      email: '',
      gender: '',
      state: '',
      city: '',
      password: '',
      confirmPassword: '',
      termsAccepted: false,
      states: ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'],
      allCities: [], // preenchido após carregar do back-end
      filteredCities: []
    };
  },
  computed: {
    formValid() {
      return (
        this.name &&
        this.surname &&
        this.validEmail(this.email) &&
        this.gender &&
        this.state &&
        this.city &&
        this.password.length >= 6 &&
        this.password === this.confirmPassword &&
        this.termsAccepted
      );
    }
  },
  methods: {
    validEmail(email) {
      const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return regex.test(email);
    },
    loadCities() {
    this.allCities = [];
    this.filteredCities = [];
    this.city = '';

    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${this.state}/municipios`)
        .then(response => response.json())
        .then(data => {
        this.allCities = data.map(cidade => cidade.nome).sort((a, b) =>
            a.localeCompare(b, 'pt-BR')
        );
        this.filteredCities = [...this.allCities];
        })
        .catch(err => {
        console.error('Erro ao carregar cidades do IBGE:', err);
        });
    },

    register() {
      console.log('Cadastro:', {
        name: this.name,
        surname: this.surname,
        email: this.email,
        gender: this.gender,
        state: this.state,
        city: this.city,
        password: this.password
      });
    }
  }
};
</script>

<style scoped>
/* Reaproveita o estilo do LoginPage.vue */
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
  flex: 30%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #e0e0e0;
  border-radius: 8px;
  min-height: 300px;
}
.image-section img {
    width: 100%;
  height: 100%;
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
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}
.login-section input,
.login-section select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ced4da;
  border-radius: 4px;
}
.login-section input[type='checkbox'] {
  display: inline-block;
  width: auto;
}
.login-section button {
  background-color: #28a745;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  font-size: 1em;
}
.login-section button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}
.login-section button:hover:not(:disabled) {
  background-color: #218838;
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
