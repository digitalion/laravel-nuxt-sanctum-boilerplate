<template>
  <main class="form-signin">
    <img class="mb-4" src="~/static/images/favicon.png" alt="" height="57" />
    <h1 class="h3 mb-3 fw-normal">Autenticazione</h1>

    <div class="form-floating">
      <input
        type="email"
        class="form-control"
        id="floatingInput"
        v-model="email"
        placeholder="name@example.com"
      />
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input
        type="password"
        class="form-control"
        id="floatingPassword"
        v-model="password"
        placeholder="Password"
      />
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" @click="login">Accedi</button>
  </main>
</template>

<script>
export default {
  layout: "empty",
  auth: "guest",

  data() {
    return {
      email: "",
      password: "",
    };
  },

  methods: {
    async login() {
      await this.$auth.loginWith("local", {
        data: {
          email: this.email,
          password: this.password,
        },
      });

      this.$router.push("/");
    },
  },
};
</script>

<style scoped></style>
