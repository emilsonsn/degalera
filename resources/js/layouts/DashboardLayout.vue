<!-- src/layouts/DashboardLayout.vue -->
<template>
  <div class="layout-container">
    <MainMenu />

    <main class="layout-content">
      <slot />
    </main>

    <FooterLinks />
  </div>
</template>

<script>
import MainMenu from '../components/MainMenu.vue';
import FooterLinks from '../components/FooterLinks.vue';

export default {
  components: {
    MainMenu,
    FooterLinks
  }
};
</script>

<style scoped>
.layout-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
.layout-content {
  flex-grow: 1;
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}
</style>
