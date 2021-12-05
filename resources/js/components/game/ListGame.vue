<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <button type="button" class="btn btn-success">Add game</button>
        </div>
      </div>
      <div class="card" style="width: 18rem" v-for="game in games" v-bind:key="game.id">
        <img :src="game.urlImage" class="card-img-top" :alt="game.name" />
        <div class="card-body">
          <h5 class="card-title">{{ game.name }}</h5>
          <p class="card-text">
           {{ game.description }}
          </p>
          <a href="" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
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