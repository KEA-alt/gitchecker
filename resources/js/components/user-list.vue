<template>
<div>
    <h3>Liste des repos</h3>
    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th>Nom du repo</th>
            <th>Mot de passe</th>
        </tr>
        <tr style="margin-bottom: 5px;">
            <th scope="row"></th>
            <td></td>
        </tr>
    </table>
</div>
</template>
<script>
import axios from 'axios';

  export default {
    data() {
      return {
        file: '',
    	files:''
      }
    },
    methods: {
      getFiles(){
        axios.get('../js').then(res=>{
          console.log('ok')
        })
      },
       created(){
          this.getFiles()
        },
    }
  }
</script>