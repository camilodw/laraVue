<template>
  <div class="container">
    <div class="row justify-content-center">
      <form @submit.prevent="createGame" class="col-lg-4 bg-white">
        <div class="form-group">
          <label for="">Name:</label>
          <input
            type="text"
            class="form-control"
            placeholder="Input name"
            v-model="game.name"
          />
        </div>
        <div class="form-group">
          <label for="">Url image</label>
          <input
            type="text"
            class="form-control"
            placeholder="Input url image"
            v-model="game.urlImage"
          />
        </div>
        <div class="form-group">
          <label for="">Url Game</label>
          <input
            type="text"
            class="form-control"
            placeholder="Input url Game"
            v-model="game.urlGame"
          />
        </div>
        <div class="form-group">
          <label for="">Status:</label>
         <button
          type="button"
          class="btn btn-outline-danger"
          v-on:click="toggleStatus"
          v-if="game.status == false"
        >
          Not available
        </button>
        <button
          type="button"
          class="btn btn-outline-success"
          v-on:click="toggleStatus"
          v-if="game.status == true"
        >
          Available
        </button>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <input
            type="text"
            class="form-control"
            placeholder="Input description"
            v-model="game.description"
          />
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      game: {
        name: "",
        urlImage: "",
        urlGame: "",
        status: false,
        description: "",
      },
    };
  },
  methods: {
    toggleStatus() {
      this.game.status = !this.game.status;
    },
    async createGame() {
      await this.axios
        .post("/api/games", this.game)
        .then((response) => {
          this.$router.push({ name: "Home" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
