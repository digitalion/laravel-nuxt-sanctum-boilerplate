<template>
    <div class="text-center">
        <main class="form-signin">
            <form action="/">
                <img
                    class="mb-4"
                    src="~/static/images/favicon.png"
                    alt=""
                    height="57"
                />
                <h1 class="h3 mb-3 fw-normal">Autenticazione</h1>

                <div class="form-floating">
                    <input
                        type="email"
                        class="form-control"
                        id="floatingInput"
                        placeholder="name@example.com"
                    />
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="form-floating">
                    <input
                        type="password"
                        class="form-control"
                        id="floatingPassword"
                        placeholder="Password"
                    />
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me" /> Ricordami
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">
                    Accedi
                </button>
            </form>
        </main>
    </div>
</template>

<style scoped src="@/assets/scss/login.scss" lang="scss" />
