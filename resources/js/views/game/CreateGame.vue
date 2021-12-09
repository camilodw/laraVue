<template>
  <div class="container">
    <div class="row justify-content-center">
      <form
        @submit.prevent="createGame"
        class="mt-5 col-lg-4 col-12 col-md-10 bg-white border"
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
        <div class="col-12 text-end mt-2 mb-2">
          <router-link to="/" class="btn btn-secondary">Close</router-link>
 <button type="submit" class="btn btn-primary">Save</button>
        </div>
       
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      message:null,
      game: {
        name: "",
        urlImage: "",
        urlGame: "",
        status: false,
        description: "",
      },
      errors: {},
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
const {success}=response.data;
this.message=success
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
};
</script>
