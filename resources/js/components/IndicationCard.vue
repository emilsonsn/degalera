<template>
  <div class="card">
    <img :src="data.photos[0]" loading="lazy" alt="Foto do local" />
    <div class="info">
      <h3>{{ data.name }}</h3>
      <p>{{ data.address }}</p>
      <p v-if="data.reference"><strong>Referência:</strong> {{ data.reference }}</p>
      <p><strong>Telefone:</strong> {{ data.phone }}</p>
      <p v-if="data.website"><a :href="data.website" target="_blank">Site</a></p>
      <p><strong>Atrativos:</strong> {{ data.attractives.join(', ') }}</p>
      <p><strong>Encontro:</strong> {{ data.event_day }} / {{ data.event_time }}</p>
      <p><strong>Anfitrião:</strong> {{ data.host_name }}</p>

      <div class="actions">
        <button @click="$emit('vote', data.indication_id)">👍 Votar</button>
        <button @click="$emit('share', shareLink)">📤 Compartilhar</button>
        <button @click="$emit('report', data.indication_id)">🚫 Denunciar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: Object
  },
  computed: {
    shareLink() {
      const cidade = this.data.city.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '-');
      return `https://degalera.com.br/${cidade}`;
    }
  }
};
</script>

<style scoped>
.card {
  display: flex;
  gap: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
}
.card img {
  width: 223px;
  height: 214px;
  object-fit: cover;
}
.info {
  flex: 1;
  padding: 10px;
}
.info h3 {
  margin-top: 0;
}
.actions {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
button {
  padding: 6px 12px;
  border: none;
  border-radius: 4px;
  background-color: #4285f4;
  color: white;
  cursor: pointer;
}
button:hover {
  background-color: #3367d6;
}
</style>
