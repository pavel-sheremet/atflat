<template>
        <div class="form-group position-relative">

            <div v-if="Uploader.status.upload" class="overlay">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="loading-block row justify-content-center">
                                <div class="spinner-border mb-2" role="status"></div>
                                <span class="col-12 loading-block__text">
                                    {{ $t('main.common.status.loading') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label>{{ this.$t('main.form.input.file.images.label') }}</label>

            <div class="drop-zone">
                <span>{{ this.$t('main.form.input.file.drop-zone') }}</span>
                <input type="file"
                       v-on:change.prevent="upload($event.target.files)"
                       multiple
                />
            </div>

            <div v-if="FilesErrors.data">
                <small class="form-text text-danger" v-for="error in FilesErrors.data">{{ error }}</small>
            </div>

            <div class="container my-1">
                <div class="row">
                    <div class=" col-6 col-sm-3 mt-2 "
                         style="height: 100px"
                         @mouseenter.prevent="hover.index = index"
                         @mouseleave.prevent="hover.index = null"
                         v-for="(file, index) in Uploader.files"
                    >
                        <div class="position-relative overflow-hidden d-flex  justify-content-center align-items-center"
                             style="height: 100%"
                        >
                            <a :href="file.url" target="_blank">
                                <img :src="file.url" class="mw-100 h-auto">
                            </a>

                        </div>
                        <button class="btn btn-primary btn-close"
                                v-on:click.prevent="deleteFile(index)"
                        ></button>
                    </div>
                </div>
            </div>

        </div>
</template>

<script>
    import { mapState, mapActions, mapMutations } from 'vuex';

    export default {
        name: "FileUploaderInputComponent",
        data() {
            return {
                hover: {
                    index: null
                }
            };
        },
        computed: {
            ...mapState({
                Uploader: state => state.Uploader,
                FilesErrors: state => state.FilesErrors
            }),
        },
        methods: {
            ...mapActions('Uploader', [
                'deleteFile'
            ]),
            ...mapMutations('Uploader', [
                'addFile',
                'setStatusUpload'
            ]),
            async upload(files) {
                if (this.Uploader.status.upload !== true)
                {
                    await this.$store.dispatch('FilesErrors/clear');
                    await this.setStatusUpload(true);

                    for (let i = 0; i < files.length; i++)
                    {
                        let formData = new FormData();
                        formData.append('file', files[i]);

                        await axios.post('/file/upload', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                            .then(response => this.addFile(response.data))
                            .catch(error => this.$store.dispatch('FilesErrors/fill', error.response.data.errors));
                    }

                    await this.setStatusUpload(false);
                }
            },
        }
    }
</script>

<style scoped>


</style>
