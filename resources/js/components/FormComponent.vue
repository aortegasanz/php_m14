<template>
    <div class="offset-md-3 col-md-6">
        <h2>Add new Picture</h2>
        <form v-on:submit.prevent="newPicture()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="picture.name">
            </div>
            <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" class="form-control" id="author_name" v-model="picture.author_name">
            </div>
            <div class="form-group">
                <label for="import">Import</label>
                <input type="text" class="form-control" id="import" v-model="picture.import">
            </div>
            <div class="form-group">
                <label for="entry_date">Entry Date</label>
                <input type="date" class="form-control" id="entry_date" v-model="picture.entry_date">
            </div>
            <!-- ('shop_id') -->
            <button type="submit" class="btn btn-primary">Enviar</button>                        
        </form>
    </div>
</template>
<script>
    let defaultPicture = {
        name: '',
        author_name: '',
        import: '',
        entry_date: '', 
        shop_id: '1',                 
    }
    export default {
        data() {
            return {
                picture: Object.assign({}, defaultPicture)
            }
        },
        methods: {
            newPicture() {
                axios.post('api/pictures', this.picture).then((response) => {
                    this.$emit('add', response.data.picture);
                });
                this.picture = Object.assign({}, defaultPicture)
            }
        }
    }
</script>
