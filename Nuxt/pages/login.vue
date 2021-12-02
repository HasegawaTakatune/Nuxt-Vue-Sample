<template>
  <div class="container">
    <h1 class="h1 pb-1 border-bottom border-dark">Login</h1>
    <p>ログイン状態: {{ $auth.loggedIn }}</p>
    <div class="row justify-content-md-center">
      <div class="col-6">
        <form name="login" @submit.prevent="login()">
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Enter email"
              v-model="form.email"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Enter password"
              v-model="form.password"
              required
            />
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>

    <div v-html="page"></div>
  </div>
</template>
<script>
// import axios from "axios";

export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      page: "",
    };
  },
  mounted() {
    // csrf対策
    // nginxでRPする場合は/sanctumがapi側を見に行くようにしてください
    // this.$axios.get("/sanctum/csrf-cookie");
  },
  methods: {
    async login() {
      try {
        await this.$axios
          .get("/sanctum/csrf-cookie", { withCredentials: true })
          .then((response) => {
            this._login();
          });

        // axios.get("/api/user", { withCredentials: true }).then((resuponse) => {
        //   console.log(resuponse.data);
        // });
        // const response = await this.$auth.loginWith("local", {
        //   params: {
        //     data: this.form,
        //   },
        // });
        // console.log(response);
      } catch (error) {
        this.page = error;
        console.log(error);
      }
    },

    async _login() {
      try {
        await this.$axios
          .post("/api/login", this.form, { withCredentials: true })
          .then((response) => {
            console.log(response.data);
          });
      } catch (error) {
        this.page = error;
        console.log(error);
      }
    },
  },
};
</script>