<template>
<header class="container">
  <div class="logo">Logo</div>
  <nav>
    <ul>
      <li><Link href="/">Home</Link></li>
      <!-- <li><Link href="#">Exercises</Link></li> -->
      <!-- <li><Link href="#leaderboard">Leaderboard</Link></li> -->
      <li><Link href="/About">About</Link></li>
      <li><Link href="/Contact">Contact</Link></li>
    </ul>
    <ul>
        <template v-if="isAuthenticated">
          <li>
              <Link href="/users/show" role="button">Dashboard</Link>
          </li>
            <li>
                <Link href="/logout" role="button" class="secondary">Log Out</Link>
            </li>
        </template>
        <template v-else>
            <li>
              <Link href="/login" role="button">Log In</Link>
            </li>
            <li>
              <Link href="/users/create" class="secondary" role="button">Sign Up</Link>
            </li>
        </template>
    </ul>
  </nav>
</header>

</template>
<script>
    import {Link} from '@inertiajs/vue3';
    import axios from 'axios';
    export default {
        components: {
            Link
        },
        data() {
    return {
      authenticated: false
    };
  },
  mounted() {
    // console.log('the nav is mounted');
    axios.get('/api/auth/status')
      .then(response => {
        this.authenticated = response.data.authenticated;
        console.log(this.authenticated);
      });
  },
  computed: {
    isAuthenticated() {
      return this.authenticated;
    }
  }
};
</script>
<style scope>

header {
    /* background-color: #00495C; */
    color: #fff;
    padding: 20px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
}

nav {
    display: flex;
    /* justify-content: flex-start; */
    justify-content: center;
    margin: 20px 0;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav li {
    /* margin: 0 10px; */
    /* margin-right: 1rem; */

}

nav a {
    /* color: #DAA520; */
    /* text-decoration: none;
    font-size: 18px; */
}



/* button{
    background-color: #DAA520;
    border-radius: 5%;
    border: none;
    width: 100px;
    height: 50px;
    cursor:pointer
} */

.log-in-out-container {
  display: flex;
  justify-content: flex-end;
}

.logo {
  margin-right: auto;
}

.log-in-out {
  /* margin-left: auto; */
}

</style>