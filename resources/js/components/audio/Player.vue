<template>
    <div class="container-full-width">

        <header>
            <div class="row" style="width: 100%; margin-top: 5px">
                <div class="col-6" style="text-align: left">
                    <h4><b>My Music</b></h4>
                </div>

                <div class="col"></div>

                <div class="col-2">
                        <a class="button" href="/audio/upload" style="color: #F1C40F;  width: 250px; height: 25px; font-size: 14px; text-decoration:none">
                            Upload <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="18" height="18"
                                        viewBox="0 0 225 225"
                                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,225.99419v-225.99419h225.99419v225.99419z" fill="none"></path><g fill="#f1c40f"><path d="M130.5,20.39063c-22.53515,0 -43.13672,13.07813 -53.01562,33.04688c-5.11524,-3.375 -11.17969,-5.20312 -17.4375,-5.20312c-16.66406,0 -30.25195,13.00781 -31.35937,29.39063c-17.01562,6.20508 -28.6875,22.60547 -28.6875,40.92188c0,23.99414 19.45899,43.45313 43.45313,43.45313h64.54688v-47.67187l-14.76562,14.90625c-1.75781,1.75781 -4.71094,1.75781 -6.46875,0c-1.75781,-1.75781 -1.75781,-4.71094 0,-6.46875l25.73438,-25.59375l25.73438,25.59375c1.75781,1.75781 1.75781,4.71094 0,6.46875c-0.8789,0.87891 -2.07422,1.26563 -3.23437,1.26563c-1.16015,0 -2.35547,-0.38672 -3.23437,-1.26562l-14.76562,-14.90625v47.67188h67.92188c22.0957,0 40.07813,-18 40.07813,-40.07812c0,-20.46094 -15.41601,-37.40625 -35.4375,-39.79687c0.05274,-0.8789 0.14063,-1.70508 0.14063,-2.53125c0,-32.625 -26.57812,-59.20312 -59.20312,-59.20312zM117,162h-9v31.5c0,2.4961 2.02149,4.5 4.5,4.5c2.47851,0 4.5,-2.0039 4.5,-4.5z"></path></g></g></svg>
                            <div class="button__horizontal"></div>
                            <div class="button__vertical" ></div>
                        </a>
                </div>
            </div>
        </header>



        <main style="text-align: center; min-width: 1500px">
            <section class="player">

                <div class="container-full-width controls">
                    <div class="row" style="height: 130px; min-width: 500px">

                        <div class="col-3">
                        </div>

                        <div class="col-2">
                            <!--CONTROLS-->
                            <div class="row" style="margin-top: 40px; min-width: 250px; width: 100%">
                                <div class="col-4" style="text-align: right">
                                    <button class="btn btn-dark prev" @click="prev" style="border-radius: 40px; height: 40px; width: 40px; margin-top: 5px">
                                        &#x23ea;
                                    </button>
                                </div>

                                <div class="col-4" style="text-align: center">
                                    <transition name="fade" mode="out-in">
                                        <button class="btn btn-success play" style="border-radius: 40px; height: 50px; width: 50px;" @click="play()" v-if="!isPlaying">
                                            &#9658;
                                        </button>
                                        <button class="btn btn-success pause" style="border-radius: 40px; height: 50px; width: 50px; text-align: center;" @click="pause" v-else>
                                            <b>&#9646;&#9646;</b>
                                        </button>
                                    </transition>
                                </div>

                                <div class="col-4" style="text-align: left; margin-top: 5px">
                                    <button class="btn btn-dark next" @click="next" style="border-radius: 40px; height: 40px; width: 40px;">
                                        &#x23e9;
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="col" style="text-align: left; min-width: 250px;">
                            <h3 class="song-title" style="margin-top: 30px" v-if="songs.length !== 0">{{ current.title }}</h3>
                            <h3 class="song-title" style="margin-top: 30px" v-else>You have no tracks yet</h3>

<!--DURATION-->
                            <input type="range"
                                   :max="current.duration_in_sec"
                                   :min="0"
                                   v-model="player.currentTime"
                                   :step="0.5" style="width: 40%; margin-right: 15px; outline: none"/>

                            <span v-if="currentTime!==''" style="margin-right: 15px">{{ currentTime }}</span>
                            <span v-else style="margin-right: 15px">0:00</span>

                            <button class="btn btn-outline-light" style="border: none; height: 40px; width: 40px; border-radius: 40px">
                                <img src="https://img.icons8.com/android/24/000000/shuffle.png" style="height: 20px; width: 20px;"/>
                            </button>

                            <button class="btn btn-outline-light" style="border: none; height: 40px; width: 40px; border-radius: 40px" v-if="repeat === false" @click="repeatTrack()">
                                <img src="https://img.icons8.com/ios-glyphs/50/000000/replay.png" style="height: 20px; width: 20px;"/>
                            </button>
                            <button class="btn btn-outline-light" style="border: none; height: 40px; width: 40px; border-radius: 40px" v-else @click="repeatTrack()">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 171 171" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,171.99812v-171.99812h171.99812v171.99812z" fill="none"></path><g id="original-icon" fill="#000000"><path d="M85.5,14.25c-9.45204,0 -18.50951,1.8521 -26.78137,5.21155v-0.00696c-10.62515,4.31061 -19.91356,11.14157 -27.25452,19.69812l-0.1322,-3.76428c-0.04103,-1.9248 -0.85917,-3.75109 -2.26814,-5.06307c-1.40898,-1.31199 -3.28888,-1.99801 -5.21172,-1.90189c-3.92587,0.1991 -6.94896,3.53976 -6.75623,7.46594l0.74451,21.36108c0.14011,3.93038 3.43803,7.00407 7.36853,6.86756l21.36109,-0.74451c2.59816,-0.01001 4.98493,-1.43336 6.22871,-3.71448c1.24378,-2.28112 1.14741,-5.05841 -0.25151,-7.24783c-1.39892,-2.18942 -3.87862,-3.44389 -6.47122,-3.27377l-4.56445,0.16003c5.98792,-7.26467 13.71791,-13.04741 22.56482,-16.6366h0.00696c6.60497,-2.68255 13.81866,-4.16089 21.41675,-4.16089c31.56407,0 57,25.43593 57,57c0,31.56407 -25.43593,57 -57,57c-31.56407,0 -57,-25.43593 -57,-57c0.03634,-2.56953 -1.31367,-4.95958 -3.53309,-6.25495c-2.21942,-1.29537 -4.96439,-1.29537 -7.18381,0c-2.21942,1.29537 -3.56943,3.68542 -3.53309,6.25495c0,39.26556 31.98444,71.25 71.25,71.25c39.26556,0 71.25,-31.98444 71.25,-71.25c0,-39.26556 -31.98444,-71.25 -71.25,-71.25z"></path></g><g fill="#000000"><path d="M91.465,50.57v67.86h-8.63v-57.19l-17.3,6.35v-7.79l24.58,-9.23z"></path></g></g></svg>
                            </button>

<!--VOLUME-->
                            <button class="btn btn-outline-light" v-if="player.volume === 0" style="border: none; height: 40px; width: 40px; border-radius: 40px" @click="player.volume = lastVol">
                                <img src="https://cdn.icon-icons.com/icons2/1933/PNG/512/iconfinder-volume-mute-sound-speaker-audio-4593175_122269.png" style="height: 20px; width: 20px;"/>
                            </button>

                            <button class="btn btn-outline-light" v-else style="border: none; height: 40px; width: 40px; border-radius: 40px" @click="mute(player.volume)">
                                <img src="https://cdn.icon-icons.com/icons2/1933/PNG/512/iconfinder-volume-max-sound-speaker-audio-4593170_122277.png" style="height: 20px; width: 20px;"/>
                            </button>

                            <input type="range"
                                   :max="1"
                                   :min="0"
                                   v-model="player.volume"
                                   :step="0.05" style="width: 90px; height: 4px; margin-right: 55px; outline: none"/>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <section class="playlist" style="margin-left: 100px; margin-right: 100px">

                <h6 v-if="songs.length !== 0">ALL TRACKS</h6>
                <div style="width: 80%">
                    <ul style="margin-left: 25%">
                        <li v-for="song in songs" :key="song.id" style="list-style: none; width: 100%">
                            <button class="btn btn-outline-dark" :class="{ active : active_btn === song.id }" :id="song.id" @click="play(song)" style="width: 100%; border: none; text-align: left">
                                <div class="row">
                                    <div class="col">
                                        <span style="font-size: 18px" v-if="isPlaying && active_btn === song.id">&#9646;&#9646;</span>
                                        <b style="font-size: 18px" v-else>&#9658;</b><span style="margin-left: 15px">{{ song.title }}</span>
                                    </div>
                                    <div class="col" style="text-align: right">{{ durationForUser(song.duration_in_sec) }}</div>
                                </div>
                            </button>
                        </li>
                    </ul>
                </div>
                <br>
                <hr>

                <pagination :data="pager" @pagination-change-page="getPlayList">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>

            </section>

        </main>
    </div>
</template>

<script>
export default {
    name: "Player",

    data() {
        return {
            pager: {},
            index: 0,
            indexCurrentPage: 1,
            isPlaying: false,
            currentTime: '',
            player: new Audio(),
            repeat: false,
            active_btn: 0,
            show: false,
            lastVol: 0
        }
    },

    created(){
        this.getPlayList();
        console.log(this.songs)
    },

    computed: {
        songs(){
            return this.pager.data || [];
        },
        current() {
            return this.songs[this.index] || [];
        },
        currentPage(){
            return this.indexCurrentPage = this.pager.current_page;
        }
    },

    beforeDestroy () {
        clearInterval();
    },

    methods: {
        getPlayList(page = 1){
            axios
                .get('/api/play-list?page=' + page)
                .then(({data}) => {
                    this.pager = data;
                })
                .catch(error => console.log(error.response.data));
        },

        getTimeOfTrack(time){
            let minutes = Math.floor(time / 60);
            let seconds = time - minutes * 60;
            if (parseInt(seconds) < 10){
                this.currentTime = minutes + ':0' + parseInt(seconds);
            }
            else {
                this.currentTime = minutes + ':' + parseInt(seconds);
            }
        },

        repeatTrack(){
            this.repeat = !this.repeat;
            this.player.loop = this.repeat;
        },

        play(song){
            if(typeof song !== 'undefined') {
                this.index = this.songs.indexOf(song);
                this.player.src = this.current.path;
            }
            this.show = true;
            this.active_btn = this.current.id;

            setInterval(() => this.getTimeOfTrack(this.player.currentTime), 50);

            if (this.isPlaying && this.active_btn === this.current.id){
                this.player.pause();
            }
            this.player.play();


            this.player.addEventListener('ended', function (){

                if(this.player.ended) {
                    this.player.src = this.current.path;
                    this.next();
                }

                this.active_btn = this.current.id;
            }.bind(this));

            this.isPlaying = true;
        },

        pause(){
            this.player.pause();
            this.isPlaying = false;
            this.show = false;
        },

        prev(){
            this.index--;
            if(this.index < 0){
                this.index = this.songs.length-1;
            }
            this.play(this.current);
        },

        next(){
            this.player.pause();
            this.index++;
            if(this.index > this.songs.length-1){
                this.index = 0;
            }
            this.active_btn = this.current.id;
            setTimeout(() => this.play(this.current), 500);
        },

        durationForUser(time){
            let minutes = Math.floor(time / 60);
            let seconds = time - minutes * 60;
            let sep;

            parseInt(seconds) < 10 ? sep = ':0' : sep = ':';

            return minutes + sep + parseInt(seconds);
        },

        mute(lastVol){
            this.lastVol = lastVol;
            this.player.volume = 0;
        }
    }
}
</script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: sans-serif;
}
header {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-color: black;
    color: #FFF;
}
</style>
