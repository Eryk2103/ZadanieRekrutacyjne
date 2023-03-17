<script setup>
    import axios from 'axios';
    import { onMounted, ref } from 'vue';
    import UserCard from './UserCard.vue';

    const user = ref({});
    const emit = defineEmits(['loaded']);

    function emitStatus(str) {
        emit("loaded", str);
    }
    function getUser()
    {
        axios.get('/api/user').then( (res) => {
            user.value = res.data;
            emitStatus('loaded data');

        }).catch((e) => {
            console.error(e);
        })
    }
    
    onMounted(()=> {
        getUser();
    });
    
</script>
<template>
    <h3 class="mt-3">User view</h3>
    <UserCard :email="user.email" :name="user.name"></UserCard>
     
    
</template>