<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ resource }} - {{ model.designation }}</h1></div>

                    <div class="panel-body">
                        <form :action="update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" :value="token">
                            <input v-if="model.id" type="hidden" name="_method" value="PUT">
                            <div class="attributes">
                                <div class="attribute" v-for="(label, column) in model.columns">
                                    <input-text :label="label" :column="column" :value="model[column]"></input-text>
                                </div>
                            </div>
                            <div class="media" v-if="model.is_mediable">
                                <media-box :media="model.media"></media-box>
                            </div>
                            <button type="submit" class="btn btn-default">Salvar</button>
                        </form>
                        <form :action="destroy" method="POST" v-if="model.id">
                            <input type="hidden" name="_token" :value="token">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-default">Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MediaBox from './MediaBox.vue';
    import InputText from './InputText.vue';
    export default {
        props: [
            'resource',
            'update',
            'destroy',
            'model',
            'token'
        ],
        components: {
            'media-box': MediaBox,
            'input-text': InputText
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
