<script setup>
import axios from 'axios';
import { ref } from 'vue';

    const email = ref('');
    const password = ref('');

    function loginUser()
    {
        axios.post('/api/login', { email: email.value, password: password.value}).then( (res) => {
            console.log(res.data);
        }).catch((e) => {
            console.error(e);
        })
    }
     
</script>
<template>
    <form class="pt-3">
        <h3>Login</h3>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" v-model="email"  id="email"  placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" v-model="password" id="password" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary mt-2" @click="loginUser()">login</button>
      </form>
    
</template>