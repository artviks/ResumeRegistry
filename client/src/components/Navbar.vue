<template>
  <nav>
    <v-toolbar flat class="grey darken-3">
      <v-toolbar-title class="white--text" @click="$router.push('/')">
        Resume Registry
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
          @click="$router.push('/')"
          class="mx-5"
      >
        Home
      </v-btn>
      <v-btn
          outlined
          @click="$router.push('/add')"
          class="mx-5 light-green--text"
      >
        Add New Resume
      </v-btn>
    </v-toolbar>
  </nav>
</template>

<script>
export default {
  name: "Navbar"
}
</script>