<script setup>
import { ref } from 'vue';

    const num = ref(0);
    function random()
    {
        return Math.floor(Math.random() * 1000);
    }
</script>
<template>
    <div class="d-flex justify-content-center">
        <div>
            <h4 class="text-center">{{num}}</h4>
            <button class="btn btn-primary" @click="num = random();">Generate</button>
        </div>
        
    </div>
    
</template>