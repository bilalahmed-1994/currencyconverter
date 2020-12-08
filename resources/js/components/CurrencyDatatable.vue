<template>
    <div >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Currencies</div>

                    <div class="card-body">
                        <bootstrap-4-datatable :columns="columns" :data="rows"></bootstrap-4-datatable>
                        <!-- <bootstrap-4-datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></bootstrap-4-datatable-pager> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                        {label: 'id', field: 'id'}, 
                        {label: 'Name', field: 'Name'},
                        {label: 'NumCode', field: 'NumCode'},
                        {label: 'CharCode', field: 'CharCode'},
                        {label: 'Nominal', field: 'Nominal'},
                        {label: 'Value', field: 'Value'},
                        {label: 'Date', field: 'Date'}
                    ],
                rows: [],
                page: 1,
                per_page: 10,
                config : {
                    headers: { Authorization: `Bearer 7AD4ACJILQqZFuzZfhWfOkEMZZTg0gEt6n7F2qEMDBKiJuW0cZMEEVos2dgr` }
                },
                bodyParameters : {  
                    // page_size:10
                },            }
        },
        methods:{

            getUsers: function() {
                axios.get('/api/currencies', this.config).then(function(response){
                    console.log(response);
                    this.rows = response.data;
                    // this.page = response.data.current_page;
                    // this.per_page = response.data.per_page;
                    // this.totalRowCount = response.data.total;
                }.bind(this));
            }
        },
        created: function(){
            this.getUsers()
        }
    }
</script>