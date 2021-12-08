<template>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-12 text-center">
        <router-link to="/create" class="btn btn-success rounded-circle"
          >➕</router-link
        >
      </div>
    </div>
    <card-component :games="games" />
    <div class="col-12 text-center">
      <pagination :data="games" @pagination-change-page="getGames"></pagination>
    </div>
  </div>
</template>
<script>
import CardComponent from "../components/game/CardComponent.vue";
export default {
  name: "listGames",
  components: { CardComponent },
  mounted() {
    // Obtiene los resultados iniciales
    this.getGames();
  },
  data() {
    return {
      games: {},
    };
  },
  methods: {
    // Nuestro método para OBTENER resultados de un endpoint de Laravel
    async getGames(page = 1) {
      await this.axios
        .get("api/games?page=" + page)
        .then((response) => {
          this.games = response.data;
        })
        .catch((error) => {
          this.games = {};
        });
    },
  },
};
</script>