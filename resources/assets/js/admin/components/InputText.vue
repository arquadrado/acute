<template>
   <div class="form-group">
       <label :for="column">{{ label }}</label>
       <input type="text" :name="column" :value="value">
   </div>
</template>

<script>
    export default {
        props: [
            'label',
            'column',
            'value'
        ],
        mounted() {
            console.log('Media Box')
        }
    }
</script>
