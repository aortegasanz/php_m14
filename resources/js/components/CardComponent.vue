<template>
    <div class="col-md-4">                        
        <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>            
            <div class="card-body">
                <h3>{{ picture.name }}</h3>
                <p class="card-text">{{ picture.author_name }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" v-on:click="deletePicture" class="btn btn-sm btn-outline-secondary">Borrar</button>
                    </div>
                    <small class="text-muted">{{ picture.import }} €</small>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default { 
        props: {
            picture: {
                type: Object,
                required: true,
            }
        },
        data() {
            return {
            }
        },
        methods: {
            deletePicture() {
                axios.delete('api/pictures/' + this.picture.id).then(() => {
                    this.$emit('delete');
                });                               
            }
        }
    }
</script>
