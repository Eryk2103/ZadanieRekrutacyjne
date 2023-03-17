<script setup>
import User from '../components/User.vue';
import CustomerList from '../components/CustomerList.vue';
    function onEmitStatus($val){
        console.log($val);
    }
</script>
<template>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <User @loaded="onEmitStatus"></User>
            <h3 class="pt-3">Customers</h3>
            <CustomerList></CustomerList>
        </div>
        <div class="col-3"></div>
    </div>
   
</template>