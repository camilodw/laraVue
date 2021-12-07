<template>
  <div class="container-fluid">
    <div class="row justify-content-around gap-2 mt-5">
      <div
        class="card bg-white"
        style="width: 18rem"
        v-for="g in games"
        v-bind:key="g.id"
      >
        <img :src="g.urlImage" class="card-img-top" :alt="g.name" />
        <div class="card-body">
          <h5 class="card-title text-center">{{ g.name }}</h5>
          <p class="card-text">
            {{ g.description }}
          </p>
          <label>Status:</label>
          <p class="card-text text-success" v-if="g.status == true">
            Available
          </p>
          <p class="card-text text-danger" v-if="g.status == false">
            Not available
          </p>
          <div class="text-center">
            <a :href="g.urlGame" class="btn btn-primary" target="_blank"
              >Play</a
            >
            <router-link
              :to="{ name: 'EditGame', params: { id: g.id } }"
              class="btn btn-secondary"
              >Edit</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "listGames",
  components: {},
  data() {
    return {
      games: [],
    };
  },
  mounted() {
    this.getGames();
  },
  methods: {
    async getGames() {
      await this.axios
        .get("api/games")
        .then((response) => {
          this.games = response.data;
        })
        .catch((error) => {
          this.games = [];
        });
    },
  },
};
</script>