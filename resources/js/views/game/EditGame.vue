<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <form
        @submit.prevent="updateGame"
        class="mt-5 col-lg-4 col-12 col-md-10 bg-white border round"
      >
       <div class="alert alert-success text-center" v-if="message">
        {{ message
         }}
      </div>
        <div class="form-group">
          <label for="">Name:</label>
          <div class="alert alert-danger" v-if="errors.name">
            {{ errors.name[0] }}
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Input name"
            v-model="game.name"
          />
        </div>
        <div class="form-group">
          <label for="">Url image</label>
          <div class="alert alert-danger" v-if="errors.urlImage">
            {{ errors.urlImage[0] }}
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Input url image"
            v-model="game.urlImage"
          />
        </div>
        <div class="form-group">
          <label for="">Url Game</label>
          <div class="alert alert-danger" v-if="errors.urlGame">
            {{ errors.urlGame[0] }}
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Input url Game"
            v-model="game.urlGame"
          />
        </div>
        <div class="form-group">
          <label for="">Status:</label>
          <div class="alert alert-danger" v-if="errors.status">
            {{ errors.status[0] }}
          </div>
          <button
            type="button"
            class="btn btn-danger form-control"
            v-on:click="toggleStatus"
            v-if="game.status == false"
          >
            Not available
          </button>
          <button
            type="button"
            class="btn btn-success form-control"
            v-on:click="toggleStatus"
            v-if="game.status == true"
          >
            Available
          </button>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <div class="alert alert-danger" v-if="errors.description">
            {{ errors.description[0] }}
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Input description"
            v-model="game.description"
          />
        </div>
        <div class="text-end mt-2 mb-2">
          <router-link to="/" class="btn btn-secondary">Close</router-link>
          <button
            type="button"
            class="btn btn-danger"
            @click="deleteGame(game.id)"
          >
            Delete
          </button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  name: "editGame",
  data() {
    return {
      message:null,
       errors: {},
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
          const { id,name, status, description, urlImage, urlGame } =
            response.data;
             this.game.id = id;
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
      deleteGame(id) {
      if (confirm("Do you confirm to delete the game?")) {
        this.axios
          .delete(`/api/games/${id}`)
          .then((response) => {
            this.$router.push({ name: "Home" });
          })
          .catch((error) => {
              console.log(error);
          });
      }
    },
    async updateGame() {
      await this.axios
        .put(`/api/games/${this.$route.params.id}`, this.game)
        .then((response) => {
         const {success}=response.data;
          this.message=success
        })
        .catch((error) => {
         if (error.response.status === 422) {
           this.message=null;
            this.errors = error.response.data.errors;
          }
        });
    },
  
  },
};
</script>