<template>
<div>
  <div class="p-4 slider">
      <h1 class="mt-5 d-flex justify-content-center">
          Panel Admin
      </h1>
  </div>
  <div class="container padding">
    <div class="card card-default">
        <div class="card-header">Bienvenue sur le panel admin</div>
        <div class="card-body">
            <userList></userList>
        </div>
    </div>
  </div>
</div>
</template>
<script>
  import userList from '../../components/user-list.vue'
  export default {
    mounted() {
      //
    },
    components: {
      userList
    }
  }
</script>

<style scoped>
.padding {
  padding: 20px 0;
}
</style>