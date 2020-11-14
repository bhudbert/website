<template>
  <div>
    <button class="button warning">Creation de contenu</button>
    <button-component></button-component>
  </div>
</template>

<script>

import buttonComponent from './buttonComponent'

export default {
  name: "bootComponent",
  components: {
    buttonComponent,
  }
}
</script>
