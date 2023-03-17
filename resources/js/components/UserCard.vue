<script setup>
    const props = defineProps(['email', 'name']);

</script>

<template>
    
    <div class="card">
        <div class="card-body">
            <p>Email: {{props.email}}</p>
            <p>Name: {{props.name}}</p>
        </div>
    </div>
</template>