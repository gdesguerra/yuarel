<template>
    <div class="url-screenshot embed-responsive embed-responsive-16by9" v-bind:class="{ 'no-image': noImageAvailable }">
        <div class="embed-responsive-item" v-if="googlePageSpeedData">
            <img v-bind:src="screenshotSrc" alt="URL Screenshot">
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            if(this.longUrl && !this.longUrl.startsWith('ftp://'))
                this.fetchData();
            else
                this.noImageAvailable = true;
        },
        data() {
            return {
                googlePageSpeedApi: 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed',
                googlePageSpeedData: null,
                noImageAvailable: false
            }
        },
        props: {
            longUrl: String
        },
        methods: {
            fetchData: function () { 
                axios
                .get(this.googlePageSpeedApi, {
                    params: {
                        url: this.longUrl,
                        screenshot: true
                    }
                })
                .then(response => (this.googlePageSpeedData = response.data))
                .catch(error => (this.noImageAvailable = true));
            }
        },
        computed: {
            screenshotSrc: function() {
                var screenshotData = this.googlePageSpeedData.screenshot.data;
                screenshotData = screenshotData.replace(/_/g,'/').replace(/-/g,'+');

                return 'data:image/jpeg;base64, ' + screenshotData;
            }
        }
    };
</script>

<style scoped>
    .url-screenshot {
        background: #e9ecef url('/img/loading-66x66.gif') center center no-repeat; 
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .no-image {
        background: #e9ecef url('/img/no-image-82x40.png') center center no-repeat; 
    }

    .url-screenshot img {
        width: 100%;
        height: 100%;
    }
</style>
