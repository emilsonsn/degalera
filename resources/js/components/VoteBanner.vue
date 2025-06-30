<template>
  <div class="vote-banner">
    <p v-if="daysLeft > 1">Faltam {{ daysLeft }} dias para o fim da votação!</p>
    <p v-else-if="daysLeft === 1">Falta 1 dia para o fim da votação!</p>
    <p v-else>Último dia para votar!</p>
  </div>
</template>

<script>
export default {
  props: {
    daysLeft: Number
  }
};
</script>

<style scoped>
.vote-banner {
  background-color: #fff8e1;
  color: #795548;
  padding: 10px 15px;
  border-radius: 6px;
  margin: 10px auto 20px;
  max-width: 400px;
  font-weight: bold;
  text-align: center;
  font-size: 1em;
}
</style>
