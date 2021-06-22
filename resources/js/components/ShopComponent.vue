<template>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h2>PICTURES</h2>
            </div>
        </div>
        <div class="row">
            <form-component @add="newPicture"></form-component>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <card-component v-for="(picture, index) in pictures" 
                        :picture="picture"
                        @delete="deletePicture(index)"
                        :key="picture.id">
                    </card-component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import CardComponent from './CardComponent'
    import FormComponent from './FormComponent'
    export default {
        components: { 
            CardComponent, FormComponent 
        },
        data() {
            return {
                pictures: [

                ]
                /*
                pictures: [
                    {
                        id: '1',
                        name: 'Cuadro 1',
                        author_name: 'Descripción cuadro 1',
                        import: 1000.00,
                        entry_date: '2021-06-17 21:21:21',
                        shop_id: 1
                    },
                    {
                        id: '2',
                        name: 'Cuadro 2',
                        author_name: 'Descripción cuadro 2',
                        import: 2000.00,
                        entry_date: '2022-06-17 21:21:21',
                        shop_id: 2
                    },
                ]
                */
            }
        },
        methods: {
            newPicture(picture) {
                this.pictures.push(picture);
            },
            deletePicture(index) { 
                this.pictures.splice(index, 1);
            }
        },
        mounted() {
            axios.get('api/pictures').then((response) => {
                this.pictures = response.data.pictures
            });
        }
    }
</script>
