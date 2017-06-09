<template>
   <div class="media-box">
        <div class="row insert">
            <div class="col-xs-12">
                <label for="files[]">Media</label>
                <input class="" type="file" name="files[]" id="file" multiple/>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-unstyled">
                    <li class="media" v-for="file in media">
                        <img class="d-flex mr-3" :src="'/' + file.path" alt="Generic placeholder image">
                        <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ file.mime_type }}</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'media'
        ],
        methods: {
            removeMedia () {
                console.log('Gonna remove this shit');
            }
        },
        mounted() {
            console.log('Media Box');
        }
    }
</script>
