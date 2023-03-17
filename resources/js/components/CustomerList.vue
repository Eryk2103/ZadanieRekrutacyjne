<script setup>
    import {onMounted, ref, watch} from 'vue';
    import CustomerItem from './CustomerItem.vue';

    const data = ref([]);
    const page = ref(1);
    const perPage = ref(5);

    function loadData()
    {
        axios.get('/api/customers', {
            params: { 
                page: page.value,
                per_page: perPage.value,
                
            }})
            .then( (res) => {
                data.value = res.data;
            }).catch((e) => {
                console.error(e);
        })
    }
    function previousPage(){
        page.value = page.value === 1 ? 1 : page.value-1;

    }
    function nextPage(){
       
        page.value = page.value == data.value.last_page ? data.value.last_page : page.value+1;
    }
    watch([page, perPage], () => {
        loadData();
    });

    onMounted(() => {
        loadData();
    });
</script>
<template>
    <select class="form-select w-25 mb-3" v-model="perPage">
        <option value="5">5 per page</option>
        <option value="10">10 per page</option>
        <option value="15">15 per page</option>
      </select>
    <ul class="list-group">
        <CustomerItem v-for="customer of data.data" 
            :firstName="customer.first_name" 
            :lastName="customer.last_name" 
            :phoneNumber="customer.phone_number"
            ></CustomerItem>
    </ul>
    <nav class="d-flex justify-content-center mt-3">
        <ul class="pagination">
          <li class="page-item" :class="{ disabled: !data.prev_page_url}"><a class="page-link" @click="previousPage()">Previous</a></li>
          <li class="page-item" ><a class="page-link" >{{ page }}</a></li>
          <li class="page-item" :class="{ disabled: !data.next_page_url}"><a class="page-link" @click="nextPage()">Next</a></li>
        </ul>
      </nav>
</template>