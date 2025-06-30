<!-- src/pages/HomePage.vue -->
<template>
  <DashboardLayout>
    <!-- <div class="headlines">
      <h1>{{ city }}/{{ state }}</h1>
      <VoteBanner :daysLeft="daysLeft" />
    </div>

    <div class="actions">
      <button @click="openIndicationForm" :disabled="!canIndicate">
        Indicar Local
      </button>
    </div> --->

    <section class="indications">
      <IndicationCard
        v-for="indication in visibleIndications"
        :key="indication.indication_id"
        :data="indication"
        @vote="handleVote"
        @share="handleShare"
        @report="handleReport"
      />
      <button v-if="canLoadMore" @click="loadMore">Carregar mais</button>
    </section>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from '../layouts/DashboardLayout.vue';
import IndicationCard from '../components/IndicationCard.vue';
import VoteBanner from '../components/VoteBanner.vue';

export default {
  components: {
    DashboardLayout,
    IndicationCard,
    VoteBanner
  },
  data() {
    return {
      city: 'São Paulo',
      state: 'SP',
      indications: [],
      currentPage: 1,
      perPage: 5,
      daysLeft: 3,
      canIndicate: true
    };
  },
  computed: {
    visibleIndications() {
      return this.indications.slice(0, this.currentPage * this.perPage);
    },
    canLoadMore() {
      return this.visibleIndications.length < this.indications.length;
    }
  },
  methods: {
    loadMore() {
      this.currentPage++;
    },
    openIndicationForm() {
      // lógica para abrir form
    },
    handleVote(id) {},
    handleShare(link) {
      navigator.clipboard.writeText(link);
      alert('Link copiado!');
    },
    handleReport(id) {}
  },
  mounted() {
    // carregar indicações
  }
};
</script>
