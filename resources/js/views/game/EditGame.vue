<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <form
        @submit.prevent="updateGame"
        class="mt-5 col-lg-4 bg-white border round"
      >
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
        <div>
          <label for="">Status:</label>
        </div>
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
  name: "editGame",
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
  mounted() {
    this.viewGame();
  },
  methods: {
    toggleStatus() {
      this.game.status = !this.game.status;
    },
    async viewGame() {
      await this.axios
        .get(`/api/games/${this.$route.params.id}`)
        .then((response) => {
          const { name, status, description, urlImage, urlGame } =
            response.data;
          this.game.name = name;
          this.game.status = status;
          this.game.description = description;
          this.game.urlImage = urlImage;
          this.game.urlGame = urlGame;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async updateGame() {
      await this.axios
        .put(`/api/games/${this.$route.params.id}`, this.game)
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