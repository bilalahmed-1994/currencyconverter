<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        API Token

                        <a class="btn btn-sm btn-danger" style="float: right" v-bind:href="redirect">Generate New Token</a>
                    </div>

                    <div class="card-body">
                        {{ token }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        props: ['token', 'redirect'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
