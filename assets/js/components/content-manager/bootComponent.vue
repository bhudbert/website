<template>
  <div>
    <button class="button primary">Ajouter paragraphe</button>
    <button class="button neutral">Ajouter gallerie</button>
    <button-component ></button-component>
  </div>
</template>

<script>

import buttonComponent from './buttonComponent'

import axios from "axios";

export default {
  name: "bootComponent",
  components: {
    buttonComponent,
  },
  data(){
    return {
      tasks:[],
      taskToEdit:{},
      reveleModalEditTask:false
    }
  },
  mounted() {
    axios.get('/api/media/3')
        .then( response => (this.tasks=response.data))
        .catch(error => console.log(error))
  }
}
</script>
