<script setup>
    const props = defineProps(['firstName', 'lastName', 'phoneNumber' ])
</script>
<template>
    <li class="list-group-item d-flex justify-content-around"><span>{{props.firstName}} {{props.lastName}}</span> {{props.phoneNumber}}</li>
</template>