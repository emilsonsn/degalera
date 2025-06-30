<template>
  <nav class="main-menu">
    <div class="sidebar">
        <div class="logo">
            <img src="../../../public/imgs/logo.png" alt="" width="100">
        </div>
        <div>
          <ul>
            <li><router-link to="/Home">Home</router-link></li>
            <li><router-link to="/editar-perfil">Editar Perfil</router-link></li>
            <li><router-link to="/ultimo-encontro">Último Encontro</router-link></li>
            <li v-if="isHost"><router-link to="/suporte-anfitriao">Suporte Anfitrião</router-link></li>
            <li><router-link to="/duvidas">Dúvidas</router-link></li>
            <li><a href="#" @click.prevent="logout">Logout</a></li>
          </ul>
        </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'MainMenu', // ✅ OK
  props: {
    isHost: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    logout() {
      alert('Sessão encerrada');
    }
  }
};
</script>

<style scoped>
.main-menu {
  background-color: #ffffff;
  border-bottom: 1px solid #f1f1f1;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}

.sidebar{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.logo{
  display: flex;
  align-items: center;
  justify-content: center;
}
.main-menu ul {
  display: flex;
  justify-content: space-around;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
  flex-wrap: wrap;
}

.main-menu li {
  margin: 0 10px;
}

.main-menu a {
  color: #212529;
  text-decoration: none;
  font-weight: 500;
  font-size: 1rem;
  padding: 8px 12px;
  border-radius: 4px;
  transition: background-color 0.2s;
}

.main-menu a:hover {
  background-color: #f0f0f0;
}
</style>
